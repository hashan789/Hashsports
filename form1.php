<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbName = "featureproducts";

if($_SERVER["REQUEST_METHOD"] == "POST"){  

if(isset($_POST["itemid1"]) && isset($_POST["item1"]) && isset($_POST["price1"]) && isset($_POST["units1"])) {

$itemId1 = htmlspecialchars($_REQUEST['itemid1']);
$item1 = htmlspecialchars($_REQUEST['item1']);
$price1 = htmlspecialchars($_REQUEST['price1']);
$units1 = htmlspecialchars($_REQUEST['units1']);
$userId1 = $_POST['userid1'];
$image1 = $_POST['img1'];

$con = mysqli_connect($servername,$username,$password,$dbName);
if($con){
$sql_insert_record = "INSERT INTO cart2 (itemId,userId,item,price,units,image) VALUES ('$itemId1',$userId1,'$item1',$price1,$units1,'$image1')";
$query = mysqli_query($con,$sql_insert_record);
}
$con->close();
} 
                
}

?>