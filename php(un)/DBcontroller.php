<?php

class DBController{

   protected $host = 'localhost';
   protected $user = 'root';
   protected $password = '';
   protected $database = "featureproducts";

   public $con = null;

   public function __construct()
   {
   $this->con =  mysqli_connect($this->host,$this->user,$this->password,$this->database);
   } 
   
   protected function closeConnection(){
      if($this->con != null){
         $this->con->close();
         $this->con = null;
      }
   }

}



?>