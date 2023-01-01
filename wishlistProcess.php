<?php

class Wishlist{

   protected $host = 'localhost';
   protected $user = 'root';
   protected $password = '';
   protected $database = "featureproducts";

   public $con = null;

   public $query = null;

   public function __construct()
   {
   $this->con =  mysqli_connect($this->host,$this->user,$this->password,$this->database);
   } 

   public function AddtoWishlist($userId,$itemId,$item,$price,$img,$class)
   {
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 

        if(isset($userId) && isset($itemId) && isset($item) && isset($price) && isset($img)) {
                if($this->con){
                    $sql_insert_record = "INSERT INTO wishlist (userId,itemId,item,price,image,class) VALUES ($userId,'$itemId','$item',$price,'$img','$class')";
                    $this->query = mysqli_query($this->con,$sql_insert_record);
                }
            $this->con->close();

        }
                        
    }
   }

}

$wishlist = new Wishlist();

if (isset($_POST['wishlist'])) {
    $wishlist->AddtoWishlist($_POST['userid'],$_POST['itemid'],$_POST['item'],$_POST['price'],$_POST['img'],$_POST['class']);
    header('location:index.php');
}

else if (isset($_POST['wishlist1'])) {
    $wishlist->AddtoWishlist($_POST['userid1'],$_POST['itemid1'],$_POST['item1'],$_POST['price1'],$_POST['img1'],$_POST['class1']);
       header('location:index.php');
}

else if (isset($_POST['wishlist2'])) {
    $wishlist->AddtoWishlist($_POST['userid2'],$_POST['itemid2'],$_POST['item2'],$_POST['price2'],$_POST['img2'],$_POST['class2']);
       header('location:products.php');
}

 
?>