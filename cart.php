<?php
	session_start();
	require_once('connect.php');
	// $id = $_GET['id'];
	// $prd=null;
	// //$item_quantity = (int)$_POST['item_quantity'];
	// if(isset($_SESSION['cart'][$id])){
	// 	$prd = $_SESSION['cart'][$id] +1;
	// }
	// else{
	// 	$prd = 1;
	// }

	// $_SESSION['cart'][$id] =$prd;
	// $sl =$_SESSION['cart'];
	//header('location:shop.php');
// 	// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
// 	if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
//     // Remove the product from the shopping cart
//     unset($_SESSION['cart'][$_GET['remove']]);
// }
$id_cus=$_SESSION['id'];
$sql3="select count(id) as n from cart where id_cus=$id_cus";
$result=mysqli_query($conn, $sql3);
$row1=mysqli_fetch_assoc($result);
$n=$row1['n'];
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="css/menu_cart.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
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
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart<sup style="color: blue; font-size: 1rem"><b><?php echo $n;?></b></sup></a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
										<li><a href="product-details.php">Product Details</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php" class="active">Cart</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.php">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
					<tbody>
						<?php
						// 	if(isset($_POST['update-cart'])){
						// 		ini_set("display_errors",0);
						// 		$quantity_cart=$_POST['quantity_cart'];
						// 		$query="update cart set quantity='$quantity_cart' where id_pro='$id'";
						// 		$result4 = mysqli_query($conn,$query);}
						// 		else{
						// 		ini_set("display_errors",0);
						// 	$id = $_GET['id'];
						// 	$sql ="SELECT * FROM product WHERE id ='$id'";
						// 	$sql2 ="SELECT * FROM cart WHERE id_pro ='$id'";
						// 	//$sql ="SELECT * FROM product WHERE id in (select id_pro from cart where id_cus ='$id')";
						// 	$result = mysqli_query($conn,$sql);
						// 	$result2 = mysqli_query($conn,$sql2);
							
						// 	$total=0;
							
						// 	$kq= mysqli_fetch_assoc($result);
						// 	$kq2= mysqli_fetch_assoc($result2);
						// 		//$total=$kq['price']*$kq2['quantity'];
							
						// 	if(isset($kq2)){
						// 		$q=$kq2['quantity']+1;
						// 		$query="update cart set quantity='$q' where id_pro='$id'";
						// 		$result3 = mysqli_query($conn,$query);
								
						// 	}
					
						// 	else{
						// 		$q=1;
						// 		$query="insert into cart(id_pro,quantity) value ($id,$q)";
						// 	$result3 = mysqli_query($conn,$query);
						// 	}
						// }
							
						?>

                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
									<th></th>
                                    <th>ITEM</th>
                                    <th>DESCRIPTION</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
							
                            <tbody class="text-center">
							<?php
								$query="select * from cart";
								$query2="select * from product";
								$result1=mysqli_query($conn,$query);
								$result2=mysqli_query($conn,$query2);
								$allTotal = 0;
								if((mysqli_num_rows($result1))&&(mysqli_num_rows($result2))){
									while($row=mysqli_fetch_assoc($result1)){
										$id_cart=$row['id_pro'];
										$quantity=$row['quantity'];
									
										while($row2=mysqli_fetch_array($result2)){
											$row3[]=$row2;
										}
										foreach($row3 as $row2){
											$id_pro=$row2['id'];
											$name=$row2['name'];
											$title=$row2['title'];
											$price=$row2['price'];
											$image=$row2['image'];
											$total=$price * $quantity;
											
											if ($id_cart==$id_pro){
												$allTotal += $total;
												?>
								<tr>
								<td>
								<input type="checkbox" onclick="if(document.getElementById('check<?php echo $row['id']?>').checked=true){

								}" name="" id="check<?php echo $row['id']?>"></td>
								<td>
								<img src='<?php echo $image?>' height='200' width='250' >
								</td>
								<td>
								<?php echo $name?>
								<?php echo $title?>
								</td>
								<td >
								<input id="price<?php echo $row['id']?>" value=<?php echo $price?> readonly=true style="width: 6rem">
								</td>
								<td>
									<form action="" method="post">
										<button name="cartAdd" value="<?php echo $row['id']?>" onclick="minute(<?php echo $row['id']?>)">-</button>
										<input type='number' min="0" name="quantity" style="width:5rem; text-align: center" readonly=true id="quantity<?php echo $row['id']?>"  value='<?php echo $quantity?>'>
										<button name="cartAdd" value="<?php echo $row['id']?>" onclick="plus(<?php echo $row['id']?>)">+</button>
									</form>
								</td>
								<td >
								<span id="total<?php echo $row['id']?>" value='<?php echo $total?>'><?php echo number_format($total,0,',','.');?></span>
								</td>
								<td>
									<form action="" method="post">
										<button name="delete" value="<?php echo $row['id']?>">Delete</button>
									</form>
								</td>
								</tr>
								<?php
											
											}
											}
									}}
								?>

							</tbody>
							
							</table>
						</div>
				</tbody>
				<input style="float: right" type="number" name="" id="">
		</div>
		
	
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <?php echo $allTotal?><sup> đ</sup></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <?php echo number_format($allTotal,0,',','.');?><sup> đ</sup></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="bb.js"></script>
</body>
</html>