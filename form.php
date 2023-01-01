<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbName = "featureproducts";

$con = mysqli_connect($servername,$username,$password,$dbName);

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

    if(isset($_POST["itemid"]) && isset($_POST["item"]) && isset($_POST["price"]) && isset($_POST["units"])) {

        $itemId = htmlspecialchars($_REQUEST['itemid']);
        $item = htmlspecialchars($_REQUEST['item']);
        $price = $_POST['price'];
        $units = $_POST['units'];
        $userId = $_POST['userid'];
        $image = $_POST['img'];

//$con = mysqli_connect($servername,$username,$password,$dbName);
if($con){
$sql_insert_record = "INSERT INTO cart1 (itemId,userId,item,price,units,image) VALUES ('$itemId',$userId,'$item',$price,$units,'$image')";
$query = mysqli_query($con,$sql_insert_record);
}
$con->close();
    }
                    
}

 
?>