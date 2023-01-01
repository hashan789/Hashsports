<?php

    session_start();

    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbName = "featureproducts";
    
    $con = mysqli_connect($servername,$username,$password,$dbName);

   if(isset($_POST['submit'])){
  
    $userName = htmlspecialchars($_REQUEST['userName']);
    $Password = htmlspecialchars($_REQUEST['password']);
    
    $results = $con->query("SELECT * FROM user WHERE userName = '$userName' AND password = '$Password' LIMIT 1");

   }

   else if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])){

    $userId = $_COOKIE['userId'];

    $results = $con->query("SELECT * FROM user WHERE userId = $userId LIMIT 1");
    
   }

    if($results->num_rows != 0){
        
        $row = $results->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];
        $user = $row['userId'];
        $date = $row['registerDate'];
        $date = strtotime($date);
        $date = date('M d Y',$date);

            //Set cookies 

       setcookie('userId',$user,time()+60*60*30);

        if($verified == 1){
          
             $_SESSION['firstName'] = $row['firstName'];
             $_SESSION['lastName'] = $row['lastName'];
             $_SESSION['profileImage'] = $row['profileImage'];
             $_SESSION['userName'] = $row['userName'];
             $_SESSION['email'] = $row['email'];
             $_SESSION['userId'] = $row['userId'];

             header('location: userProfile.php');
        }
        else{
            $error = "This account has not yet been verified.";
            $head = "This is an error!";
            header('location: userVerify.php');
        }
    }
    else{
        $error = "The username or password you entered is incorrect";
        $head = "This is an error!";
        header('location: userVerify.php');
    }
    $_SESSION['head'] = $head;

    $_SESSION['error'] = $error;



?>
