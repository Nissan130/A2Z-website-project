<!-- connect file -->
<?php 
      include('../includes/connect.php');
      include('../functions/common_function.php');
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
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <header class="header">

        <div class="logo">
            <img src="../Images/logo.png" alt="logo" class="logo_image">
        </div>
        <div class="navbar">
            <a href="../index.php">Home</a>
            <a href="../display_all.php">Products</a>
            <?php
                if(isset($_SESSION['username'])){
                   echo "<a href='profile.php'>My Account</a>";
                }
                else{
                    echo "<a href='user_registration.php'>Register</a>";
                }
            ?>
            <?php
                if(isset($_SESSION['username'])){
                   echo "<a href='logout.php'>Logout</a>";
                }
                else{
                    echo "<a href='user_login.php'>Login</a>";
                }
            ?>

            <?php
                        if (isset($_SESSION['username'])) {
                            echo "<a href='../cart.php'><i class='bx bx-cart cart_icon'><sup>".cart_item()."</sup></i></a>";
                        } else {
                            echo "<a href='user_login.php'><i class='bx bx-cart cart_icon'><sup>".cart_item()."</sup></i></a>";
                        }
                        ?>
        </div>
        <div class="search_box" id="searchBox">
            <form action="../search_product.php" method="get">
                <input type="text" placeholder="search products, category" name="search_data" class="search_field" required>
                <input type="submit" value="Search" name="search_data_btn" class="search_btn">
            </form>
        </div>
        <i class='bx bx-menu' id="menu"></i>
    </header>

    <div class="profile_main_container">
        <div class="profile_left_container">


            <div class="profile_name">
                <!-- php code  -->
                <?php
                            $user_username = $_SESSION['username'];
                            $select_query = "SELECT * FROM user_table WHERE username='$user_username'";
                            $result_query = mysqli_query($con,$select_query);
                            $row = mysqli_fetch_array($result_query);
                            $username = $row['username'];
                            $user_email = $row['user_email'];
                            $user_mobile = $row['user_mobile'];
                            $user_image = $row['user_image'];

                            echo " <img src='./user_images/$user_image' alt=''>
                                <div class='info'>
                                <p class='usernane'>$username</p>
                                <p class='email'>$user_email</p>
                                <p class='phone'>$user_mobile</p>";
                            ?>

            </div>

        </div>
        <div class="profile_orders">
            <ul>
                <li><a href="#">Pending Orders</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="profile.php?edit_account">Edit Account</a></li>
                <li><a href="profile.php?delete_account">Delete Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="profile_right_container">
    <?php
                   // get_user_order_details();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
            ?>
    </div>

    </div>


    


    <!-- include footer  -->
    <?php include('../includes/footer.php') ;
        ?>


    <script src="../script.js"></script>

</body>

</html>