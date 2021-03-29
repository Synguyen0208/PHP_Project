<?php
error_reporting(0);
session_start();
$_SESSION['dem']=1;
class connect_database{
    private $database_name;
    private $conn;

    function connect_database($name){
        $this->database_name=$name;
        $this->$conn = mysqli_connect("localhost", "root", "", "$this->database_name");
    }

    function getDatabaseName(){
        return $this->database_name;
    }

    function setDatabaseName($name){
        $this->database_name=$name;
    }

    private function execute($sql){
        if (!$this->$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($this->$conn, $sql);
        return $result;
    }

    public function insertData($name, $price, $image, $discount, $title, $quantity, $type){
        $today = date("Y-m-d");
        $sql="Insert into product(image, name, price, discount, quantity, title, id_category, date_added) values ('$image', '$name', $price, $discount, $quantity, '$title', $type, curdate());";
        if (!$this->execute($sql)){
            echo "<script>alert('Câu truy vấn bị sai!')</script>";
        }
    }


    public function updateData($id, $name, $price, $image, $discount, $title, $quantity, $type){
        
        $sql="update product set image='$image', name='$name', price=$price, discount=$discount, quantity=$quantity, title='$title', id_category=$type WHERE id=$id";
        
        if (!$this->execute($sql)){
            echo "<script>alert('Câu truy vấn bị sai!')</script>";
        }
        else echo "<script>alert('Cập nhật thành công!')</script>";
    }

    public function delete($id){
        $sql="DELETE FROM product where id=$id";
        if (!$this->execute($sql)){
            echo "<script>alert('Câu truy vấn bị sai!')</script>";
        }
        else echo "<script>alert('Xóa thành công!')</script>";
    }
    
    public function getData($table){
        $sql="SELECT pro.id as id, image, pro.name, price, discount, quantity, title, id_category, date_added, ca.name as category FROM `product` pro INNER JOIN category ca on pro.id_category=ca.id;";
        
        if (!$this->execute($sql)){
            die ('Câu truy vấn bị sai');
        }
        else
        return $this->execute($sql);
    }
}

 ?>