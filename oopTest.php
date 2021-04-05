<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>
<body>
    <?php 
        require 'oop.php';
        $dt = new database;
    ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php
            $i=0;
            $dt->select('select * from product') ;
            while($r = $dt->fetch()){
                $i++;
                echo '<tr>';
                echo '<td>'.$r['id'].'</td>';
                echo '<td>'.$r['name'].'</td>';
                echo '<td>'.$r['price'].'</td>';
                echo '<td><img src='.$r['image'].'></td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>