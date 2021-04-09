<?php
    session_start();
    require('connect.php');
	connect_db();
	$id_cus=$_SESSION['id'];
	$sql3="select count(id) as n from cart where id_cus=$id_cus";
	$result=mysqli_query($conn, $sql3);
	$row1=mysqli_fetch_assoc($result);
	$n=$row1['n'];
	connect_db();

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
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
    <?php include "header.php" ?>
     <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">           
                <div class="col-sm-12">                         
                    <h2 class="title text-center">Contact <strong>Us</strong></h2> 
                    <div align="center"><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7668.275101841235!2d108.23165384686939!3d16.058350399875195!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1617883231396!5m2!1svi!2s" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>                                                    
                    
                    </div>
                </div>                  
            </div>      
            <br>
            <p></p>
            <div class="row">   
                <div class="col-sm-8">
                   
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" >
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-success" value="Submit">Submit</button>
                            </div>
                        </form>
                    
                </div>
                <?php
                    //use PHPMailer\PHPMailer\PHPMailer;
                    //ini_set("display_errors",0);
                    //require_once 'PHPMailer-master/src/Exception.php';
                    //require_once 'PHPMailer-master/src/PHPMailer.php';
                    //require_once 'PHPMailer-master/src/SMTP.php';

                    //$mail = new PHPMailer();
					include 'sendemail_auto/library.php';
					require 'sendemail_auto/vendor/autoload.php';
					use PHPMailer\PHPMailer\PHPMailer;
					use PHPMailer\PHPMailer\Exception;
					$mail = new PHPMailer(true);
                    
					$email=$_POST['email'];
                    $alert = '';
                    try{
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'hangqt3621@gmail.com'; 
                        $mail->Password = 'Hang@362174';
                        $mail->Port = 465;
                        $mail->SMTPSecure = "ssl";

                        $mail->setFrom('hangqt3621@gmail.com', 'Admin');
                        $mail->addAddress($email);

                        $mail->isHTML(true);
                        $mail->Subject = "WELCOME TO E-Shopper";
                        $mail->Body = "Luong Khua Sy team";

                        $mail->send();
                        $alert = '<div class="alert-success"> 
                                    <span>Message Sent! Thank you for contacting us.</span>
                                    </div>';
                    } catch (Exception $e){
                        $alert = '<div class="alert-error">
                                    <span>'.$e->getMessage().'</span>
                                </div>';
                    }                                                   

                    //header("location: index.php")                                                                                        
                    ?>
                
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <p>E-Shopper Inc.</p>
                            <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                            <p>Newyork USA</p>
                            <p>Mobile: +2346 17 38 93</p>
                            <p>Fax: 1-714-252-0026</p>
                            <p>Email: info@e-shopper.com</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>              
            </div>  
        </div>  
    </div><!--/#contact-page-->
    
    <?php include "footer.php";?>

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>