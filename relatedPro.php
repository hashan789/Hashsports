<?php

    function getRelatedProducts($item,$tab,$user){

            define('DB_SERVER', 'localhost');
            define('DB_SEARCH', 'root');
            define('DB_PASSWORD','');
            define('DB_DATABASE', 'featureproducts');
                $db = mysqli_connect(DB_SERVER,DB_SEARCH,DB_PASSWORD,DB_DATABASE);
        
     
            $sql = "SELECT * FROM products WHERE item_id <> $item AND class = (SELECT class FROM $tab WHERE item_id = $item)";
            $result = mysqli_query($db,$sql);

            $count = mysqli_num_rows($result);

          if($count > 0){
             echo "<ul>";
              while($row = mysqli_fetch_assoc($result)){

                $fName = $row['item'];
                $sName = $row['price'];
                $iName = $row['item_id'];
                $className = $row['class'];
                $img = $row['image'];

                $real = $sName/100;

                echo "<style>
                          .bg$iName{
                              background-image:url('./$img');
                              background-size:cover;
                              image-rendering:auto;
                          }
    
                          .bg$iName:hover .card-color{
                              transform: translateY(0%);
                          }
                      
                    </style>";
    
                    echo "<li style='font-size:15px;' class='row1' data-category='$className'>
                    <form action='wishlistProcess.php' method='POST'>
                    <div class='card-car'>
                        <div class='card-up-car'>
                            <img src='$img' alt=''>
                        </div>
                        <div class='card-down-car'>
                            <div class='div1-car'>
                                <div class='div1-i-car'>
                                    <h2>$ $real</h2>
                                </div>
                            </div>
                            <div class='div2-car'>
                                <h5>$fName</h5>
                                <input type='hidden' name='itemid' value='$iName'>
                                <input type='hidden' name='price' value='$sName' >
                                <input type='hidden' name='item' value='$fName' >
                                <input type='hidden' name='userid' value='$user' >
                                <input type='hidden' name='img' value='$img' >
                                <input type='hidden' name='class' value='$className' >
                            </div>
                            <div class='div3-car'>
                                <div class='wishlist-car'>
                                    <button type='submit' title='wishlist' name='wishlist'><img src='sportsimages/images/3551002-200.png' alt=''></button>
                                </div>
                                <div class='cart-car'>
                                    <button type='submit'><a href='prodetailstwo.php?item_id=$iName'>View more</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    </li>";
              }
              echo "</ul>";
            }
    }

?>