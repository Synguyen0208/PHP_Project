
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>
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
		
		if (isset($_SESSION['username']) && $_SESSION['password'] == true && $_SESSION['phone'] == true && $_SESSION['email'] == true && $_SESSION['id']==true && $_SESSION['address']==true) {
			$welcomeMessage = "Welcome to the member's area, " . $_SESSION['username'] . "!";
			} 
		else {
			header('Location: login.php');
			}
			require "connect.php";
			connect_db();
			include 'sendemail_auto/library.php';
			require 'sendemail_auto/vendor/autoload.php';
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
			$mail = new PHPMailer(true);
			require "oop.php";
			$dt = new database;
			include "cartfunction.php";
			if(array_key_exists('datee', $_POST)){
				$date = $_POST['datee'];
				$_SESSION ['date'] = $date;
			}
			if(array_key_exists('ship', $_POST)){	
				$code= $_POST['ship'];
				$_SESSION ['code'] = $code;
				$sql = "SELECT ship_fee FROM `shipping_company` WHERE code = {$code}";
				$query = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($query);
				$_SESSION['ship'] = $row['ship_fee'];
			}
			if(isset($_POST['order'])){
				$fee =  $_SESSION['ship'];
				$money = $_SESSION['total'];	
				$total = $fee + $money ;
				$id = $_SESSION['id'];
				$name = $_SESSION['username'];
				$address = $_SESSION['address'];
				$email = $_SESSION['email'];
				echo $email;
				$phone = $_SESSION['phone'];
				$code = $_SESSION ['code'];
				$date = $_SESSION ['date'];
				echo $date;
				$sql = " INSERT into `orders` (`id_cus`, `EDD`, `id_ship`, `money`, `ship_money`, `total_money`) values ({$id},'{$date}', {$code}, {$money}, {$fee}, {$total} );";
				$query = mysqli_query($conn, $sql);
				if ($query)
					{
						$mail->CharSet = "UTF-8";
						$mail->SMTPDebug = 0;                                 // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = SMTP_UNAME;                 // SMTP username
						$mail->Password = SMTP_PWORD;                           // SMTP password
						$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = SMTP_PORT;                                    // TCP port to connect to
						//Recipients
						$mail->setFrom(SMTP_UNAME, "Shop Khưa Sỹ Lương");
						$mail->addAddress($email, 'Tên người nhận');     // Add a recipient | name is option
						$mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');                 
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = "Đơn đặt hàng của bạn từ Shop Khưa Sỹ Lương";
						$mail->Body = "Đơn đặt hàng của bạn: ".$name."<p>Tại địa chỉ:".$address."</p><p>Tiền sản phẩm: ".$money."</p><p>Phí ship: ".$fee."</p><p>Tổng tiền: ".$total."</p><p>Định kiến ngày giao hàng : ".$date."<p>";
						$mail->AltBody = "Chào mừng bạn đến với chúng tôi! "; //None HTML
						$result = $mail->send();
								
							header('Location:checkout.php');
							echo "Bạn đã đặt hàng thành công";
						}
						else{

							echo $conn->error;
							echo "An error occurred during registration. <a href='dangky.php'>Thử lại</a>";

						}
				}
?>
	<?php include "header.php";?>

	<section id="cart_items">
		<div class="container">
			
			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-6 clearfix">
						<div class="bill-to">
							<p style="color:black;"><b>Bill To **</b></p>
							<div class="form-one">
								<form action="" method="post">
									<label style="color:red;">Customer *</label>
									<input type="text" placeholder="Customer" value="<?php echo $_SESSION['username'] ?>">
									<label style="color:red;">Email *</label>
									<input type="text" placeholder="Email" value="<?php echo $_SESSION['email'] ?>">
									<label style="color:red;">Shipping company *</label>
									<select name="ship">
										<option value="11">VNpost</option>
										<option value="12">Giaohangnhanh</option>
										<option value="14">Giaohangtietkiem</option>
										<option value="1234">LTE</option>
									</option>
									</select>
									<label style="color:red;">Address *</label>
									<input type="text" style="width: ;" placeholder="Address" value="<?php echo $_SESSION['address'] ?>">
									<label style="color:red;">Phone *</label>
									<input type="text" placeholder="Phone" value="<?php echo $_SESSION['phone'] ?>">
									<label style="color:red;">Prejudice day *</label>
									<input type="date" name="datee" placeholder="Prejudice day" >
									<button type="submit" name="nop">Save into order</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="order-message">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1153128987467!2d108.23938341416967!3d16.059504843965737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177e16d75991%3A0x711c915f162f6505!2zMTAxQiBMw6ogSOG7r3UgVHLDoWMsIEFuIEjhuqNpIMSQw7RuZywgU8ahbiBUcsOgLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1617880062686!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
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
												$_SESSION['total']=$allTotal;
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
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<form action="" method="post">
										<tr class="shipping-cost">
											<td>Shipping Cost</td>
											<td name="fee"><?php echo $_SESSION['ship'];?></td>										
										</tr>
										<tr>
											<td>Total</td>
											<td name="money"><span><?php echo $_SESSION['total']?><sup> đ</sup></span></td>
										</tr>
										<tr>
											<td><button type="submit" name="order">ORDER</button></td>
										</tr>
									</form>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

	<?php include "footer.php"?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="js/bb.js"></script>
</body>
</html>