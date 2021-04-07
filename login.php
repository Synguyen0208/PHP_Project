<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet"> 
	<link href="css/beauty.css" rel="stylesheet">     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body style="background-image: url('https://funart.pro/uploads/posts/2020-04/1586718025_2-p-sinie-foni-s-tsvetami-8.jpg');">
<?php
//Khai báo sử dụng session
session_start();
 require "signup.php";
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý log in
if (isset($_POST['login'])) 
{
    global $conn;
    
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'php_project') or die ('Can not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
     
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['pass']);
     
    if (!$username || !$password) {
        echo "Please enter your full username and password. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    $password = md5($password);
	$sql = "SELECT id, phone, user, password, email FROM account WHERE user='$username'";
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 0) {
        echo "This username does not exist. Please check again. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
	
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Incorrect password. Please re-enter. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
	if(isset($_POST['check'])){
	$_SESSION['id']=$row['id'];
    $_SESSION['username'] = $row['user'];
	$_SESSION['password']=$row['password'];
	$_SESSION['email']=$row['email'];
	$_SESSION['phone']=$row['phone'];
	}
    header('Location:index.php');
	die();
}
?>
	<header id="header" ><!--header-->
		<div class="header_top" style="background-image: url('https://i.pinimg.com/564x/6b/85/b8/6b85b8588d5096bb8ad2ba672ae8122d.jpg');"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="" style="color:white;"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="" style="color:white;"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="" style="color:white;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="" style="color:white;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="" style="color:white;"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="" style="color:white;"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="" style="color:white;"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle header-body"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.php"><img style="width:50%; " src="image/logo1.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="" style="background:#FF6666;color:white;"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="" style="background:#FF6666;color:white;"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.php" style="background:#FF6666;color:white;"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php" style="background:#FF6666;color:white;"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php" style="background:#FF6666;color:white;"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="header-bottom "><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						
						<div class="mainmenu pull-left ">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li ><a href="index.php" style="color:white">Home</a></li>
								<li class="dropdown"><a href="#"style="color:white">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php" >Products</a></li>
										<li><a href="product-details.php">Product Details</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<?php
											if(isset($_SESSION['username'])){
												echo "<li><a href='login.php'><i class='fa fa-lock'></i> Logout</a></li>";
											}
											else{
												echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login</a></li>";
											}	
										?> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#"style="color:white">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.php">Blog List</a></li>
										<li><a href="blog-single.php">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.php" style="color:white">404</a></li>
								<li><a href="contact-us.php"style="color:white">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<!--<p style="text-align:center;"><img  src="images/icon/user.png" alt="user"></p>-->
						<h2 style="text-align:center;color:orange;"><b>LOGIN</b></h2>
						<form method="post" action="login.php">
							<input type="text" placeholder="Name" name="username"/>
							<input type="password" placeholder="Password" name="pass"/>
							<span>
								<input type="checkbox" name="check" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
					<h2 style="text-align:center;color:orange;"><b>SIGN UP</b></h2>
						<form method = "post" action="signup.php">
							<input type="text" placeholder="Name" name="name"/>
							<input type="password" placeholder="Password" name="pass"/>
							<input type="tel" placeholder="Phone number" name="phone" /><br>
							<input type="text" placeholder="Email" name="email" /><br>
								<?php
								$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
								function generate_string($input, $strength = 16) {
									$input_length = strlen($input);
									$random_string = '';
									for($i = 0; $i < $strength; $i++) {
										$random_character = $input[mt_rand(0, $input_length - 1)];
										$random_string .= $random_character;
									}
								 
									return $random_string;
								}
								echo "Code: <div style='background:pink; width:60px; height:20px;'>";
								echo generate_string($permitted_chars, 6);
								echo "</div><br>";
								?>
							<input type="text" placeholder="Enter your code" name="code" />
							<button type="submit" name="signup" class="btn btn-default">Signup</button>
						</form>
						
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>