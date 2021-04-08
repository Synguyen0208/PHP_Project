<?php
error_reporting(0);
require "class.php";
include "../sendMail/sendMail.php";
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
    private function checkError($result){
        if(!$result)
            echo "<script>alert('Thực thi không thành công!')</script>";
        return $result;
    }
    public function insert($state){
        $sql="insert into ".$state;
        
        return $this->checkError($this->execute($sql));
    }
    public function update($state, $id){
        $sql="update ".$state." where id=$id";
        echo $sql;
        $this->checkError($this->execute($sql));
    }
    public function delete($state, $id){
        $sql="delete from  ".$state." where id=$id";
        echo $sql;
        $this->checkError($this->execute($sql));
    }
    public function select($state){
        $sql="select".$state;
        return $this->execute($sql);
    }
}


$conn=new connect_database("php_project");
$sql=" count(id) as quan_pro, (SELECT count(id) from account_admin) as quan_accAD, (SELECT COUNT(id) FROM company) as quan_com, (SELECT COUNT(id) FROM account) as quan_acc, (SELECT COUNT(id)  from orders) as quan_or from product";
$result=$conn->select($sql);
$count=mysqli_fetch_array($result);
//PRODUCT
function add_product(){
    if(isset($_FILES['image-product'])){
    $name=$_POST['name-product'];
    $idCom;
    $mass=$_POST['mass-product'];
    $category=$_POST['category'];
    $company=$_POST['company'];
    $price=$_POST['price-product'];
    $discount=$_POST['discount-price-product'];
    $quantity=$_POST['quantity-product'];
    $title=$_POST['title'];
    $ED=date("Y-m-d", strtotime( $_POST['ED']));
    $MFG=$_POST['MFG'];
    if($category=="Other"){
        $name_cat=$_POST['name-industry'];
        $sql="product_industry(industry) values('$name_cat');";
        $GLOBALS['conn']->insert($sql);
        $row2=mysqli_fetch_array($GLOBALS['conn']->select(" max(id) from product_industry"));
        $category=$row2['max(id)'];
    }
    if($company=="Other"){
        if(isset($_POST['name-company'])&&isset($_POST['address-company'])&&isset($_POST['manager-company'])&&isset($_POST['license-number'])){
            $name_com=$_POST['name-company'];
            $address_com=$_POST['address-company'];
            $manager_com=$_POST['manager-company'];
            $license=$_POST['license-number'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $sql="company(name, address, manager, license_number, phone, email) values('$name_com', '$address_com', '$manager_com', '$license', '$phone', '$email');";
            $GLOBALS['conn']->insert($sql);
            $row2=mysqli_fetch_array($GLOBALS['conn']->select(" max(id) from company"));
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
            $image='/Image/'.$file_name;
            $sql="product(name, price, sell_price, title, ED, MFG, image, mass, industry_id, id_com, quantity)
            values('$name', $price, $discount, '$title', '$ED', '$MFG', '$image', $mass, $category, $idCom, $quantity);";
            $GLOBALS['conn']->insert($sql);
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
    $discount=$_POST['discount-price-productt'];
    $quan=$_POST['quantity-productt'];
    $til=$_POST['titlee'];
    $ED=date("Y-m-d", strtotime( $_POST['EDD']));
    $MGF=$_POST['MFGG'];
    if($category=="Other"){
        $name_cat=$_POST['name-industryY'];
        $sql="product_industry(industry) values('$name_cat');";
        $GLOBALS['conn']->insert($sql);
        $row2=mysqli_fetch_array($GLOBALS['conn']->select(" max(id) from product_industry"));
        $category=$row2['max(id)'];
    }
    if($company=="Other"){
        if(isset($_POST['name-company'])&&isset($_POST['address-company'])&&isset($_POST['manager-company'])&&isset($_POST['license-number'])){
            $name_com=$_POST['name-company'];
            $address_com=$_POST['address-company'];
            $manager_com=$_POST['manager-company'];
            $license=$_POST['license-number'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $sql="company(name, address, manager, license_number, phone, email) values('$name_com', '$address_com', '$manager_com', '$license', '$phone', '$email');";
            $GLOBALS['conn']->insert($sql);
            $row2=mysqli_fetch_array($GLOBALS['conn']->select(" max(id) from company"));
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
            $image="/Image/".$file_name;
            $sql="Update product set name='$name', price=$price, discount=$discount, title='$tit', ED='$ED', MFG='$MGF', image='$image', mass=$mass, industry_id=$category, id_com=$idCom, quantity=$quan ";
            $GLOBALS['conn']->update($sql, $id);
        }
    }
    else{
        $sql="Update product set name='$name', price=$price, discount=$discount, title='$tit', ED='$ED', MFG='$MGF', image='$imagadd', mass=$mass, industry_id=$category, id_com=$idCom, quantity=$quan ";
        $GLOBALS['conn']->update($sql, $id);
    }
}
function delete_product(){
    $id=$_POST['delete'];
    $GLOBALS['conn']->delete("product", $id);
}


//SUPPLIER  
function add_supplier(){

    $name=$_POST['name'];
    $manager=$_POST['manager'];
    $address=$_POST['address'];
    $license=$_POST['license'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $sql="company(name, address, manager, license_number, phone, email) values('$name', '$address', '$manager', '$license', '$phone', '$email');";
    $GLOBALS['conn']->insert($sql);

}
function update_company(){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $manager=$_POST['manager'];
    $address=$_POST['address'];
    $license=$_POST['license'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $sql="company set name='$name', address='$address', manager='$manager', license_number='$license', phone='$phone', email='email' ";
    $GLOBALS['conn']->update($sql, $id);

}

function delete_company(){
    $id=$_POST['deleteCom'];
    echo $_POST['bool'];
    if($_POST['bool']==True){
        $GLOBALS['conn']->delete("company", $id);
    }
}


//Account
function register(){
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
if($password!=$confirm){
    $_SESSION['err']="Mật khẩu không trùng khớp";
}
else{
    
    $code=rand(100000, 999999);
    $_SESSION['code']=$code;
    $title = 'Confirm Account';
    $content = "Đây là mã code xác nhận account admin của bạn $code";
    
    $nTo = 'Account admin';
    $mTo = "$email";
    $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
    if($mail!=1){
        echo "<script>alert('Lỗi gửi mail!')</script>";
    }
    else{
        $_SESSION['sql1']="account_admin(email, password, status) values('$email', '$password', 'Not Accept')";
        $_SESSION['email']=$email;
        header('location: Confirm.php');
    }
    
}
}
function confirm(){
    if(!empty($_POST['code'])){
        
        $code=$_POST['code'];
        if($code==$_SESSION['code']){
            $_SESSION['errcode']="";
            if($_SESSION['message']=="1")
                header("location: reset.php");
            else{
                if($GLOBALS['conn']->insert($_SESSION['sql1']))
                header("location: login.php");
            }
            
        }
        else
        $_SESSION['errcode']="The code is not correct!";
    }
    
}
function login(){
    $check=0;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="*from account_admin;";
    $result=$GLOBALS['conn']->select($sql);
    while ($row = mysqli_fetch_array($result)) {
        if($row['email']==$email&&$row['password']==$password){
            if($row['status']=="accept"){
                $_SESSION['user_admin']=array(
                    'email'=>$email,
                    'password'=>$password
                );
                header("location: ../index.php");
            }
            
            else
            header("location: notAccept.php");
        }
    }
}
function reset_pass(){
    $email=$_POST['email'];
    $sql="*from account_admin;";
    $result=$GLOBALS['conn']->select($sql);
    while ($row = mysqli_fetch_array($result)){
        if($row['email']==$email){
                $code=rand(100000, 999999);
                $_SESSION['code']=$code;
                $title = 'Confirm Account';
                $content = "Đây là mã code xác nhận account admin của bạn $code";
                $nTo = 'Account admin';
                $mTo = "$email";
                $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                if($mail!=1)
                    echo "<script>alert('Lỗi gửi mail!')</script>";
                
                else{
                    $_SESSION['message']="1";
                    $_SESSION['email_forgot']=$email;
                    header("location: Confirm.php");
                }
                
        }
    }
}
function reset_password(){
    $email=$_SESSION['email_forgot'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm-password'];
    if(!empty($_POST['password'])){
        if($password==$confirm){
            $sql="update account_admin set password='$password' where email='$email'";
            if($GLOBALS['conn']->execute($sql))
            header('location: login.php');
        }
        else
        $_SESSION['err2']="The password does not match";
    }
    else
    unset($_SESSION['err2']);
    
}
function setStatus($table, $status){
    $result = explode("-", $status);
    if($result[1]=="1"){
        $sql="$table set status ='accept'";
        $GLOBALS['conn']->update($sql, $result[0]);
    }
    else{
        $sql="$table set status ='Not Accept'";
        $GLOBALS['conn']->update($sql, $result[0]);
    }
    
}
function changePassword(){
    $email=$_POST['email'];
    $newPassword=$_POST['new'];
    $sql="update account_admin set password ='$newPassword' where email='$email'";
    $GLOBALS['conn']->execute($sql);
}
function addAccountAdmin(){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $status=$_POST['status'];
    $sql=" account_admin(email, password, status) values ('$email', '$password', '$status')";
    $GLOBALS['conn']->insert($sql);
}
if(array_key_exists('add', $_POST)){   
    add_product();
}
if(array_key_exists('addCom', $_POST)){   
    add_supplier();
}
if(array_key_exists('log', $_POST)){   
    update_product();
}
if(array_key_exists('EditCom', $_POST)){   
    update_company();
}
if(array_key_exists('delete', $_POST)){  
    delete_product();
}
if(array_key_exists('deleteCom', $_POST)){  
 delete_company();
}
if(array_key_exists('register', $_POST)){  
    register();
}
if(array_key_exists('confirm', $_POST)){  
    confirm();
}
if(array_key_exists('login', $_POST)){  
    login();
}
if(array_key_exists('reset', $_POST)){  
    reset_pass();
}
if(array_key_exists('resetpassword', $_POST)){  
    reset_password();
}

if(array_key_exists('setStatus', $_POST)){  
    $status=$_POST['setStatus'];
    setStatus("account_admin", $status);
}

if(array_key_exists('setStatusAcc', $_POST)){  
    $status=$_POST['setStatusAcc'];
    echo $status;
    setStatus("account", $status);
}
if(array_key_exists('change', $_POST)){  
    changePassword();
}
if(array_key_exists('Update', $_POST)){  
    $id=$_POST['Update'];
    $status=$_POST['status'];
    $GLOBALS['conn']->update("orders set id_status=$status", $id);
}
if(array_key_exists('deleteAccountAdmin', $_POST)){  
    $id=$_POST['deleteAccountAdmin'];
    $GLOBALS['conn']->delete("account_admin", $id);
}
if(array_key_exists('addAccAD', $_POST)){  
    addAccountAdmin();
}
if(array_key_exists('import', $_POST)){  
    $id=$_POST['import'];
    $quantity=$_POST['Quantity'];
    $GLOBALS['conn']->insert(" manager_stock(id_pro, quantity, date_added) values($id, $quantity, curdate())");
}
 ?>