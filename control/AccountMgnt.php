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

    public static function addFavorite($cpro_id)
    {
        require 'config/config.php';
        $pro_id = $cpro_id;
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT  WHERE PRO_INDEX = '" . $pro_id . "'  ";
        $query = $conn->query($sql1);
        $result = $query->fetch_assoc();
        if ($result) {
            return TRUE;
        }
        return FALSE;
    }
}
?>
