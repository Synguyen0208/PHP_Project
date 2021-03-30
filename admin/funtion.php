<?php
error_reporting(0);
session_start();
$_SESSION['dem']=1;
class connect_database{
    private $database_name;
    private $conn;

    function connect_database($name){
        $this->database_name=$name;
        $this->conn = mysqli_connect("localhost", "root", "", "$this->database_name");
    }

    function getDatabaseName(){
        return $this->database_name;
    }

    function setDatabaseName($name){
        $this->database_name=$name;
    }

    public function execute($sql){
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}


$conn=new connect_database("php_project");

function add_product(){
    if(!empty($_POST['name-product'])&&!empty($_POST['price-product'])&&!empty($_POST['quantity-product'])&&!empty($_POST['title'])&&isset($_FILES['img-product'])){
    $name=$_POST['name-product'];
    $idCat;
    $category=$_POST['category'];
    $price=$_POST['price-product'];
    $priceDiscount=$_POST['discount-price-product'];
    $quan=$_POST['quantity-product'];
    $til=$_POST['title'];
    if($category=="mới"){
        $idCat=3;
    }
    else if($category=="nam"){
        $idCat=1;
    }
    else
    $idCat=2;
    
    if(isset($_FILES['img-product'])){
        $file_name = $_FILES['img-product']['name'];
        $file_size = $_FILES['img-product']['size'];
        $file_tmp = $_FILES['img-product']['tmp_name'];
        $file_ext=strtolower(end(explode('.',$file_name)));
        $expensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$expensions)===false){
            $_SESSION['err']="File chỉ hỗ trợ .jpeg, .jpg, .png";
        }
        else
        if($file_size > 2097152) {
            $_SESSION['err']='Kích thước file không được lớn hơn 2MB';
        }
        else{
            unset($_SESSION['err']);
            move_uploaded_file($file_tmp,"C:/xampp/htdocs/Image/".$file_name);
            $GLOBALS['conn']->insertData($name, $price, "/Image/".$file_name, $priceDiscount, $til, $quan,  $idCat);
        }
    }
    
}
}


function update_product(){
    
    if(!empty($_POST['name-product1'])&&!empty($_POST['price-product1'])&&!empty($_POST['quantity-product1'])&&!empty($_POST['title1'])){
    $id=$_POST['id'];
    $name=$_POST['name-product1'];
    $idCat;
    $category=$_POST['category1'];
    $price=$_POST['price-product1'];
    $priceDiscount=$_POST['discount-price-product1'];
    $quan=$_POST['quantity-product1'];
    $til=$_POST['title1'];
    if($category=="mới"){
        $idCat=3;
    }
    else if($category=="nam"){
        $idCat=1;
    }
    else
    $idCat=2;
    $file_name = $_FILES['img-product1']['name'];
    $file_ext=strtolower(end(explode('.',$file_name)));
    if(!empty($file_ext)){
        $file_name = $_FILES['img-product1']['name'];
        
        $file_size = $_FILES['img-product1']['size'];
        $file_tmp = $_FILES['img-product1']['tmp_name'];
        $file_ext=strtolower(end(explode('.',$file_name)));
        
        $expensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$expensions)===false){
            $_SESSION['err']="File chỉ hỗ trợ .jpeg, .jpg, .png";
        }
        else
        if($file_size > 2097152) {
            $_SESSION['err']='Kích thước file không được lớn hơn 2MB';
        }
        else{
            unset($_SESSION['err']);
            move_uploaded_file($file_tmp,"C:/xampp/htdocs/Image/".$file_name);
            $GLOBALS['conn']->insertData($id, $name, $price, "/Image/".$file_name, $priceDiscount, $til, $quan,  $idCat);
        }
    }
    else{
        
        $GLOBALS['conn']->updateData($id, $name, $price, $_POST['imgAdd'], $priceDiscount, $til, $quan,  $idCat);
    }
}
}
function delete_product(){
    $id=$_POST['delete'];
    $GLOBALS['conn']->delete($id);
}
if(array_key_exists('login', $_POST)){   
    add_product();
}
if(array_key_exists('log', $_POST)){   
    update_product();
}
if(array_key_exists('delete', $_POST)){  
    delete_product();
}

 ?>