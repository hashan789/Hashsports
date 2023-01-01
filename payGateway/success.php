<?php

    if(!empty($_GET['tid']) && !empty($_GET['product'])){
        $GET = filter_var_array($_GET,FILTER_SANITIZE_STRING);

        $tid = $GET['tid'];
        $product = $GET['product'];
    }
    else{
        header('Location: pay.php');
    }

    if(isset($_SESSION['userId']))
      $userId = $_SESSION['userId'];
   else
        if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])){
          $userId = $_COOKIE['userId'];
          
          define('DB_SERVER', 'localhost');
          define('DB_SEARCH', 'root');
          define('DB_PASSWORD','');
          define('DB_DATABASE', 'featureproducts');
              $db = mysqli_connect(DB_SERVER,DB_SEARCH,DB_PASSWORD,DB_DATABASE);
      
  
          $sql = "SELECT * FROM user WHERE userId = $userId LIMIT 1";
          $result = mysqli_query($db,$sql);

          $count = mysqli_num_rows($result);

          $row = mysqli_fetch_assoc($result);

          $firstName = $row['firstName'];
          $secondName = $row['lastName'];
          $userName = $row['userName'];
          $email = $row['email'];

        }

        else
          $userId = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="../colom.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="../sportsimages/images/hashLogo.png">
    <script src="../menu.js"></script>
    <script src="../work.js"></script>
</head>
<body>
    <div class="row">
    <div class="col-1 menu">
    <div class="single-product">
     <img src="../sportsimages/images/menu.png" alt="" class="menu-icon left" onclick="menu();">
            <span>
                 <div class="menulist">
                   <ul id="menu-items" class="list">
                     <li><a href="../products.php">products</a></li>
                     <li><a href="about.html">about</a></li>
                     <li><a href="contact.html">contact</a></li>
                     <li><a href="<?php echo isset($userId) ? '../userProfile.php' : '../login.php' ?>">account</a></li>
                     <li><a href="../account.php">Register</a></li>
                     <li><a href="../login.php">Log in</a></li>
                   </ul>
                    <script src="../menu.js"></script>
                </div>
            </span>
            <a href="../index.php">
               <img src="../sportsimages/images/hashsports.png" alt="logo" class="logo">
            </a>
            <span class="right">
            <a href="<?php echo isset($userId) ? '../cart.php' : '../login.php' ?>" style="text-decoration: none;">
               <img src="../sportsimages/images/cart.png" alt="" width="30px" height="30px">
               <span class="t-items"><?php echo $_SESSION['total_items'] ?? 0 ; ?></span>
            </a>
            <a href="<?php echo isset($userId) ? '../wishlist.php' : '../login.php' ?>" name='wishlist' class='btn-img'>
                <img src='../sportsimages/images/3551002-200.png' width='30px' height='30px'>
            </a>
            </span>
            </div>
        </div>
    </div>
    <div class="col-3 success">
        <h2 class="font1">Thank you for purchasing</h2>
        <hr>
        <p class="font1">your transaction ID is <?php echo $tid;?></p>
        <br>
        <p class="font1">Check your email for more info</p>
        <p class="font1"><a href="pay.php">Go Back</a></p>
    </div>
    <div class="col-3">
      <div class="th-u">
       <img src="../sportsimages/images/download.jfif" alt="" srcset="" class="thank">
      </div>
    </div>
    <div class="col-1 bg-down">
    <div class="col-5">
            <h3 class="font1 fHead">Information</h3>
            <div class="footer">
               <h2 class="font1">Privacy policy</h2>
               <h2 class="font1">About us</h2>
               <h2 class="font1">Delivery information</h2>
               <h2 class="font1">Teams & Conditions</h2>
            </div>
        </div>
        <div class="col-5">
            <h3 class="font1 fHead">Account</h3>
            <div class="footer">
                <h2 class="font1">My Account</h2>
                <h2 class="font1">Order history</h2>
                <h2 class="font1">Wish list</h2>
            </div>
        </div>
        <div class="col-6">
            <h3 class="fHead font1">Follow us</h3>
            <div class="footer">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
        <div class="col-1">
           <h5 class="font1 copyright">&#169; hashsports 2021 Inc. | All Rights Reserved.</h5>
        </div>
    </div>
</body>
</html>