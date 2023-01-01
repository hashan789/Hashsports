<?php

   session_start();

   if(isset($_SESSION['userId']))
          $userId = $_SESSION['userId'];
   else 
        if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId']))
                $userId = $_COOKIE['userId'];
        else
                $userId = null;

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
                $profileIamge = $row['profileImage'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($userId) ? $userName : 'Unkonwn' ; ?> profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="colom.css">
    <script src="work1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" type="image/png" href="sportsimages/images/hashLogo.png">
    <script src="work.js"></script>
</head>
<body onload="<?php echo isset($userId) ? '' : 'close()'; ?>">
      <div class="row" id="demo1">
      <div class="col-1 menu">
      <div class="full-mnu">
            <div class="menu1-mnu">
                <img src="sportsimages/images/menu.png" alt="" class="menu-icon left" onclick="menu();">
            </div>
            <div class="menu2-mnu menu6-mnu menu8-mnu">
            <a href="index.php">
                <img src="sportsimages/images/hashsports.png" alt="logo" class="logo-mnu">
            </a> 
            </div>
            <div class="menu4-mnu menulist">
                <ul id="menu-items" class="list-mnu">
                    <li><a href="products.php">products</a></li>
                    <li><a href="about.html">about</a></li>
                    <li><a href="contact.html">contact</a></li>
                    <li><a href="<?php echo isset($userId) ? 'userProfile.php' : 'login.php' ?>">account</a></li>
                    <li><a href="account.php">register</a></li>
                    <li><a href="login.php">log in</a></li>
                </ul>
                    <script src="menu.js"></script>
                    <img src="sportsimages/images/hashsports.png" alt="logo" class="log-mnu">
            </div>
            <div class="menu5-mnu">
                <div class="m-cart-mnu">
                  <a href="<?php echo isset($userId) ? 'cart.php' : 'login.php' ?>" style="text-decoration: none;">
                    <img src="sportsimages/images/cart.png" alt="cart" class="cart-mnu">
                  </a>
                    <div class="item-num-mnu">
                        <h4 class="h4-mnu"><?php echo $_SESSION['total_items'] ?? 0 ; ?></h4>
                    </div>
                    <a href="<?php echo isset($userId) ? 'wishlist.php' : 'login.php' ?>" name='wishlist' class='btn-img'>                    
                       <img src="sportsimages/images/3551002-200.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div class="col-1">
            <div class="user-box" style="text-align:center;margin-top:50px;">
             <div class="col-2">
                <div class="pro-img" style="margin:60px;margin-top:0.5ch;">
                  <img src="<?php echo $profileIamge; ?>" alt="" srcset="">
               </div>
            </div>
             <div class="col-4" >
                <h1 class="font2"><?php echo $userName ?? null; ?></h1>
                <h2 class="font1" style="font-size: 15px;">welcome to the hashsports.your user details have been shown in the following</h2>
                <div class="details">
                    <h3 class="font1">Full name : <span class="font3"><?php echo $firstName ?? null; ?>  <?php echo $secondName ?? null; ?></span></h3>
                    <h3 class="font1">E-mail : <span class="font3"><?php echo $email ?? null; ?></span></h3>
                </div>
                <small class="">change your profile</small>
                <div class="acc-details">
                    <h3 class="font1">Account no :</h3>
                    <h3 class="font1">Your amount : <span class="font3"><?php echo isset($_SESSION['amount']) ? '$ '.$_SESSION['amount'].' 00' : 'Please you must be gone to the <a href="cart.php">cart</a>.' ; ?></span></h3>
                </div> 
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
      </div>
      </div>

      <div id="demo" class="hide">
        <div class="col-3 border-log box" style="height:800px;">
        <div class="form-btn">
            <span class="font1" onclick="logIn()">Login</span>
            <span class="font1" onclick="signUp()">Register</span>
            <hr id="line">
        </div>
        <br>
        <div class="centerele">
        <form action="userProcess.php" method="POST" id="login" class="login">
            <input type="text" name="userName" placeholder="username">
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="submit" class="exp-btn btn-a btn"  onclick="close1();">Login</button>
            <a href="">Forget password</a>
        </form>
      <form action="user.php" method="POST" id="signup" enctype="multipart/form-data">
              <div style="margin-bottom:80px;">
                 <img src="sportsimages/images/user.png" alt="profile" width="150px" height="150px" class="profile-logo">
                 <img src="sportsimages/images/568122.png" alt="camera" srcset="" width="50px" height="50px" class="file">
                 <input type="file" name="profile" id="" class="profile-pic">
              </div>
            <input type="text" name="first-name" placeholder="First name" required>
            <input type="text" name="last-name" placeholder="Last name" required>
            <input type="text" name="user-name" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" placeholder="Password" id="pass" required>
            <input type="password" name="correct-password" placeholder="Confirm Password" id="conf-pass" required>
            <small id="error"></small>
            <br>
            <button type="submit" class="exp-btn btn-a btn" id="click" name="upload"  onclick="close1();">Register</button>
            <script src="reload.js"></script>
       </form>
        </div>
    </div>
    </div>
</body>
</html>