<?php
session_start();
$session_set = false;
if(isset($_SESSION['ACC_ID'])){
    $session_set = true;
}

include'../control/config/config.php';
$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}



    
$name = $_REQUEST['pname'];
$image = $_FILES['fileToUpload']['name'];
$price = $_REQUEST['pprice'];
$des = $_REQUEST['pdes'];
if (empty($name) or empty($price) or empty($des)) {
    echo "<script language=\"JavaScript\">";
    echo "alert('Please fill information.')";
    echo "</script>";
    echo "<script> document.location.href=\"../addPro.php\";</script>";
    exit();
}
else {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_images,PRO_PRICE,PRO_DESC)
		VALUES('".$name."','".$image."','".$price."','".$des."');";
        
        
        if($conn->query($sql)===TRUE){
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new product successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../addPro.php\";</script>";
            exit();

        }else{
            echo "Error".$sql. "<br>" .$conn->error;
        }
        
        //move_uploaded_file($_FILES['fileToUpload'][''], $destination)
        $conn->close();
        

}




?>