<!-- connect file -->
<?php 
      include('includes/connect.php');
      include('functions/common_function.php');
      session_start();

      if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $query = "SELECT * FROM products WHERE product_id = $product_id";
        $result = mysqli_query($con, $query);
        $product = mysqli_fetch_assoc($result);
        $product_title = $product['product_title'];
        $product_description = $product['product_description'];
        // Fetch other product details as needed
    } else {
        // Handle case where product_id is not set
        $product_title = "Product Not Found";
    }

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

 <!-- calling cart function  -->
 <?php 
            cart();
         ?>

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

    <div class="details_card_container">
                <?php
                    view_details();
                ?>

        <!-- middle container end  -->
    </div>




    <!-- include footer  -->
    <?php include('./includes/footer.php') ;
        ?>


    <script src="script.js"></script>


</body>

</html>