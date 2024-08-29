<?php 
    //including connect file
    // include('./includes/connect.php');

    //getting products
    function getProducts(){
        global $con;

        //condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

        $select_query="SELECT * FROM products ORDER BY rand()";
        $result_query=mysqli_query($con,$select_query);
        // $row=mysqli_fetch_assoc($result_query);
        //echo $row['product_title'];
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_offer_price=$row['product_offer_price'];
          $product_main_price=$row['product_main_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];

        //   card

        echo "
        <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
            <div class='card_img'>
            <img src='./admin_area/product_images/$product_image1' alt=''>
            </div>        
            <div class='card_body'>
                <h4 class='card_title'>$product_title</h4>
                <p class='card_price'>
                    <span class='offer_price_text'>Tk. $product_offer_price </span>
                    <span class='main_price_text'>Tk. $product_main_price</span>
                </p>
            </div>    
            <div class='card_button'>
                    <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to Cart' class='add_cart_btn'></a>
            </div>
         </div>
       
    ";
        // echo "
        //     <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
        //     <div class='card_image'>
        //     <img src='./admin_area/product_images/$product_image1' alt=''>
        //     </div>
                
        //           <div class='card_body'>
        //             <h4 class='card_title'>$product_title</h4>
        //             <p class='card_price'>
        //                 <span class='offer_price_text'>Tk. $product_offer_price </span>
        //                 <span class='main_price_text'>Tk. $product_main_price</span>
        //             </p>
        //              </div>    
        //             <div class='card_button'>
        //                 <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to cart' class='add_cart_btn'></a>
        //                  <a href='product_details.php?product_id=$product_id'><input type='button' value='View More' class='view_more_btn'></a>
        //              </div>
        //         </div>
           
        // ";

       
          
        }
    }
}
  }

    //getting all products
    function get_all_products(){
        global $con;

        //condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

        $select_query="SELECT * FROM products ORDER BY rand()";
        $result_query=mysqli_query($con,$select_query);
        // $row=mysqli_fetch_assoc($result_query);
        //echo $row['product_title'];
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_offer_price=$row['product_offer_price'];
          $product_main_price=$row['product_main_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];

           //card
           echo "
        <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
            <div class='card_img'>
            <img src='./admin_area/product_images/$product_image1' alt=''>
            </div>        
            <div class='card_body'>
                <h4 class='card_title'>$product_title</h4>
                <p class='card_price'>
                    <span class='offer_price_text'>Tk. $product_offer_price </span>
                    <span class='main_price_text'>Tk. $product_main_price</span>
                </p>
            </div>    
            <div class='card_button'>
                    <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to Cart' class='add_cart_btn'></a>
            </div>
         </div>
       
    ";
        //    echo "
        //     <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
        //         <img src='./admin_area/product_images/$product_image1' alt=''>
        //           <div class='card_body'>
        //             <h4>$product_title</h4>
        //             <p class='card_price'>
        //                 <span class='offer_price_text'>Tk. $product_offer_price </span>
        //                 <span class='main_price_text'>Tk. $product_main_price</span>
        //             </p>
        //             <div class='card_button'>
        //                 <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to cart' class='add_cart_btn'></a>
        //                 <a href='product_details.php?product_id=$product_id'><input type='button' value='View More' class='view_more_btn'></a>
        //              </div>
        //         </div>
        //     </div>    
        // ";
        }
    }
}
    }

    //getting unique categories
    function get_unique_categories(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="SELECT * FROM products WHERE category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        
        if($num_of_rows==0){
            echo "<div class='warning_text'>
            <h2>This category is not available at this moment</h2>
        </div>";
        }

        // $row=mysqli_fetch_assoc($result_query);
        //echo $row['product_title'];
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_offer_price=$row['product_offer_price'];
          $product_main_price=$row['product_main_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];

           //card
           echo "
        <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
            <div class='card_img'>
            <img src='./admin_area/product_images/$product_image1' alt=''>
            </div>        
            <div class='card_body'>
                <h4 class='card_title'>$product_title</h4>
                <p class='card_price'>
                    <span class='offer_price_text'>Tk. $product_offer_price </span>
                    <span class='main_price_text'>Tk. $product_main_price</span>
                </p>
            </div>    
            <div class='card_button'>
                    <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to Cart' class='add_cart_btn'></a>
            </div>
         </div>
       
    ";
    //        echo "
    //        <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
    //            <img src='./admin_area/product_images/$product_image1' alt=''>
    //              <div class='card_body'>
    //                <h4>$product_title</h4>
    //                <p class='card_price'>
    //                    <span class='offer_price_text'>Tk. $product_offer_price </span>
    //                    <span class='main_price_text'>Tk. $product_main_price</span>
    //                </p>
    //                <div class='card_button'>
    //                    <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to cart' class='add_cart_btn'></a>
    //                    <a href='product_details.php?product_id=$product_id'><input type='button' value='View More' class='view_more_btn'></a>
    //                 </div>
    //            </div>
    //        </div>    
    //    ";
        }
    }
}


