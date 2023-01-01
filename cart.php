<?php

        session_start();

       if (isset($_SESSION['userId'])) {
           
             $userId = $_SESSION['userId'];
             $close = '';
       }
       else {
              if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])){
                    $userId = $_COOKIE['userId'];
                    $close = '';
                    }
                    else{
                        $userId = null;
                        $close = 'close()';
                    }
                }

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

      require("php(un)/functions.php");
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         
        if(isset($_POST['remove'])){
            $deleteRecord = $Cart->deleteItem($_POST['cart-id'],'cart1');
        }

        if(isset($_POST['remove1'])){
            $deleteRecord = $Cart->deleteItem($_POST['cart-id1'],'cart2');
        }

        if(isset($_POST['remove2'])){
            $deleteRecord = $Cart->deleteItem($_POST['cart-id2'],'cart3');
        }
      }

?>

<?php

   require 'form.php';
   require 'form1.php';
   require 'form2.php';
   
  /* $item_id = $_GET['item_id']??1;
   foreach($product->getData('products') as $item):
    if($item['item_id'] == $item_id):*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta cha="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="colom.css">
    <script src="work1.js"></script>
    <script src="work.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" type="image/png" href="sportsimages/images/hashLogo.png">
    <title>Add to cart</title>
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
        <div class="col-4 small-cont">
             <table>
                 <tr>
                     <th>Product</th>
                     <th>Quantity</th>
                     <th>Subtotal</th>
                 </tr>

                 <?php
                 
                      $sum = 0;
                      $sum1 = 0;
                      $sum2 = 0;
                      $num = null;
                 
                 ?>

                 <?php 
                    
                    foreach($product->getData1('cart1',$userId)as $item):
                 
                 ?>
                  <tr>
                     <td>
                       <div class="product-info">
                           <img src="<?php echo $item['image']; ?>" alt="img5">
                           <div class="">
                            <p><?php echo $item['item']; ?></p>
                                <form method="POST">
                                    <input type="hidden" name="cart-id" value="<?php echo $item['cartId'] ?? 0 ?>">
                                   <button type="submit" name="remove" onclick="cart()">remove</button>
                                </form>
                           </div>
                       </div>  
                     </td>
                  <!--   <td><input type="number" value="1"></td>-->
                     <td><span><?php echo $item['units']; ?></span></td>
                     <td>$ <?php echo $item['price']*$item['units'] ?? 0; ?></td>
                     <?php
                         $sum = $sum + $item['price']*$item['units'];

                         $num = $num + 1;
                     ?>
                  </tr>

                <?php 
                
                    endforeach;  

                ?>

                
                 <?php 
                    
                    foreach($product->getData1('cart2',$userId)as $item1):
                 
                 ?>
                 <tr>
                     <td>
                       <div class="product-info">
                           <img src="<?php echo $item1['image']; ?>" alt="img5">
                           <div class="">
                               <p><?php echo $item1['item']; ?></p>
                               <form method="POST">
                                    <input type="hidden" name="cart-id1" value="<?php echo $item1['cartId'] ?? 0 ?>">
                                   <button type="submit" name="remove1" onclick="cart()">remove</button>
                                </form>
                           </div>
                       </div>  
                     </td>
                  <!--   <td><input type="number" value="1"></td>-->
                     <td><span><?php echo $item1['units']; ?></span></td>
                     <td>$ <?php echo $item1['price']*$item1['units']; ?></td>
                     <?php
                         
                         $sum1 = $sum1 + $item1['price']*$item1['units'];

                         $num = $num + 1;

                     ?>
                 </tr>  

                <?php 
                
                    endforeach;  

                ?>
            
                 <?php 
                    
                    foreach($product->getData1('cart3',$userId)as $item2):
                 
                 ?>
                 <tr>
                     <td>
                       <div class="product-info">
                           <img src="<?php echo $item2['image']; ?>" alt="img5">
                           <div class="">
                               <p><?php echo $item2['item']; ?></p>
                               <form method="POST">
                                    <input type="hidden" name="cart-id2" value="<?php echo $item2['cartId'] ?? 0 ?>">
                                   <button type="submit" name="remove2" onclick="cart()">remove</button>
                                </form>
                           </div>
                       </div>  
                     </td>
                  <!--   <td><input type="number" value="1"></td>-->
                     <td><span><?php echo $item2['units']; ?></span></td>
                     <td>$ <?php echo $item2['price']*$item2['units']; ?></td>
                     <?php
                      
                         $sum2 = $sum2 + $item2['price']*$item2['units'];

                         $num = $num + 1;

                     ?>
                 </tr>

                <?php 
                
                    endforeach;  

                ?>
               
             </table>
             <br><br>
             <div class="total-price">
             <table>
                 <tr>
                     <td>Subtotal</td>
                     <td>$<?php 
                     $subTotal = $sum+$sum1+$sum2;
                     $_SESSION['amount'] = $subTotal;
                     echo $subTotal; ?>.00
                     </td>
                 </tr>
                 <tr>
                     <td>Tax</td>
                     <td>$160.00</td>
                 </tr>
             </table>
             </div>
        <div style="text-align: center;margin-top:30px;">   
            <button type="submit" class="proceed" style="width:200px;font-weight:bolder;"><a href="./payGateway/pay.php" class="cart"> Go to checkout</a></button>
        </div>
    </div>
    <div class="col-2 left" style="text-align: center;">
        <img src="sportsimages/images/hashStore.png" alt="" srcset="" width="250px" height="250px">
         <div class="pro-img">
            <img src="<?php echo $profileIamge; ?>" alt="" srcset="">
         </div>
        <div class="store">
            <p class="font1">User name:    <?php echo $userName; ?></p>
            <p class="font1">Total items:    
            <?php 
                $_SESSION['total_items'] = $num;
                echo $num;
             ?>
            </p>
            <p class="font1">Total amount: $
            <?php
                $Total = $subTotal + 160;
                $_SESSION['total'] = $Total;
                echo $Total;
            ?>.00
             </p>
        </div>
    </div>
    </div>
    <footer>
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
    </footer>
    </div>
</body>
</html>

<?php
  /*  endif;;
endforeach;*/

?>