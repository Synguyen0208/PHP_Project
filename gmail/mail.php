<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home</title>
    </head>
    <body>
    <?php
        
        if(isset($_POST["send"])){
            include "lib/PHPMailerAutoload.php";
            $mail = new PHPMailer;
            $mail->SMTPAuth = true;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'phpKhua@gmail.com';                     //SMTP username
            $mail->Password   = 'secret';                               //SMTP password
            $mail->SMTPSecure = "tls";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;   
            $mail->isHTML(true);  
            $mail->setFrom('systemtest@gmail.com', 'Mailer');
            $mail->addAddress($_POST["mail"], 'Joe User');                                 //Set email format to HTML
            $mail->Subject = $_POST["subject"];
            $mail->Body    = $_POST["content"];
            if(!$mail->send()){
                echo "Message could not be sent";
                echo "Mailer Error:".$mail->ErrorInfo;
            }
            else{
                echo "Message has been sent";
            }
                                             //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        }
    ?>
    <form action="" method="post">
        <table width="500">
            <tr>
                <td>Ho ten</td>
                <td><input type="text" name="fullname" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="mail" /></td>
            </tr>
            <tr>
                <td>Chu de</td>
                <td><input type="text" name="subject" /></td>
            </tr>
            <tr>
                <td>Noi dung</td>
                <td><textarea col="30" name="content" row="10"></textarea></td>
            </tr>
            <tr >
                <td colspan="2"><input type="submit" name="send" />
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>