//getting unique brands
function get_unique_brands(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
    $select_query="SELECT * FROM products WHERE brand_id=$brand_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    
    if($num_of_rows==0){
        // echo "<h2 class='text-center text-danger'>This brand is not available at this moment</h2>";
        echo "<div class='warning_text'>
            <h2>This brand is not available at this moment</h2>
        </div>";
    }
        
    // $row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_offer_price=$row['product_offer_price'];
      $product_main_price=$row['product_main_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];

       //card
       echo "
       <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
           <div class='card_img'>
           <img src='./admin_area/product_images/$product_image1' alt=''>
           </div>        
           <div class='card_body'>
               <h4 class='card_title'>$product_title</h4>
               <p class='card_price'>
                   <span class='offer_price_text'>Tk. $product_offer_price </span>
                   <span class='main_price_text'>Tk. $product_main_price</span>
               </p>
           </div>    
           <div class='card_button'>
                   <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to Cart' class='add_cart_btn'></a>
           </div>
        </div>
      
   ";
//        echo "
//        <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
//            <img src='./admin_area/product_images/$product_image1' alt=''>
//              <div class='card_body'>
//                <h4>$product_title</h4>
//                <p class='card_price'>
//                    <span class='offer_price_text'>Tk. $product_offer_price </span>
//                    <span class='main_price_text'>Tk. $product_main_price</span>
//                </p>
//                <div class='card_button'>
//                    <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to cart' class='add_cart_btn'></a>
//                    <a href='product_details.php?product_id=$product_id'><input type='button' value='View More' class='view_more_btn'></a>
//                 </div>
//            </div>
//        </div>    
//    ";
    }
}
}


    //displaying brands in sidenav
    function getBrands() {
        global $con;
        $select_brands = "SELECT * FROM brands";
        $result_brands = mysqli_query($con, $select_brands);
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li data-id='$brand_id'><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
        }
    }
    // function getBrands(){
    //     global $con;
    //     $select_brands="SELECT * FROM brands";
    //     $result_brands=mysqli_query($con,$select_brands);
    //     // $row_data = mysqli_fetch_assoc($result_brands);   //to fetch the data 
    //     // echo $row_data['brand_title'];
    //     // echo $row_data['brand_title'];

    //     while($row_data = mysqli_fetch_assoc($result_brands)){
    //           $brand_title=$row_data['brand_title'];
    //           $brand_id=$row_data['brand_id'];
    //           echo " <li class='nav-item'>
    //       <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
    //     </li>";
    //     }
    
    // }

    //displaying categories in sidenav

    function getCategories() {
        global $con;
        $select_categories = "SELECT * FROM categories";
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li data-id='$category_id'><a href='index.php?category=$category_id'>$category_title</a></li>";
        }
    }
    //get searching products
    function search_product(){
        global $con;
        if(isset($_GET['search_data_btn'])){
            $search_data_value=$_GET['search_data'];
        $search_query="SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        
        if($num_of_rows==0){
            echo "<div class='warning_text'>
            <h2>No results match</h2>
        </div>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_offer_price=$row['product_offer_price'];
          $product_main_price=$row['product_main_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          
           //card
           echo "
           <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
               <div class='card_img'>
               <img src='./admin_area/product_images/$product_image1' alt=''>
               </div>        
               <div class='card_body'>
                   <h4 class='card_title'>$product_title</h4>
                   <p class='card_price'>
                       <span class='offer_price_text'>Tk. $product_offer_price </span>
                       <span class='main_price_text'>Tk. $product_main_price</span>
                   </p>
               </div>    
               <div class='card_button'>
                       <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to Cart' class='add_cart_btn'></a>
               </div>
            </div>
          
       ";
    //        echo "
    //        <div class='card' onclick=\"window.location.href='product_details.php?product_id=$product_id'\">
    //            <img src='./admin_area/product_images/$product_image1' alt=''>
    //              <div class='card_body'>
    //                <h4>$product_title</h4>
    //                <p class='card_price'>
    //                    <span class='offer_price_text'>Tk. $product_offer_price </span>
    //                    <span class='main_price_text'>Tk. $product_main_price</span>
    //                </p>
    //                <div class='card_button'>
    //                    <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to cart' class='add_cart_btn'></a>
    //                    <a href='product_details.php?product_id=$product_id'><input type='button' value='View More' class='view_more_btn'></a>
    //                 </div>
    //            </div>
    //        </div>    
    //    ";
        }
    }
    }

    //view more details function
    function view_details(){ 
        global $con;

        //condition to check isset or not
        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
        $select_query="SELECT * FROM products WHERE product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
       
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $product_offer_price=$row['product_offer_price'];
          $product_main_price=$row['product_main_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];

          //card

          echo "
           <div class='img_card'>
            <div class='card_image'>
                <div class='other_images'>
                    <img src='./admin_area/product_images/$product_image1' alt='' class='other_img'>
                    <img src='./admin_area/product_images/$product_image2' alt='' class='other_img'>
                    <img src='./admin_area/product_images/$product_image3' alt='' class='other_img'>
                    <img src='./admin_area/product_images/$product_image1' alt='' class='other_img'>
                </div>
                <div class='main_image'>
                <img src='./admin_area/product_images/$product_image1' alt='' class='img_main'>
                </div>
            </div>
            <div class='card_button'>
                <a href='index.php?add_to_cart=$product_id'><input type='button' value='Add to cart' class='details_add_cart_btn'></a>
                <a href='index.php'><input type='button' value='Go Home' class='details_home_btn'></a>
            </div>
        </div>

        <div class='descriptions'>
            <h4>$product_title</h4>
            <p class='card_price'>Product Price:
                <span class='offer_price_text'>Tk. $product_offer_price</span>
                <span class='main_price_text'>Tk. $product_main_price</span>
            </p>
            <p>Product Description: $product_description</p>
        </div>
       ";
        //   echo " 
        // <div class='col-md-4'>
        //     <div class='card my-1 p-1'>
        //         <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        //         <div class='card-body'>
        //             <h5 class='card-title'>$product_title</h5>
        //              <p class='card-text'><span class='offer_price_text'>Tk.$product_offer_price</span>
        //              <span class='main_price_text'>Tk.$product_main_price</span></p>
        //             <a href='index.php?add_to_cart=$product_id' class='btn add_cart_btn button'>Add to cart</a>
        //             <a href='index.php' class='btn view_more_btn'>Go Home</a>
        //         </div>
        //     </div>
        // </div>
        //  <div class='col-md-8'>
        //                 <!-- related images -->
        //                  <div class='row'>
        //                     <div class='col-md-12'>
        //                          <h4 class='text-center text-danger mb-5'>Related products</h4>
        //                     </div> 
        //                     <div class='col-md-6'>
        //                     <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
        //                     </div>
        //                     <div class='col-md-6'>
        //                     <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
        //                     </div>
        //                  </div>

                         
        //                     <div class='col-md-12'>
        //                          <h4 class='text-dark mt-5'>Product Description:</h4>
        //                          <p>$product_description</p>
        //                     </div> 

        //      </div>";
            }
            }
            }
            }
            }
    
    //get ip address function
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

    //add to cart function
    function cart(){
            if(isset($_GET['add_to_cart'])){
                global $con;
                $get_ip_address = getIPAddress();  //accessing ip
                $get_product_id=$_GET['add_to_cart'];
                $select_query="SELECT * FROM cart_details WHERE ip_address= '$get_ip_address' AND product_id=$get_product_id";
                $result_query=mysqli_query($con,$select_query);

                $num_of_rows=mysqli_num_rows($result_query);
        
                if($num_of_rows>0){
                    echo "<script>alert('This item is already present inside cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                    
                }
                else{
                    $insert_query="INSERT INTO cart_details(product_id,ip_address,quantity)VALUES($get_product_id,'$get_ip_address',1)";
                    $result_query=mysqli_query($con,$insert_query);
                    echo "<script>alert('Item is added to cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }

            }
    }


    //function to count how many items are added to cart
    function cart_item(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_address = getIPAddress();  //accessing ip
           
            $select_query="SELECT * FROM cart_details WHERE ip_address= '$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);

            $count_cart_items=mysqli_num_rows($result_query);
        }
            else{
                global $con;
                $get_ip_address = getIPAddress();  //accessing ip
               
                $select_query="SELECT * FROM cart_details WHERE ip_address= '$get_ip_address'";
                $result_query=mysqli_query($con,$select_query);
    
                $count_cart_items=mysqli_num_rows($result_query);
            }
            return $count_cart_items;
        }

        //function to calculate total cart price
    function total_cart_price(){
        global $con;
        $get_ip_address = getIPAddress();

        $total_price=0;
        $cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM products WHERE product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);

            while($row_product_price=mysqli_fetch_array( $result_products)){
                    $product_offer_price=array($row_product_price['product_offer_price']);
                    $product_values=array_sum($product_offer_price);
                    $total_price+=$product_values;

            }
        }

        echo $total_price;
    }


    //getting user order details

    function get_user_order_details(){
        global $con;
        $username=$_SESSION['username'];
        $get_details="SELECT * FROM user_table WHERE username='$username'";
        $result_query=mysqli_query($con,$get_details);
        while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_orders="SELECT * FROM user_orders WHERE user_id=$user_id AND order_status='pending'";
                        $result_orders_query=mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows($result_orders_query);
                        if($row_count>0){
                            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                            <p class=text-center>
                            <a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>
                            ";
                        }else{
                            echo "<h3 class='text-center text-danger mt-5 mb-2'>You have zero pending orders</h3>
                            <p class=text-center>
                            <a href='../index.php' class='text-dark'>Explore products </a></p>
                            ";
                        }
                    }
                }
            }
        }

    }
?>