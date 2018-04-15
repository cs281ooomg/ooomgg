<?php
if ($_GET["pro_id"]) {
    session_start();
    $session_set = false;
    if (isset($_SESSION['ACC_ID'])) {
        $session_set = true;
    }
    
    if ($session_set) {
        // include'../classes/Favorite.php';
        require '../control/AccountMgnt';
        require '../config/config.php';
        
        $pro_id = $_GET["pro_id"];
        $acc_id = $_SESSION['ACC_ID'];
        
        $ac = AccountMgnt::addFavorite($pro_id, $acc_id);
        if ($ac) {
            $conn = new mysqli($hostname, $username, $password, $dbname);
            $sql1 = "SELECT * FROM FAVORITE  WHERE ACC_ID = '" . $acc_id . "' AND PRO_ID ='" . $pro_id . "' ";
            $query = $conn->query($sql1);
            $result = $query->fetch_assoc();
            if ($result) {
                $sql = "DELETE FROM FAVORITE WHERE ACC_ID='" . $acc_id . "' AND '" . $pro_id . "' ";
                $query = $conn->query($sql);
            } else {
                $sql = "INSERT INTO FAVORITE (ACC_ID,PRO_ID) VALUES ('" . $acc_id . "','" . $pro_id . "')";
                $query = $conn->query($sql);
                echo "add matha fakka";
            }
            $conn->close();
            echo "<script> document.location.href=\"../product.php\";</script>";
        }
        else 
        {
            echo"alert('ไม่พบสินค้า')";
            header("Location: 404.php");
        }
    }
    $path_url = $_SERVER['REQUEST_URI'];
    echo $path_url;
}
echo "<script> document.location.href=\"../product.php\";</script>";
?>

