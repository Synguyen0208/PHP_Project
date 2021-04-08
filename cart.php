<?php
	session_start();
		
	if (isset($_SESSION['username']) && $_SESSION['password'] == true && $_SESSION['phone'] == true && $_SESSION['email'] == true && $_SESSION['id']==true) {
		$welcomeMessage = "Welcome to the member's area, " . $_SESSION['username'] . "!";
		} 
	else {
		header('Location: login.php');
		}
	require 'oop.php';
	require 'connect.php';
	$dt = new database;
	connect_db();

	include "cartfunction.php";
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="css/menu_cart.css">
           
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php include "header.php" ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
					<tbody>
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
								
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
								$query="select * from cart where id_cus = {$_SESSION['id']}";
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
										<img src='<?php echo $image?>' height='200' width='250' >
									</td>
									<td>
										<?php echo $name?>
										<?php echo $title?>
									</td>
									<td >
										<input id="price<?php echo $row['id']?>" value=<?php echo $price?> readonly=true style="width: 6rem">
									</td>
									<form action="" method="post">
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
					}
				}
						?>
							</tbody>
						</table>
					</div>
				</tbody>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
			<p></p>
			<br>
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <?php echo $allTotal?><sup> đ</sup></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <?php echo number_format($allTotal,0,',','.');?><sup> đ</sup></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include "footer.php"?>
    
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="js/bb.js"></script>
</body>
</html>