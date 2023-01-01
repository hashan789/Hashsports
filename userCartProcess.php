<?php

    session_start();

    Class UserCart{

        public function userCart(){
       

                $servername = "localhost";
                $username = "root";
                $password = '';
                $dbName = "featureproducts";
                
                $con = mysqli_connect($servername,$username,$password,$dbName);
              
                $userName = htmlspecialchars($_REQUEST['username']);
                $Password = htmlspecialchars($_REQUEST['Password']);
                
                $results = $con->query("SELECT * FROM user WHERE userName = '$userName' AND password = '$Password' LIMIT 1");
            
                if($results->num_rows != 0){
                    
                    $row = $results->fetch_assoc();
                    $verified = $row['verified'];
                    $email = $row['email'];
                    $date = $row['registerDate'];
                    $date = strtotime($date);
                    $date = date('M d Y',$date);
            
                    if($verified == 1){
                      
                         $_SESSION['firstName'] = $row['firstName'];
                       //  $_SESSION['secondName'] = $row['secondName'];
                         $_SESSION['profileImage'] = $row['profileImage'];
                         $_SESSION['userName'] = $row['userName'];
                         $_SESSION['email'] = $row['email'];
                         $_SESSION['userId'] = $row['userId'];

                         echo '<script>
                                 window.history.back();
                              </script>';
                    }
                    else{
                        $error = "This account has not yet been verified.";
                    }
                }
                else{
                    $error = "The username or password you entered is incorrect";
                }
 
                $_SESSION['error'] = $error;
              //  header('location: userVerify.php');
            }
            
               }

 
    $userCart = new UserCart();

    $userCart->userCart();
    
     if(isset($_POST['submit1'])){
         $id = $_POST['itemid'];
        $userCart->userCart();
    }

     else if(isset($_POST['submit2'])){
        $id = $_POST['itemid'];
        $userCart->userCart();
    }

    else if(isset($_POST['submit3'])){
        $id = $_POST['itemid'];
        $userCart->userCart();
    }

    else if(isset($_POST['submit4'])){
        $userCart->userCart();
    }



?>
