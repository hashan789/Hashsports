<?php
    session_start();

    if(isset($_SESSION['userId']))
          $userId = $_SESSION['userId'];
   else
      if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId']))
         $userId = $_COOKIE['userId'];
      else
         $userId = null;

   require("php(un)/functions.php");
   $item_id = $_GET['item_id']??1;
   foreach($product->getData('featureproducts') as $item):
    if($item['item_id'] == $item_id):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="colom.css">
    <script src="work.js"></script>
    <script src="work1.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="sportsimages/images/hashLogo.png">
    <title>details of Product</title>
    <style>
        a:hover,a:active{
          text-decoration:none;
          color:blue;
          cursor:pointer;
      }

      q{
        font-size:30px;
      }

    </style>
</head>
<body>
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
           <h1 class="font1" style="text-align: center;">Product details</h1>
        </div>
    <div class="col-1 details">
        <div class="col-2 single-product">
            <div class="slider">
                <div class="arrow">
                    <i class="fas fa-arrow-right" id="next-btn"></i>  
                    <i class="fas fa-arrow-left" id="prev-btn"></i>  
                </div>
                <div class="slides">
                   <!---- <i class="fas fa-arrow-right" id="next-btn"></i>  
                    <i class="fas fa-arrow-left" id="prev-btn"></i>  -->
                     
                    <img src="<?php echo $item['image']; ?>" id="lastphoto" alt="">
                    <img src="sportsimages/images/gallery-1.jpg" alt="">
                    <img src="sportsimages/images/gallery-2.jpg" alt="">
                    <img src="sportsimages/images/gallery-3.jpg" alt="">
                    <img src="<?php echo $item['image']; ?>" alt="">
                    <img src="sportsimages/images/gallery-1.jpg" id="firstphoto" alt="">

                   <script src="products.js"></script>
                     
                     <br><br>
                </div>

            </div>
        </div>
        <div class="col-4 single-product" style="padding-left: 30px;">
           <p class="font1"><?php echo $item['item'];?></p>
           <br>
           <h5 class="font1"><?php echo $item['price']; ?></h5>
           <select name="Size" id="Size" class="font1" style="margin-bottom: 10px;">
               <option value="">Size</option>
               <option value="">XXL</option>
               <option value="">XL</option>
               <option value="">L</option>
               <option value="">M</option>
               <option value="">S</option>
           </select>
            <form action="<?php echo isset($userId) ? 'cart.php' : null ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="item" value="<?php echo $item['item']; ?>" class="font1">
                <input type="hidden" name="price" value="<?php echo $item['price']; ?>" class="font1">
                <input type="hidden" name="itemid" value="<?php echo $item_id; ?>">
                <input type="hidden" name="userid" value="<?php echo isset($userId) ? $userId: 0 ; ?>">
                <input type="number" name="units" value="1" id="name">
                <input type="hidden" name="img" value="<?php echo $item['image']; ?>">
                <button type="submit" class="btn-a btn-1" id="btn-form">Add to cart</button>
            </form>
            <?php
                 if(!isset($userId)):
            ?>
            <script>
                 document.getElementById("btn-form").addEventListener('click',(e) => {
                         e.preventDefault()
                         close();    
                   })
            </script>
            <?php
                endif;;
            ?>
           <p></p>
        </div>
    </div>
    <div class="col-1 single-product" style="padding-left: 30px;">
        <h1 class="font1" style="float: left;">Related products</h1>
        <h5 class="font1 right1">view more</h5>
        <div class="col-1 listbox1">
           <?php
             
               require 'relatedPro.php';

               getRelatedProducts($item_id,'featureproducts',$userId);

           ?>
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

    <div id="demo" class="hide">
        <div class="col-3 border-log box" style="height:800px;">
        <div class="form-btn">
            <span class="font1" onclick="login()">Register</span>
            <span class="font1" onclick="signup()">Login</span>
            <hr id="line">
        </div>
        <br>
        <div class="centerele">
       <form action="user.php" method="POST" id="login" enctype="multipart/form-data" class="login">
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
        <form action="userCartProcess.php" method="POST" id="signup">
            <h2 class="font1">It seems like you haven't logged in.please log in</h2>
            <input type="text" name="username" placeholder="username">
            <input type="password" name="Password" placeholder="Password">
            <input type="hidden" name="itemid" value="<?php echo $item_id; ?>">
            <br>
            <button type="submit" name="submit1" class="exp-btn btn-a btn"  onclick="close1();">Login</button>
            <a href="">Forget password</a>
        </form>
        </div>
    </div>
    </div>
</body>
</html>

<?php
    endif;;
endforeach;

?>