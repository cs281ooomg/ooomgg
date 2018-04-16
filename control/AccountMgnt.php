<?php
require 'classes/Account.php';

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
    
    public static function addFavorite($cpro_id,$cacc_id)
    {
        require 'config/config.php';
        $pro_id = $cpro_id;
        $acc_id = $cacc_id;
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM FAVORITE  WHERE PRO_INDEX = '" . $pro_id . "' AND '".$acc_id."'  ";
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
            VALUES ('" . $userinput . "','" . $passinput . "','" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['email'] . "','" . $_POST['phonenumber'] . "')";
        $query = $conn->query($sql);
        echo "<script language=\"JavaScript\">";
        echo "alert('Registration Complete!\\nYour account has been confirmed.')";
        echo "</script>";
        echo "<script> document.location.href=\"../login.php\";</script>";
    }
}
?>
