<?php

   session_start();

   if(isset($_SESSION['userId']))
      $userId = $_SESSION['userId'];
   else
        if(isset($_COOKIE['userId']) && !empty($_COOKIE['userId'])){
          $userId = $_COOKIE['userId'];
        }

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="pay.css">
     <link rel="stylesheet" href="../style.css">
     <link rel="stylesheet" href="../style1.css">
     <link rel="stylesheet" href="../colom.css">
    <title>Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" type="image/png" href="../sportsimages/images/hashLogo.png">
</head>
<body>
<div class="row">
<div class="col-1 menu">
      <div class="full-mnu">
            <div class="menu1-mnu">
                <img src="../sportsimages/images/menu.png" alt="" class="menu-icon left" onclick="menu();">
            </div>
            <div class="menu2-mnu menu6-mnu menu8-mnu">
            <a href="index.php">
                <img src="../sportsimages/images/hashsports.png" alt="logo" class="logo-mnu">
            </a> 
            </div>
            <div class="menu4-mnu menulist">
                <ul id="menu-items" class="list-mnu">
                    <li><a href="../products.php">products</a></li>
                    <li><a href="about.html">about</a></li>
                    <li><a href="contact.html">contact</a></li>
                    <li><a href="<?php echo isset($userId) ? '../userProfile.php' : '../login.php' ?>">account</a></li>
                    <li><a href="../account.php">register</a></li>
                    <li><a href="../login.php">log in</a></li>
                </ul>
                    <script src="../menu.js"></script>
                    <a href="../index.php">
                       <img src="../sportsimages/images/hashsports.png" alt="logo" class="log-mnu">
                    </a>
            </div>
            <div class="menu5-mnu">
                <div class="m-cart-mnu">
                  <a href="<?php echo isset($userId) ? 'cart.php' : '../login.php' ?>" style="text-decoration: none;">
                    <img src="../sportsimages/images/cart.png" alt="cart" class="cart-mnu">
                  </a>
                    <div class="item-num-mnu">
                        <h4 class="h4-mnu"><?php echo $_SESSION['total_items'] ?? 0 ; ?></h4>
                    </div>
                    <a href="<?php echo isset($userId) ? '../wishlist.php' : '../login.php' ?>" name='wishlist' class='btn-img'>                    
                       <img src="../sportsimages/images/3551002-200.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
  <div class="col-1">
    <form action="customer.php" method="POST" id="payment-form">
       <div class="form-row">
        <div class="col-3">
           <label for="first-name">First name</label><br>
           <input type="text" name="first_name" id="" placeholder="First name" value="<?php echo isset($userId) ? $firstName : '' ?>"><br>
           <label for="Last-name">Last name</label><br>
           <input type="text" name="last_name" id="" placeholder="Last name" value="<?php echo isset($userId) ? $secondName : '' ?>"><br>
           <label for="email">Email</label><br>
           <input type="email" name="email" id="" placeholder="E-mail" value="<?php echo isset($userId) ? $email : '' ?>">
        </div>
        <div class="col-3">
           <label for="no" class="currency">Currency</label>
           <select name="unit" id="" class="unit">
              <option value="usd">USD</option>
              <option value="yen">Yen</option>
              <option value="rupees">Rupees</option>
              <option value="sterling">Sterling pound</option>
              <option value="euro">Euro</option>
           </select><br>
           <label for="amount">Amount</label><br>
           <input type="text" name="amount" placeholder="Amount" id="" value=" <?php echo isset($userId) ? $_SESSION['amount'] : '' ?>">
           <br>
           <h2 class="font5">Address</h2>
           <label for="no">No</label><br>
           <input type="text" name="homeNo" placeholder="No">
           <br>
           <label for="street">Street name</label><br>
           <input type="text" name="street" placeholder="Street">
           <br>
           <label for="town">Town</label><br>
           <input type="text" name="town" placeholder="Town">
           <br>
           <label for="first-name">City</label><br>
           <input type="text" name="city" placeholder="City">
           <br>
           <label for="Contact-number">Contact no.</label><br>
           <input type="tel" name="phone-number" placeholder="Tel-phone" id=""><br>
           <br>            
           <label for="card-element">
              Credit/Debit card
           </label>
           <div id="card-element">
           
           </div>
           <div id="card-errors" role="alert"></div>
           <button type="submit">submit Payment</button>
        </div>
       </div>
       <script type="text/javascript">
          // Create a Stripe client
var stripe = Stripe('pk_test_51Je5wyKX5rSdLKC8pYSvX5O0bbkt6rnwiHh4xgzBlVMwPaMdlmVALbOGnz9MiQjAVbINgORII7VRzfI5cRGhkPan00273Vxywo');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Style button with BS
document.querySelector('#payment-form button').classList =
  'btn btn-primary btn-block mt-4';

// Create an instance of the card Element
var card = elements.create('card', { style: style });

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
       </script>
    </form>
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