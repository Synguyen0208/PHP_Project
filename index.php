<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
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
	
</head>

<body >
<?php 
session_start();
//Kiem tra dang nhap
if (isset($_SESSION['username']) && $_SESSION['password'] == true) {
    $welcomeMessage = "Welcome to the member's area, " . $_SESSION['username'] . "!";
	} 
else {
    header('Location: login.php');
	}
	require 'oop.php';
	$dt = new database;
	require "connect.php";
	connect_db();
	include "cartfunction.php";
?>
	<?php include "header.php" ;?>
	<section id="slider" style="background-image: url('https://banghieu365.com/wp-content/uploads/2021/03/Phong-nen-mau-xanh-cong-ty-365_1.jpg'"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
								<h1><span>PINK</span>-SHOPPING</h1>
									<h2>Enjoy Shopping</h2>
									<p>Here there are many products for those who love beauty. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br>
									<img src="images/slide/lip.jpg" class="girl img-responsive" alt=""  />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<br>
									<h1><span>PINK</span>-SHOPPING</h1>
									<h2>Enjoy Shopping</h2>
									<p>Here there are many products for those who love beauty. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br>
									<img src="https://cdn.lamdieu.com/wp-content/uploads/2021/03/innisfree-green-tea.jpeg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<br>
								<div class="col-sm-6">
								<h1><span>PINK</span>-SHOPPING</h1>
									<h2>Enjoy Shopping</h2>
									<p>Here there are many products for those who love beauty. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br>
									<img src="http://kenhsao.vn/uploads/images/tumblr_poywwhONuC1vz2c9uo1_1280.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section >
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<br>
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Cleanser
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Make-up remover
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Moisturizer
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Toner</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Sunscreen</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Cream liner</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Cream for background</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Chalk covering</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Mascara</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Lip</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--new product-->
						<br>
						<h2 class="title text-center">NEW PRODUCT</h2>
						<?php
							$dt->select('select * from product');
							$i=0;
							while($r = $dt->fetch()){
							echo '<div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="'.$r['image'].'" alt="Products" style="height:200px;">
                                        <h2>'.$r['price'].'<sup>đ</sup></h2> 
                                        <h4>'.$r['name'].'</b></h4>   
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>'.$r['price'].'<sup>đ</sup></h2>
                                            <h4><b>'.$r['name'].'</b></h4>
                                            <form method="post" action="">
											<button name="addtocart" type="submit" value="'.$r['id'].'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                <a href="product-details.php?id='.$r['id'].'" class="btn btn-default add-to-cart"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
							}
						?>

					</div><!--new product-->
					
					<div class="category-tab"><!--category-tab-->
					<h2 class="title text-center">PRODUCT CATEGORY</h2>
						<div class="col-sm-12">
								<ul class="nav nav-tabs">
								<?php 
									$dt->select('select product.id, product.name, product.title,product.image, product.price, product.industry_id, product_industry.id, product_industry.industry
									from product
									inner join product_industry
									on product.industry_id = product_industry.id ;');
									$i=0;
									while($r = $dt->fetch()){
										$i++;
										echo '<li ><a href="#'.$r['industry_id'].'" data-toggle="tab" name="lotion">'.$r['industry'].'</a></li>';
									}
								?>
								</ul>
							</div>
							<div class="tab-content">
								<?php 
									$dt->select('select product.id, product.name, product.title,product.image, product.price, product.industry_id, product_industry.id, product_industry.industry
									from product
									inner join product_industry
									on product.industry_id = product_industry.id ;');
									$i=0;
									while($r = $dt->fetch()){
									$i++;
									
									echo '<div class="tab-pane fade active in" id="'.$r['industry_id'].'">
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="'.$r['image'].'"  alt="Products" style="height:150px;">
														<h2>'.$r['price'].'<sup>đ</sup></h2>
														<h4><b>'.$r['name'].'</b></h4>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
											</div>
										</div>
									</div>';
								}
								?>
							</div>
						</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Product recommended</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
								<div class="item active">
									<?php 
									$dt->select('select * from product order by view DESC limit 3;');
									$i=0;
									while($r = $dt->fetch()){
									$i++;
									echo '<div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="'.$r['image'].'" alt="Products" style="height:150px;">
                                                        <h2>'.$r['price'].'<sup>đ</sup></h2>
                                                        <h4><b>'.$r['name'].'</b></h4>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>';
									}
									?>
								</div>
								<div class="item">	
								<?php 
									$dt->select('select * from product order by view DESC limit 3;');
									$i=0;
									while($r = $dt->fetch()){
									$i++;
									echo '<div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="'.$r['image'].'" alt="Products" style="height:150px;">
                                                        <h2>'.$r['price'].'<sup>đ</sup></h2>
                                                        <h4><b>'.$r['name'].'</b></h4>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>';
									}
									?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<!--footer--><?php include "footer.php"; ?><!--/Footer-->

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>