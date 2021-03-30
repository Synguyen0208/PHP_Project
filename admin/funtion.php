<?php
error_reporting(0);
require "class.php";
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
    if(isset($_FILES['image-product'])){
    $name=$_POST['name-product'];
    $idCom;
    $mass=$_POST['mass-product'];
    $category=$_POST['category'];
    $company=$_POST['company'];
    $price=$_POST['price-product'];
    $priceDiscount=$_POST['discount-price-product'];
    $quan=$_POST['quantity-product'];
    $til=$_POST['title'];
    $ED=$check=date("Y-m-d", strtotime( $_POST['ED']));
    $MGF=$_POST['MFG'];
    if($category=="Other"){
        $name_cat=$_POST['name-industry'];
        $newInd=new industry;
        $newInd->insertData($name_cat);
        $row2=mysqli_fetch_array($GLOBALS['conn']->execute("select max(id) from product_industry"));
        $category=$row2['max(id)'];
        echo $row2['maxid'];
    }
    if($company=="Other"){
        if(isset($_POST['name-company'])&&isset($_POST['address-company'])&&isset($_POST['manager-company'])&&isset($_POST['license-number'])){
            $name_com=$_POST['name-company'];
            $address_com=$_POST['address-company'];
            $manager_com=$_POST['manager-company'];
            $license=$_POST['license-number'];
            $newCom=new company;
           
            $newCom->insertData($name_com, $address_com, $manager_com, $license);
            $row2=mysqli_fetch_array($GLOBALS['conn']->execute("select max(id) from company"));
            $idCom=$row2['max(id)'];
        }
        
    }
    else{
        $idCom=$company;
    }   

   
    
    if(isset($_FILES['image-product'])){
        $file_name = $_FILES['image-product']['name'];
        $file_size = $_FILES['image-product']['size'];
        $file_tmp = $_FILES['image-product']['tmp_name'];
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
            $new=new product;
            $new->insertData($name, $price, $priceDiscount, $til, $ED, $MGF, "/Image/".$file_name, $mass, $category, $idCom, $quan);
        }
    }
    
}
}


function update_product(){
    $id=$_POST['idd'];
    $imgadd=$_POST['image'];
    $name=$_POST['name-productt'];
    $idCom;
    $mass=$_POST['mass-productt'];
    $category=$_POST['industryy'];
    $company=$_POST['companyy'];
    $price=$_POST['price-productt'];
    $priceDiscount=$_POST['discount-price-productt'];
    $quan=$_POST['quantity-productt'];
    $til=$_POST['titlee'];
    $ED=$check=date("Y-m-d", strtotime( $_POST['EDD']));
    $MGF=$_POST['MFGG'];
    if($category=="Other"){
        $name_cat=$_POST['name-industryy'];
        $newInd=new industry;
        $newInd->insertData($name_cat);
        $row2=mysqli_fetch_array($GLOBALS['conn']->execute("select max(id) from product_industry"));
        $category=$row2['max(id)'];
   
    }
    if($company=="Other"){
        if(isset($_POST['name-company'])&&isset($_POST['address-company'])&&isset($_POST['manager-company'])&&isset($_POST['license-number'])){
            $name_com=$_POST['name-company'];
            $address_com=$_POST['address-company'];
            $manager_com=$_POST['manager-company'];
            $license=$_POST['license-number'];
            $newCom=new company;
           
            $newCom->insertData($name_com, $address_com, $manager_com, $license);
            $row2=mysqli_fetch_array($GLOBALS['conn']->execute("select max(id) from company"));
            $idCom=$row2['max(id)'];
        }
        
    }
    else{
        $idCom=$company;
    }   
    $file_name = $_FILES['image-productt']['name'];
    $file_ext=strtolower(end(explode('.',$file_name)));
    if(!empty($file_ext)){
        $file_name = $_FILES['image-productt']['name'];
        
        $file_size = $_FILES['image-productt']['size'];
        $file_tmp = $_FILES['image-productt']['tmp_name'];
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
            $new=new product;
            $new->update($id, $name, $price, $priceDiscount, $til, $ED, $MGF, "/Image/".$file_name, $mass, $category, $idCom, $quan);
        }
    }
    else{
        $new=new product;
        $new->update($id, $name, $price, $priceDiscount, $til, $ED, $MGF, $imgadd, $mass, $category, $idCom, $quan);
    }
}
function delete_product(){
    $id=$_POST['delete'];
    $new=new product;
    $new->delete($id);
}
if(array_key_exists('add', $_POST)){   
    add_product();
}
if(array_key_exists('log', $_POST)){   
    update_product();
}
if(array_key_exists('delete', $_POST)){  
    delete_product();
}

 ?>