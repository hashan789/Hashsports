<?php

    session_start();

     include 'user.php';

    //if($_SERVER["REQUEST_METHOD"] == "POST"){ 
       if(isset($_GET['userId'])){
         
          $userId = $_GET['userId'];

          $rePassword = $_POST['rePassword'];
    
          $servername = "localhost";
          $username = "root";
          $password = '';
          $dbName = "featureproducts";
         
         $Error = '';
         $head = '';
        
         $con = mysqli_connect($servername,$username,$password,$dbName);
    
         $resultSet = $con->query("SELECT verified,verifyKey FROM user WHERE verified = 1 AND userId = $userId LIMIT 1");
    
         if($resultSet->num_rows == 1){
           //Validate the email
           $update = $con->query("UPDATE user SET password = $rePassword WHERE userId = $userId LIMIT 1");
    
           if($update){
              $head = "your process is successfully done!";
              $Error = "Your passowrd has been successsfully reset.you now can <a href='login.php'>login</a>.";

              $_SESSION['error'] = $Error;
              $_SESSION['head'] = $head;
     
              header('location: repassSuccess.php');
           }
           else{
             $Error = "Something went wrong!";
           }
         }
         else{
           $Error = "This account is invalid or already verified.";
           $head = "The account is not yet verified.";        
         }

         $_SESSION['error'] = $Error;
         $_SESSION['head'] = $head;

         header('location: repassSuccess.php');
      }


?>