<?php 

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

   session_start();

   if(isset($_GET['userId'])){

           $userId = $_GET['userId'];

           define('DB_SERVER', 'localhost');
           define('DB_SEARCH', 'root');
           define('DB_PASSWORD','');
           define('DB_DATABASE', 'featureproducts');
               $db = mysqli_connect(DB_SERVER,DB_SEARCH,DB_PASSWORD,DB_DATABASE);
       
    
           $sql = "SELECT * FROM user WHERE userId = $userId";
           $result = mysqli_query($db,$sql);

           $count = mysqli_num_rows($result);

           $row = mysqli_fetch_assoc($result);

           $email = $row['email'];

           //Send email

           $mail = new PHPMailer();

           $mail->SMTPDebug = 2;
           $mail->Host = "smtp.gmail.com";
           $mail->SMTPAuth = true;
           $mail->SMTPSecure = "ssl";
           $mail->Port = 465;
           $mail->Username = "hashanmalind123@gmail.com";
           $mail->Password = "atlvlbrwwzryyynl";
           $mail->Subject = "Reset Password";
           $mail->setFrom("hashanmalind123@gmail.com");
           $mail->isHTML(true);
           $mail->Body = "<form method='POST' enctype='multipart/form-data'>";
           $mail->Body .= "\r\nYou can reset the password in the below link";
           $mail->Body .= "<br/><br/>";
           $mail->Body .=  "<button type='submit' name='submit'><a href='http://localhost/hashsports/repassVerify.php?userId=$userId'>Register Account</a></button></form>";
           $mail->addAddress($email);

           if($mail->send()){
                   header('location: repassAccessverify.php'); 
           }
           else{
                   echo "Email is not sent";
           }

           $mail->smtpClose();
   }
        


?>