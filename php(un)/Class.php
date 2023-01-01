<?php

class Product{

    public $db = null;

    public function __construct(DBController $db)
    {
       if(!isset($db->con))return null;
       $this->db = $db;
    }

    public function getData($table){
        $result = $this->db->con->query("SELECT * FROM ($table)");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getData1($table,$userid){
        $result1 = $this->db->con->query("SELECT * FROM ($table) WHERE userId = $userid");

        $resultArray1 = array();

        while($item1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
            $resultArray1[] = $item1;
        }

        return $resultArray1;
    }
    
}


?>