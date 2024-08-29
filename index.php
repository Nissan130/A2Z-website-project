<!-- connect file -->
<?php 
      include('includes/connect.php');
      include('functions/common_function.php');
      session_start();
    //   $user_username = $_SESSION['username'];
    //   setcookie('username',$user_username, time()+(86400*1));
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

    <div class="middle-container">

        <!-- start card container  -->
        <div class="card_container">
            <?php
                    getProducts();
                    get_unique_categories();
                    get_unique_brands();
            ?>
        </div>
        <!-- end card container  -->

        <!-- start side navigation bar  -->
        <div class="sidenav">
            <ul class="sidenav_list">
                <!-- for brands  -->
                <li class="sidebar">
                    <h4>Brands</h4>

                    <div class="wrapper brand-wrapper">
                        <div class="select-btn">
                            <span>Select Brand</span>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                        <div class="content">
                            <div class="search">
                                <i class='bx bx-search'></i>
                                <input type="text" placeholder="Search">
                            </div>
                            <ul class="options">
                                <?php
                                        getBrands();
                                    ?>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- for categories  -->
                <li class="sidebar">
                    <h4>Categories</h4>

                    <div class="wrapper category-wrapper">
                        <div class="select-btn">
                            <span>Select Category</span>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                        <div class="content">
                            <div class="search">
                                <i class='bx bx-search'></i>
                                <input type="text" placeholder="Search">
                            </div>
                            <ul class="options">
                                <?php
                                    getCategories();
                               ?>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
        <!-- end side navigation bar  -->

    </div>
      <!-- middle container end  -->




    <!-- include footer  -->
    <?php include('./includes/footer.php') ;
        ?>


    <script src="script.js"></script>

</body>

</html>