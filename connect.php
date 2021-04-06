<?php
// Biến kết nối toàn cục
global $conn;
 
// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'php_project') or die ('Can not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}
 
function disconnect_db()
{
    global $conn;
     
    if ($conn){
        mysqli_close($conn);
    }
}
function addView($id){
    global $conn;
    
    connect_db();

    $sql = "
    SELECT product.vieww
    FROM `product`
    WHERE id= {$id}";
    $query = mysqli_query($conn, $sql); 
    
    if (mysqli_num_rows($query) == 0){
        $num = "update `product` set vieww = vieww + 1 where id = {$id}";
        $view = mysqli_query($conn, $num);
    }
    
}

function get_product($id)
{
    global $conn;
    
    connect_db();
    $sqll = "
    SELECT product.id, product.view
    FROM `product`
    WHERE id= {$id}";
    $queryy = mysqli_query($conn, $sqll); 
    
    if (mysqli_num_rows($queryy) > 0){
        $num = "update `product` set view = view + 1 where id = {$id}";
        $view = mysqli_query($conn, $num);
    }

    $sql = "
        select product.id, product.name, product.title, product.price, product.image, product.status, manager_stock.quantity, company.name
        from product
        INNER join manager_stock
        on product.id = manager_stock.id_pro 
        inner join company 
        on product.id_com = company.id
        where product.id = {$id}";
     /* SELECT view.pro_id, product.name, product.image, product.price 
        FROM `view` 
        INNER JOIN `product` 
        ON view.pro_id = product.id LIMIT 2;
        */
    $query = mysqli_query($conn, $sql); 
     
    $result = array();
     
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    } 
    return $result;
}
 

?>