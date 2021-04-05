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
        $conn = mysqli_connect('localhost', 'root', '', 'project') or die ('Can not connect to database');
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
 

function get_product($id, $phone)
{
    global $conn;
    
    connect_db();
    $sqll = "SELECT view.account_phone, view.vieww,view.pro_id 
    FROM view 
    inner join product
    on view.pro_id = product.id
    inner join account
    on view.account_phone = account.phone
    where view.pro_id = {$id} and view.account_phone={$phone} 
    ";
    $queryy = mysqli_query($conn, $sqll);
    if (mysqli_num_rows($queryy) == 0) {
        $view = "insert into `view` (`pro_id`, `account_phone`, `status`) VALUES ({$id}, '{$phone}', 'viewed')"; 
        $vieww = mysqli_query($conn, $view);
        $num = "update `product` set vieww = vieww + 1 where id = {$id}";
        $count = mysqli_query($conn, $num);
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
 
function add_product($name, $img, $price)
{
    global $conn;
     
    connect_db();
     
    $name = addslashes($name);
    $img = addslashes($img);
    $price = addslashes($price);
     
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO products(sp_name, sp_img, sp_price) VALUES
            ('$name','$img','$price')
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
// Hàm sửa sản phẩm
function edit_product($id, $name, $img, $price)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $name     = addslashes($name);
    $img        = addslashes($img);
    $price   = addslashes($price);
     
    // Câu truy sửa
    $sql = "
            UPDATE products SET
            sp_name = '$name',
            sp_img = '$img',
            sp_price = '$price'
            WHERE sp_id = $id
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
// Hàm xóa sinh viên
function delete_product($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
            DELETE FROM products
            WHERE sp_id = $id
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

?>