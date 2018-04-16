<?php
if ($_GET["pro_id"]) {
    session_start();
    $session_set = false;
     if (isset($_SESSION['ACC']->getID())) {
         $session_set = true;
     }
    
    if ($session_set) {
        // include'../classes/Favorite.php';
        
        require 'config/config.php';
        
        $pro_id = $_GET["pro_id"];
        $acc_id = $_SESSION['ACC']->getID();
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql1 = "SELECT * FROM FAVORITE  WHERE ACC_ID ='".$acc_id."' AND PRO_INDEX ='".$pro_id."'";
        $query = $conn->query($sql1);
        $result = $query->fetch_assoc();
        if ($result) {
            $sql = "DELETE FROM FAVORITE WHERE ACC_ID='" . $acc_id . "' AND '" . $pro_id . "' ";
            $query = $conn->query($sql);
            echo "del";
        } else {
            $sql = "INSERT INTO FAVORITE (ACC_ID,PRO_INDEX) VALUES ('" . $acc_id . "','" . $pro_id . "')";
            $query = $conn->query($sql);
            echo "add matha fakka";
        }
        header("location:../product_detail.php?pro_id=$pro_id");
       // echo "<script> document.location.href=\"../product.php\";</script>";
    }else 
    {
        header("location:../login.php");
    }
}
//   header("Location: product.php");
?>
