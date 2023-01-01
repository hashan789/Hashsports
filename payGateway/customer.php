<?php

require 'charge.php';

$servername = "localhost";
$username = "root";
$password = '';
$dbName = "paypage";

$con = mysqli_connect($servername,$username,$password,$dbName);

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

if($con){
$sql_insert_record_cus = "INSERT INTO customers (id,first_name,last_name,email) VALUES ('$charge->customer','$first_name','$last_name','$email')";
$query_cus = mysqli_query($con,$sql_insert_record_cus);
            
    }
}

require 'transactions.php';

  ?>  

