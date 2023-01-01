<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbName = "paypage";

$con = mysqli_connect($servername,$username,$password,$dbName);

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

if($con){
$sql_insert_record_trans = "INSERT INTO transactions (id,customer_id,amount,currency) VALUES ('$charge->customer','$charge->id','$amount','$charge->currency')";
$query_trans = mysqli_query($con,$sql_insert_record_trans);
            
    }
}

  ?>  

