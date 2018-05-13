<?php

class PromotionMgnt
{

    public static function getExtraPromotion($price)
    {}

    public static function sendEmailNoti($topic)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ACCOUNT";
        $query = $conn->query($sql);
        $allProduct = ProductMgnt::getAllProduct();
        $pmProduct = array();
        $massage = "Product Promotion List</br>";
        $todays_date = date("Y-m-d");
        $today = strtotime($todays_date); 
        foreach ($allProduct as $product){
            if($product->getPPromotions() != NULL){
                $name = $product->getPName();
                $price = $product->getPPrice();
                $newPrice = PromotionMgnt::getNewPricePromotion($product);
                $disPer = $product->getPPromotions()->getPercent();
                $date = $product->getPPromotions()->getDate();
                $exp_date = strtotime($date);
                if($today <= $exp_date){
                    $massage = $massage.$name.' Price : '.$price.' Discount '.$disPer.'% New Price : '.$newPrice.' Today before!! : '.$date.'</br>';
                }    
            }
        }
        while ($result = $query->fetch_array()) {
            date_default_timezone_set('Asia/Bangkok');
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = " cs284cstu@gmail.com";
            $mail->Password = "0822808826";
            $mail->setFrom(' cs284cstu@gmail.com', 'OOOMG Promotion Notification');
            $email = $result["ACC_EMAIL"];
            $name = $result["ACC_FNAME"] . ' ' . $result["ACC_LNAME"];
            $mail->addAddress($email, $name);
            $mail->Subject = $topic;
            $mail->CharSet = 'utf-8';
            $mail->msgHTML($massage);
            if (! $mail->send()) {
                return false;
            }
        }
        return true;
    }

    public static function addNewPromotion($product, $promotion)
    {}
    
    public static function getPromotionByProductID($pro_id) {
        require 'config/config.php';
        $todays_date = date("Y-m-d");
        $today = strtotime($todays_date);
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PROMOTION WHERE PRO_INDEX ='" . $pro_id . "' AND PROMO_DATE >= '".$today."'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            $promotion = new Promotion($result['PROMO_INDEX'], $result['PROMO_PERCENT'], $result['PROMO_DATE']);
            return $promotion;
        }
        return NULL;
    }
    
    public static function getNewPricePromotion($product){
        $discountP = $product->getPPrice() * $product->getPPromotions()->getPercent()/100;
        return $product->getPPrice()-$discountP;
    }
}
?>