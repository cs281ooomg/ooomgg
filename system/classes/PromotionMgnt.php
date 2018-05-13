<?php
class PromotionMgnt
{
    
    public function getExtraPromotion($price) {
        
    }
    
    public static function sendEmailNoti($topic, $massage)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ACCOUNT";
        $query = $conn->query($sql);
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
            $name = $result["ACC_FNAME"]. ' ' .$result["ACC_LNAME"];
            $mail->addAddress($email, $name);
            $mail->Subject = $topic;
            $mail->CharSet = 'utf-8';
            $mail->msgHTML($massage);
            if (!$mail->send()) {
                return false;
            }
        }
        return true;
    }
    
}
?>