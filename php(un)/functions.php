<?php

require('DBcontroller.php');

require('Class.php');

require('prodCart.php');

$db = new DBController();
$product = new Product($db);
//print_r($product->getData()); 

$Cart = new Cart($db);
/*$arr = array(
    "userId" => 2,
    "itemId" => 8,
    "cartId" => 1
);
$Cart->insertintoCart($arr);*/
 

?>