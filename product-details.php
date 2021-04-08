<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
          
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
		session_start();
		
		if (isset($_SESSION['username']) && $_SESSION['password'] == true && $_SESSION['phone'] == true && $_SESSION['email'] == true && $_SESSION['id']==true) {
			$welcomeMessage = "Welcome to the member's area, " . $_SESSION['username'] . "!";
			} 
		else {
			header('Location: login.php');
			}

		require 'connect.php';
		connect_db();
		include "cartfunction.php";	
		$phone=$_SESSION['phone'];
		$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
		if ($id){
			$data = get_product($id);
		}
		
		if (!$data){	
			header("location: index.php");
		}
		require 'oop.php';
		$dt = new database;
			
	?>
	<?php include "header.php" ?>	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Cleanser
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Makup remover</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Moisturizer</a></h4>
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
									<h4 class="panel-title"><a href="#">cream liner</a></h4>
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
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo $data['image']; ?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										<?php 
											$dt->select('select image from product order by view DESC limit 3;');
											$i=0;
											while($r = $dt->fetch()){
											$i++;
											echo '<img src="'.$r['image'].'" alt="Products" style="height:90px;width:90px;">';
											}
											?>			
										</div>
										<div class="item">
										<?php 
											$dt->select('select image from product order by view DESC limit 3;');
											$i=0;
											while($r = $dt->fetch()){
											$i++;
											echo '<img src="'.$r['image'].'" alt="Products" style="height:90px;width:90px;">';
											}
											?>		
										</div>
										<div class="item">
										<?php 
											$dt->select('select image from product order by view DESC limit 3;');
											$i=0;
											while($r = $dt->fetch()){
											$i++;
											echo '<img src="'.$r['image'].'" alt="Products" style="height:90px;width:90px;">';
											}
											?>		
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><input type="text" name="name" value="<?php echo $data['title']; ?>"/></h2>
								<?php if (!empty($errors['title'])) echo $errors['title']; ?>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>$<?php echo $data['price']; ?></span>
									<label>Quantity:</label>
									<input type="text" value="<?php echo $data['quantity']; ?>" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> <?php echo $data['status']; ?> </p>
								<p><b>Brand:</b><?php echo $data['name']; ?> </p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
							<?php 
									$dt->select('select * from product order by view DESC limit 4;');
									$i=0;
									while($r = $dt->fetch()){
									$i++;
									echo '<div class="col-sm-3">
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
							
							<div class="tab-pane fade" id="companyprofile" >
							<?php 
									$dt->select('select * from company limit 4;');
									$i=0;
									while($r = $dt->fetch()){
									$i++;
									echo '<div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="'.$r['img'].'" alt="Products" style="height:150px;">
                                                        <h2>'.$r['manager'].'</h2>
                                                        <h4><b>'.$r['address'].'</b></h4>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>';
									}
									?>			
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								<?php
									$dt->select("SELECT account.user, review.review, review.times
									FROM `review`
									INNER JOIN `account`
									ON review.account_id = account.id
									INNER join `product`
									on review.pro_id = product.id
									WHERE product.id = {$id};");
									$i=0;
									while($r = $dt->fetch()){
										echo " <ul>
										<li><a href=''><i class='fa fa-user'></i>".$r['user']."</a></li>
										<li><a href=''><i class='fa fa-calendar-o'></i>".$r['times']."</a></li>
										<p>".$r['review']."</p>
									</ul> ";			
										}
									?>
									
									<p><b>Write Your Review</b></p>				
									<form method = "post" action="review.php">
										<span>
											<input type="text" placeholder="Your Name" name="name" value="<?php echo $_SESSION['username'] ?>"/> 
											<input type="email" name="mail" value="<?php echo $_SESSION['email'] ?>"  placeholder="Email Address"/>
											<input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
											<input type="hidden" name="account_id" value="<?php echo $_SESSION['id']; ?>"/>
										</span>
										<textarea name="comm" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="submit" name="comment" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended products</h2>
						
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
	
	<!--footer--><?php include "footer.php"; ?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>