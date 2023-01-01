<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="colom.css">
    <script src="work.js"></script>
    <title>Account</title>
</head>
<body>
    <div class="row">
        <div class="col-1 menu">
            <div class="single-product">
                <img src="sportsimages/images/menu.png" alt="" width="30px" height="30px" class="menu-icon left" onclick="menu();">
                <img src="sportsimages/images/hashsports.png" alt="logo" class="logo">
                <img src="sportsimages/images/cart.png" alt="" class="right" width="30px" height="30px">
            </div>
            <div class="menulist">
            <ul id="menu-items">
                <li><a href="products.html">products</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="contact.html">contact</a></li>
                <li><a href="account.html">account</a></li>
            </ul>
            <script src="menu.js"></script>
            </div>
        </div>
    <div class="col-1">
        <div class="col-2">
            <img src="sportsimages/images/image1.png" alt="img4" class="img1">
        </div>
        <div class="col-4">
            <h2 class="font2 center big">Welcome to hashsports</h2>
            <p class="font1 center">To keep connected with us please login with your personal account by email address and password</p>
        </div>
    </div>
    <div class="col-1">
        <div class="col-3 border-log" style="height:400px;">
            <div class="form-btn">
            <span class="font1" onclick="logIn()">Login</span>
            <span class="font1" onclick="signUp()">Register</span>
            <hr id="line">
        </div>
        <br>
        <div class="centerele">
        <form action="" id="login" class="login">
            <input type="text" placeholder="username">
            <input type="password" placeholder="Password">
            <br>
            <button type="submit" class="exp-btn btn-a btn">Login</button>
            <a href="">Forget password</a>
        </form>
        <form action="" id="signup">
            <input type="text" placeholder="username">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <br>
            <button type="submit" class="exp-btn btn-a btn">Register</button>
        </form>
        </div>
    </div>
    <div class="col-1 bg-down">
        <div class="col-5">
            <h3 class="center font1">Logo</h3>
        </div>
        <div class="col-5">
            <h3 class="center font1">Useful Links</h3>
        </div>
        <div class="col-6">
            <h3 class="center font1">Follow us</h3>
        </div>
    </div>
    </div>
</body>
</html>