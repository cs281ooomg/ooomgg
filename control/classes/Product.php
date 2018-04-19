<?php

class Product
{

    private $pId, $pName, $pImages, $pPrice, $pDescription, $pType, $pQuantity;

    public function __construct($pId, $pName, $pImages, $pPrice, $pDescription, $pType, $pQuantity)
    {
        $this->pId = $pId;
        $this->pName = $pName;
        $this->pImages = $pImages;
        $this->pPrice = $pPrice;
        $this->pDescription = $pDescription;
        $this->pType = $pType;
        $this->pQuantity = $pQuantity;
    }

    public function getPId()
    {
        return $this->pId;
    }

    public function getPName()
    {
        return $this->pName;
    }

    public function getPImages()
    {
        return $this->pImages;
    }

    public function getPPrice()
    {
        return $this->pPrice;
    }

    public function getPDescription()
    {
        return $this->pDescription;
    }

    public function getPType()
    {
        return $this->pType;
    }

    public function setPId($pId)
    {
        $this->pId = $pId;
    }

    public function setPName($pName)
    {
        $this->pName = $pName;
    }

    public function setPImages($pImages)
    {
        $this->pImages = $pImages;
    }

    public function setPPrice($pPrice)
    {
        $this->pPrice = $pPrice;
    }

    public function setPDescription($pDescription)
    {
        $this->pDescription = $pDescription;
    }

    public function setPType($pType)
    {
        $this->pType = $pType;
    }

    public function getPQuantity()
    {
        return $this->pQuantity;
    }

    public function setPQuantity($pQuantity)
    {
        $this->pQuantity = $pQuantity;
    }

    public static function ShowProductDetail($pro_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_INDEX ='" . $pro_index . "'";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
        return $product;
    }

    public static function getallCatagory()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
            $resultArray[] = $product;
        }
        return $resultArray;
    }

    public static function getallProduct()
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT ";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
            $resultArray[] = $product;
        }
        return $resultArray;
    }

    public static function getProduct($cat_index)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY ";
        $query = $conn->query($sql);
        $resultArray = array();
        
        while ($result = $query->fetch_array()) {
            
            // echo $result["CAT_INDEX"].'<br/>';
            if ($result["CAT_INDEX"] == $cat_index) {
                $catagory = new Catagory($result["CAT_INDEX"], $result["CAT_NAME"]);
                $connn = new mysqli($hostname, $username, $password, $dbname);
                $sqll = "SELECT * FROM PRODUCT WHERE CAT_INDEX ='" . $result["CAT_INDEX"] . "'";
                $queryy = $conn->query($sqll);
                while ($resultt = $queryy->fetch_array()) {
                    $product = new Product($resultt["PRO_INDEX"], $resultt["PRO_NAME"], $resultt["PRO_images"], $resultt["PRO_PRICE"], $resultt["PRO_DESC"], $resultt["CAT_INDEX"], 0);
                    $resultArray[] = $product;
                }
            }
        }
        
        return $resultArray;
    }

    public static function getFeaProduct($product)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE (CAT_INDEX = '" . $product->getPType() . "' OR CAT_INDEX = '4') AND (PRO_INDEX != '" . $product->getPID() . "');";
        $query = $conn->query($sql);
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
            $product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
            $resultArray[] = $product;
            $i ++;
        }
        if ($i === 0) {
            return NULL;
        }
        shuffle($resultArray);
        return $resultArray;
    }

    public static function checkProduct($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME='" . $name . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }

    public static function addProduct($name, $image, $price, $des, $type)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO PRODUCT(PRO_NAME,PRO_images,PRO_PRICE,PRO_DESC,CAT_INDEX)
		VALUES('" . $name . "','" . $image . "','" . $price . "','" . $des . "', '" . $type . "');";
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new product successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_Product.php\";</script>";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }

    public static function checkCatagory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM CATAGORY WHERE CAT_NAME='" . $name . "' ";
        $query = $conn->query($sql);
        $result = $query->fetch_assoc();
        if ($result) {
            return false;
        }
        return true;
    }

    public static function addCatagory($name)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "INSERT INTO CATAGORY(CAT_NAME)
		VALUES('" . $name . "');";
        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Add new catagory successfully.')";
            echo "</script>";
            echo "<script> document.location.href=\"../add_Catagory.php\";</script>";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    public static function getFavoriteProduct($acc)
    {
        require 'config/config.php';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        $sql = "SELECT PRO_INDEX FROM FAVORITE WHERE ACC_ID ='".$acc->getID()  . "'";
        $query = $conn->query($sql);
        $proArr= array();
        while ($result = $query->fetch_array()) {
            $proArr [] = Product::ShowProductDetail($result['PRO_INDEX']);  
        }
        return $proArr;
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
    
    public static function searchWord($name)
    {
    	require 'config/config.php';
    	
    	$conn = new mysqli($hostname, $username, $password, $dbname);
    	$sql = "SELECT * FROM PRODUCT WHERE PRO_NAME LIKE '%$name%'";
    	$query = $conn->query($sql);
    	$resultArray = array();
    	$i = 0;
    	while ($result = $query->fetch_array()) {
    		$product = new Product($result["PRO_INDEX"], $result["PRO_NAME"], $result["PRO_images"], $result["PRO_PRICE"], $result["PRO_DESC"], $result["CAT_INDEX"], 0);
    		$resultArray[] = $product;
    		$i++;
    	}
    	if($i==0){
    	    return null;
    	}
    	return $resultArray;
    }
}

?>
