<?php
    require 'connect.php';
    //$dt = new database;
    global $conn;
    connect_db();
    if(isset($_POST['comment'])){
        $id = addslashes($_POST['id']);
        $account_id = addslashes($_POST['account_id']);
        $name = addslashes($_POST['name']);
        $mail = addslashes($_POST['mail']);
        $comm = addslashes($_POST['comm']);
        echo $comm;
        echo $mail;
        echo $name.'<br>';
        echo $id.'<br>';
        echo $phone;
        $sql = "
            INSERT INTO review (pro_id, account_id, review) VALUES
            ($id,$account_id,'$comm')
    ";
      //$dt->command("insert into `review`(pro_id, account_phone, review) values('$id', '$phone','$comm'");
    $query = mysqli_query($conn, $sql);
      header('Location: product-details.php?id='.$id.'');
    }
?>