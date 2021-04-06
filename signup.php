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
  
 // Hàm ngắt kết nối
 function disconnect_db()
 {
     // Gọi tới biến toàn cục $conn
     global $conn;
      
     // Nếu đã kêt nối thì thực hiện ngắt kết nối
     if ($conn){
         mysqli_close($conn);
     }
 }
    connect_db();
    
    if (isset($_POST['signup'])){
     //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
    
    //Lấy dữ liệu từ file signup.php
    $phone   = addslashes($_POST['phone']);
    $username   = addslashes($_POST['name']);
    $password   = addslashes($_POST['pass']);
    $email  = addslashes($_POST['email']);
    $code   = addslashes($_POST['code']);
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$phone|| !$code )
    {
        echo "Please enter full information. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    // Mã khóa mật khẩu
    $password = md5($password);
          
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    $sql = "SELECT user FROM account WHERE user='$username'";
    if (mysqli_num_rows(mysqli_query($conn,$sql)) > 0){
        echo "This username already exists. Please choose another username. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //echo $password.'<br>';
    //Kiem tra mat khau phai tu 8 ki tu tro len
    $pass = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$^";
    if (!preg_match($pass, $password))
    {
        echo "Minimum eight characters, at least one letter, one number. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

        //Kiểm tra email có đúng định dạng hay không
    $chuoi = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^";
    if (!preg_match($chuoi, $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
            
    //Kiểm tra email đã có người dùng chưa
    $sql2 = "SELECT email FROM members WHERE email='$email'";
    if (mysqli_num_rows(mysqli_query($conn, $sql2)) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //Lưu thông tin thành viên vào bảng
    $sql3 = "
            INSERT INTO account(phone, user, password, code, email) VALUES
            ('$phone','$username','$password','$code','$email')
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql3);

                     
    //Thông báo quá trình lưu
    if ($query)
        header('Location:login.php');//echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
    else
        echo "An error occurred during registration. <a href='dangky.php'>Thử lại</a>";
}
?>