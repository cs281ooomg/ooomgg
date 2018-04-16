<?php
class AccountMgnt
{

    public static function loginAuth($acc_id, $acc_pass)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        if ($acc_id != "" && $acc_pass != "") {
            $sql = "SELECT * FROM ACCOUNT WHERE ACC_ID = '" . $acc_id . "' AND ACC_PASS ='" . $acc_pass . "' ";
            $query = $conn->query($sql);
            $result = $query->fetch_assoc();
            if ($result) {
                $acc = new Account($result["ACC_ID"], $result["ACC_PASS"], $result["ACC_TYPE"], $result["ACC_EMAIL"], $result["ACC_FNAME"], $result["ACC_LNAME"], $result["ACC_GENDER"], $result["ACC_TEL"]);
                $conn->close();
                return $acc;
            }
        }
        $conn->close();
        return null;
    }

    public static function logout()
    {
        session_start();
        session_destroy();
        header("location:../index.php");
        exit();
    }

    public static function addFavorite($cpro_id, $cacc_id)
    {
        require 'config/config.php';
        $pro_id = $cpro_id;
        $acc_id = $cacc_id;
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM FAVORITE  WHERE PRO_INDEX ='" . $pro_id . "' AND ACC_ID ='" . $acc_id . "'  ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return TRUE;
        }
        return FALSE;
    }

    public static function registerAuth($accid)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM ACCOUNT WHERE ACC_ID='" . $accid . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }

    public static function createAcc($userinput, $passinput, $fname, $lname, $email, $phonenumber)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO ACCOUNT (ACC_ID,ACC_PASS,ACC_FNAME,ACC_LNAME,ACC_EMAIL,ACC_TEL)
            VALUES ('" . $userinput . "','" . $passinput . "','" . $fname . "','" . $lname . "','" . $email . "','" . $phonenumber . "')";
        $query = $conn->query($sql);
        echo "<script language=\"JavaScript\">";
        echo "alert('Registration Complete!\\nYour account has been confirmed.')";
        echo "</script>";
        echo "<script> document.location.href=\"../login.php\";</script>";
    }

    public static function getMyCart($account)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CART WHERE ACC_ID = '" . $account->getID() . "' ";
        $query = $conn->query($sql);
        $resultArray = array();
        $count = 0;
        while ($result = $query->fetch_array()) {
            $resultArray[] = ProductMgnt::ShowProductDetail($result['PRO_ID']);
            $count ++;
        }
        if ($count === 0) {
            return NULL;
        }
        $cart = new Cart($result['CART_INDEX'], $resultArray);
        return $cart;
    }

    public static function addToMyCart($account,$pro_id,$quantity)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CART WHERE ACC_ID = '".$account->getID()."' AND PRO_ID = '".$pro_id."';";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) { //update
            $quantity += $result['QUANTITY'];
            $sql = "UPDATE CART SET QUANTITY = '". $quantity."' WHERE CART_INDEX = '".$result['CART_INDEX']."';";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        }else{ //new
            $sql = "INSERT INTO CART (ACC_ID,PRO_ID,QUANTITY)  VALUES ('".$account->getID()."','".$pro_id."',".$quantity.");";
            $query = $conn->query($sql);
            $conn->close();
            return $query;
        }     
    }
}
?>
