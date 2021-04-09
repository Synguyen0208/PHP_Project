<?php
$id_cus=$_SESSION['id'];
$sql3="select count(id) as n from cart where id_cus=$id_cus";
$result=mysqli_query($conn, $sql3);
$row1=mysqli_fetch_assoc($result);						
$n=$row1['n'];

//Xoa san pham trong gio
if(array_key_exists('delete', $_POST)){
    $id=$_POST['delete'];
    mysqli_query($conn, "delete from cart where id=$id");
}
//Cập nhật số lượng sản phẩm trong giỏ hàng
if(array_key_exists('cartAdd', $_POST)){
    $id=$_POST['cartAdd'];
    $quantity=$_POST['quantity'];
    
    mysqli_query($conn, "update cart set quantity=$quantity where id=$id");
}
if(array_key_exists('addtocart', $_POST)){
    if(isset($_SESSION['id'])){
        echo $_SESSION['id'];
        $id_pro=$_POST['addtocart'];
        //echo $id_pro;
        $id_cus=$_SESSION['id'];
        $sql="insert into cart(id_cus, id_pro, quantity) values ($id_cus, $id_pro, 1)";
        
        $result=mysqli_query($conn, $sql);
        
        if(!$result){
            $sql1="update cart set quantity=quantity+1 where id_cus=$id_cus and id_pro=$id_pro";
            mysqli_query($conn, $sql1);
        }	
    }
}
?>