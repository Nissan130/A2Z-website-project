<!-- connect file -->
<?php 
      include('includes/connect.php');
      include('functions/common_function.php');
      session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2Z Website</title>

    <!-- box icon link  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header class="header">

        <div class="logo">
            <img src="./Images/logo.png" alt="logo" class="logo_image">
        </div>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="display_all.php">Products</a>
            <?php
                if(isset($_SESSION['username'])){
                   echo "<a href='./users_area/profile.php'>My Account</a>";
                }
                else{
                    echo "<a href='./users_area/user_registration.php'>Register</a>";
                }
            ?>
            <?php
                if(isset($_SESSION['username'])){
                   echo "<a href='./users_area/logout.php'>Logout</a>";
                }
                else{
                    echo "<a href='./users_area/user_login.php'>Login</a>";
                }
            ?>
            <?php
                        if (isset($_SESSION['username'])) {
                            echo "<a href='cart.php'><i class='bx bx-cart cart_icon'><sup>".cart_item()."</sup></i></a>";
                        } else {
                            echo "<a href='./users_area/user_login.php'><i class='bx bx-cart cart_icon'><sup>".cart_item()."</sup></i></a>";
                        }
                        ?>
        </div>
        <div class="search_box" id="searchBox">
            <form action="search_product.php" method="get">
                <input type="text" placeholder="search products, category" name="search_data" class="search_field">
                <input type="submit" value="Search" name="search_data_btn" class="search_btn">
            </form>
        </div>
        <i class='bx bx-menu' id="menu"></i>
    </header>


    <div class="chiled_nav">
        <?php
                if(!isset($_SESSION['username'])){
                   echo "<a href=''>Welcome Guest</a>";
                }
                else{
                    echo "<a href=''>Welcome  " .$_SESSION['username']."</a>";
                }
        ?>

    </div>

    <div class="cart_container">
        <form action="" method="post">
            <div class="cart_table">
                <table>
                    <!-- php code to fetch the products  -->
                    <?php
                        $get_ip_address = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);

                        if($result_count > 0){
                            echo "
                               <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Price (Tk)</th>
                                        <th>Quantity</th>
                                        <th>Total Price (TK)</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                            ";

                            while($row = mysqli_fetch_array($result)){
                                $product_id = $row['product_id'];
                                $quantity = $row['quantity'];
                                $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);

                                while($row_product_price = mysqli_fetch_array($result_products)){
                                    $product_offer_price = $row_product_price['product_offer_price'];
                                    $price_table = $row_product_price['product_offer_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];

                                    $product_total_price = $product_offer_price * $quantity;
                                    $total_price += $product_total_price;

                                    ?>

                <tr>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
                    <td><?php echo $product_offer_price; ?></td>
                    <td><input type="number" name="quantity[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" class="quantity" min="1" data-price="<?php echo $product_offer_price; ?>"></td>
                    <td class="total_price"><?php echo $product_total_price; ?></td>
                    <td>
                        <form method="post" action="">
                            <button type="submit" name="remove_item" class="rmv_btn"><i class='bx bx-trash'></i></button>
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        </form>
                    </td>
                </tr>

                    <?php 
                                    }
                                }
                            } else {
                                echo "
                                    <h4 style='color:red; font-size:1.2rem'>Cart is empty</h4>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="checkout_option">
                <?php
                $get_ip_address = getIPAddress();
                $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
                $result = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result);

                if($result_count > 0){
                    echo "
                        <h4>Subtotal: <span class='subtotal' style='font-size:1.2rem; color:red;'>Tk. $total_price</span></h4>
                        <button class='button'><a href='index.php'>Continue Shopping</a></button>
                        <button class='button'><a href='#'>Checkout</a></button>
                    ";
                } else {
                    echo "
                        <button class='button'><a href='index.php'>Continue Shopping</a></button>
                    "; 
                }

                ?>
            </div>
        </form>
    </div>

    <?php
function remove_cart_item() {
    global $con;
    if (isset($_POST['remove_item'])) {
        if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
            $product_id = $_POST['product_id'];
            $delete_query = "DELETE FROM cart_details WHERE product_id=$product_id AND ip_address='" . getIPAddress() . "'";
            $run_delete = mysqli_query($con, $delete_query);
            if ($run_delete) {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        } else {
            echo "Product ID not set or empty.";
        }
    }
}
remove_cart_item();
?>



    <!-- include footer  -->
    <?php include('./includes/footer.php') ;
        ?>


    <script src="script.js"></script>


</body>

</html>


