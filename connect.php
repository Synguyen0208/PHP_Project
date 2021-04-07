<?php
$_SESSION['id']=8;
    $host ="localhost";
    $user ="root";
    $password="";
    $database="php_project";

    $conn= mysqli_connect($host, $user, $password, $database);
    //mysqli_set_charset($conn, 'UTF8');
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    if(array_key_exists('delete', $_POST)){
        $id=$_POST['delete'];
        mysqli_query($conn, "delete from cart where id=$id");
    }
?>