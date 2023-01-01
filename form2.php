<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbName = "featureproducts";

if($_SERVER["REQUEST_METHOD"] == "POST"){  

    if(isset($_POST["itemid2"]) && isset($_POST["item2"]) && isset($_POST["price2"]) && isset($_POST["units2"])) {

        $itemId2 = htmlspecialchars($_REQUEST['itemid2']);
        $item2 = htmlspecialchars($_REQUEST['item2']);
        $price2 = htmlspecialchars($_REQUEST['price2']);
        $units2 = htmlspecialchars($_REQUEST['units2']);
        $userId2 = $_POST['userid2'];
        $image2 = $_POST['img2'];

$con = mysqli_connect($servername,$username,$password,$dbName);
if($con){
$sql_insert_record = "INSERT INTO cart3 (itemId,userId,item,price,units,image) VALUES ('$itemId2',$userId2,'$item2',$price2,$units2,'$image2')";
$query = mysqli_query($con,$sql_insert_record);
}
$con->close();
    } 
                    
}

?>