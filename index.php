<?php
   ob_start();
   
   require('php(un)/functions.php');

   $product_shuffle = $product->getData('featureproducts');
   shuffle($product_shuffle);

   session_start();

   if(isset($_SESSION['userId']))
          $userId = $_SESSION['userId'];
   else
      if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId']))
         $userId = $_COOKIE['userId'];
      else
         $userId = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="colom.css">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css"/>
    <script src="work.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="sportsimages/images/hashLogo.png">
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
    <div class="row special1">
    <div class="col-1 menu">
    <div class="full-mnu">
            <div class="menu1-mnu">
                <img src="sportsimages/images/menu.png" alt="" class="menu-icon left" onclick="menu()">
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
                    <img src="sportsimages/images/hashsports.png" alt="logo" class="log-mnu">
                    <script src="menu.js"></script>
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
    <div class="body-sli">
    <div class="img-sli">
      <div><img src="sportsimages/images/Happy new year (3).png"></div>
      <div><img src="sportsimages/images/Happy new year (4).png"></div>
      <div><img src="sportsimages/images/happy-new-year-(2).png"></div>
    </div>
  </div>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.js"></script>
    <script type="text/javascript" src="slick/slick/slick.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
  
   <script type="text/javascript" src="carousel.js"></script>

    </div>

    <div class="col-1">
        <div class="col-2">
            <img src="sportsimages/images/image1.png" alt="" class="img1">
        </div>
        <div class="col-3">
          <div class="center">
            <h1 class="font2">Give your workout a new style!</h1>
            <br>
            <p class="font1">Success isn't always about greatness.it is about consistency.consistent hard work gains success.greatness will come.</p>
            <br>
            <a href="products.html" class="ad-btn">Explore Now</a>
            </div>
        </div>
        <div class="col-2">
            <img src="sportsimages/images/istockphoto-166639415-612x612.jpg" alt="" class="img2">
        </div>
    </div>
    <div class="col-1">
        <h1 class="center font1" style="font-weight:2000;">Featured products</h1>
        <?php
        
            define('DB_SERVER', 'localhost');
            define('DB_SEARCH', 'root');
            define('DB_PASSWORD','');
            define('DB_DATABASE', 'featureproducts');
                $db = mysqli_connect(DB_SERVER,DB_SEARCH,DB_PASSWORD,DB_DATABASE);
        
     
            $sql = "SELECT * FROM featureproducts";
            $result = mysqli_query($db,$sql);

            $count = mysqli_num_rows($result);

          if($count > 0){
             echo "<ul>";
              while($row = mysqli_fetch_assoc($result)){
                $fName = $row['item'];
                $sName = $row['price'];
                $iName = $row['item_id'];
                $className = $row['class'];
                $img = $row['image'];

                $real = $sName/100;

                echo "<style>
                          .bg$iName{
                              background-image:url('./$img');
                              background-size:cover;
                              image-rendering:auto;
                          }
    
                          .bg$iName:hover .card-color{
                              transform: translateY(0%);
                          }
                      
                    </style>";
    
                    echo "<li style='font-size:15px;' class='row1' data-category='$className'>
                    <form action='wishlistProcess.php' method='POST'>
                    <div class='card-car'>
                        <div class='card-up-car'>
                            <img src='$img' alt=''>
                        </div>
                        <div class='card-down-car'>
                            <div class='div1-car'>
                                <div class='div1-i-car'>
                                    <h2>$ $real</h2>
                                </div>
                            </div>
                            <div class='div2-car'>
                                <h5>$fName</h5>
                                <input type='hidden' name='itemid' value='$iName'>
                                <input type='hidden' name='price' value='$sName' >
                                <input type='hidden' name='item' value='$fName' >
                                <input type='hidden' name='userid' value='$userId' >
                                <input type='hidden' name='img' value='$img' >
                                <input type='hidden' name='class' value='$className' >
                            </div>
                            <div class='div3-car'>
                                <div class='wishlist-car'>
                                    <button type='submit' title='wishlist' name='wishlist'><img src='sportsimages/images/3551002-200.png' alt=''></button>
                                </div>
                                <div class='cart-car'>
                                    <button type='submit'><a href='prodetails.php?item_id=$iName'>View more</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    </li>";
                        }
              echo "</ul>";
            }
            else{
             echo "<p>search results is not Found!</p>";
            }
      /*  }
}
}*/
?>
    </div>
    <div class="col-1 special">
        <div class="col-2"> 
            <img src="sportsimages/images/exclusive.png" alt="imge3" class="img2">
        </div>
        <div class="col-4 center">     
              <p class="font2 center big">Exclusively available on redstore snard band 4</p>
              <a href="prodetails.html" class="ad-btn">Buy Now</a>
        </div>
    </div>
    <div class="col-1">
       <h1 class="center font1" style="font-weight: 2000;">Latest products</h1>
        <br>
       <?php
          $sql = "SELECT * FROM latestproducts";
          $result = mysqli_query($db,$sql);
  
          $count = mysqli_num_rows($result);
  
            if($count > 0){
               echo "<ul>";
                while($row = mysqli_fetch_assoc($result)){
                  $fName = $row['item'];
                  $sName = $row['price'];
                  $iName = $row['item_id'];
                  $img = $row['image'];
                  $className = $row['class'];

                  $real = $sName/100;

                  echo "<style>
                            .bg$iName{
                                background-image:url('./$img');
                                background-size:cover;
                                image-rendering:auto;
                            }
      
                            .bg$iName:hover .card-color{
                                transform: translateY(0%);
                            }
                        
                      </style>";
      
                  echo "<li style='font-size:15px;' class='row1' data-category='$className'>
                  <form action='wishlistProcess.php' method='POST'>
                  <div class='card-car'>
                      <div class='card-up-car'>
                          <img src='$img' alt=''>
                      </div>
                      <div class='card-down-car'>
                          <div class='div1-car'>
                              <div class='div1-i-car'>
                                  <h2>$ $real</h2>
                              </div>
                          </div>
                          <div class='div2-car'>
                              <h5>$fName</h5>
                              <input type='hidden' name='itemid' value='$iName'>
                              <input type='hidden' name='price' value='$sName' >
                              <input type='hidden' name='item' value='$fName' >
                              <input type='hidden' name='userid' value='$userId' >
                              <input type='hidden' name='img' value='$img' >
                              <input type='hidden' name='class' value='$className' >
                          </div>
                          <div class='div3-car'>
                              <div class='wishlist-car'>
                                  <button type='submit' title='wishlist' name='wishlist'><img src='sportsimages/images/3551002-200.png' alt=''></button>
                              </div>
                              <div class='cart-car'>
                                  <button type='submit'><a href='prodetailsone.php?item_id=$iName'>View more</a></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  </form>
                  </li>";
                }
                echo "</ul>";
              }
              else{
               echo "<p>search results is not Found!</p>";
              }
  ?>
    </div>
    </div>
    <div class="col-1 over">
        <h1 class="center font1" style="font-weight: 2000;">Commentries</h1>
        <div class="comment">
            <div class="comm">
                <i class="fa fa-qoute-left"></i>
                <p class="font3">this team makes me a belief for better sports goods.</p>
                <br>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <br>
                <img src="sportsimages/images/user-1.png" alt="" srcset="">
                <h3 class="font1">Sean parker</h3>
            </div>
            <div class="comm">
                <i class="fa fa-qoute-left"></i>
                <p class="font3">this team makes me a belief for better sports goods.</p>
                <br>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <br>
                <img src="sportsimages/images/user-2.png" alt="" srcset="">
                <h3 class="font1">Sean parker</h3>
            </div>
            <div class="comm">
                <i class="fa fa-qoute-left"></i>
                <p class="font3">this team makes me a belief for better sports goods.</p>
                <br>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <br>
                <img src="sportsimages/images/user-3.png" alt="" srcset="">
                <h3 class="font1">Sean parker</h3>
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
</body>
</html>
