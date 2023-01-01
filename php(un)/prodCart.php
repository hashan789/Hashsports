<?php

class Cart{

    public $db = null;

    public function __construct(DBController $db){
       
        if(!isset($db->con))return null;
        $this->db = $db;
    }



public function deleteItem($cartid = null,$table = null){
    if($cartid != null){
       $result = $this->db->con->query("DELETE FROM {$table} WHERE cartId = {$cartid}");
       if($result){
          header("location:",$_SERVER['PHP_SELF']);
       }
       return $result;
    }
 }

}


?>