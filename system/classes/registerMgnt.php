<?php

class registerMgnt
{
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
    
    public static function createAcc($userinput, $passinput, $fname, $lname, $email, $phonenumber, $gender)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO ACCOUNT (ACC_ID,ACC_PASS,ACC_FNAME,ACC_LNAME,ACC_EMAIL,ACC_TEL,ACC_GENDER)
            VALUES ('" . $userinput . "','" . $passinput . "','" . $fname . "','" . $lname . "','" . $email . "','" . $phonenumber . "','" . $gender . "')";
        $query = $conn->query($sql);
        return $query;
    }
}
?>
