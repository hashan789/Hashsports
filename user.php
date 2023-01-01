<?php

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root";
$password = '';
$dbName = "featureproducts";

$con = mysqli_connect($servername,$username,$password,$dbName);

$msg = '';

if(isset($_POST['upload'])){

        $target = "sportsimages/profiles/".basename($_FILES["profile"]["name"]);

         if(move_uploaded_file($_FILES['profile']['tmp_name'],$target)){
                if($_SERVER["REQUEST_METHOD"] == "POST"){ 
       
                        $firstName = htmlspecialchars($_REQUEST['first-name']);
                        $lastName = htmlspecialchars($_REQUEST['last-name']);
                        $userName = htmlspecialchars($_REQUEST['user-name']);
                        $email = htmlspecialchars($_REQUEST['email']);
                        $password = htmlspecialchars($_REQUEST['correct-password']);
                        $profileImage = $target;

                        if(strlen($password) < 8){
                            $msg = "your password must be at least 8 characters!";
                            header('location:userError.php');

                        }
                        else{
                                
                                //Grnerate verification Key
                                $verifyKey = md5(time().$userName);
                                
                          if($con){
                            $sql_insert_record = "INSERT INTO user (firstName,lastName,userName,email,password,profileImage,verifyKey) VALUES ('$firstName','$lastName','$userName','$email','$password','$profileImage','$verifyKey')";
                
                            $query = mysqli_query($con,$sql_insert_record);
                        }
                       $con->close();

                    //   if($query){
                               //Send email

                              $mail = new PHPMailer();

                              $mail->isSMTP();
                            
                            //  $mail->SMTPDebug = 1;
                              $mail->Host = "smtp.gmail.com";
                              $mail->SMTPAuth = true;
                              $mail->SMTPSecure = "ssl";
                              $mail->Port = 465;
                              $mail->Username = "hashanmalind123@gmail.com";
                              $mail->Password = "lskbkupasagycgng";
                              $mail->Subject = "Email verification";
                              $mail->setFrom("hashanmalind123@gmail.com");
                              $mail->isHTML(true);
                              $mail->Body = "<form method='POST' enctype='multipart/form-data'>";
                              $mail->Body .= "\r\nYour verification key is <input type='text' name='verifyKey' value='$verifyKey' />";
                              $mail->Body .= "<br/><br/>";
                              $mail->Body .=  "<button type='submit' name='submit'><a href='http://localhost/hashsports/verify.php?vKey=$verifyKey'>Register Account</a></button></form>";
                              $mail->addAddress($email);

                              if($mail->send()){
                                      header('location:accessVerify.php'); 
                              }
                              else{
                                      echo  $mail->ErrorInfo;
                              }

                              $mail->smtpClose();
                    //   }
                                    
                       }
         }else{
                 $msg = "there was a problem uploading image";
                 $_SESSION['img'] =  $img;
                 header('location:userError.php');
         }
        }
}
 
?>