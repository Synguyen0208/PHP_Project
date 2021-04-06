<?php
    $host ="localhost";
    $user ="root";
    $password="";
    $database="project";

    $conn= mysqli_connect($host, $user, $password, $database);
    //mysqli_set_charset($conn, 'UTF8');
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
?>