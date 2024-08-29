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
    <link rel="stylesheet" href="style.css">

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
                   echo "<a href=''>My Account</a>";
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
        <div class="search_box">
            <form action="../search_product.php" method="get">
                <input type="text" placeholder="search products" name="search_data" class="search_field">
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
    <div class="login_container">
      <h2> User Login</h2>
                    <form action="" method="post" enctype="multipart/form-data">

                     <!-- username field  -->
                     <div class="login_input_outline">
                        <label for="user_username" class="form_label">Username</label>
                        <input type="text" id="user_username" placeholder="Enter your username"
                             required name="user_username">
                    </div>


                    <!-- password field  -->
                    <div class="login_input_outline">
                        <label for="user_password" class="form_label">Password</label>
                        <input type="password" id="user_password" placeholder="Enter your password"
                            autocomplete="off" required name="user_password">
                    </div>

                    <!-- login button  -->
                    <div class="login">
                        <input type="submit" value="Login" class="login_button" name="user_login">
                        <p>Don't have an account ?
                            <a href="./user_registration.php" class="register_link">Register</a>
                        </p>
                    </div>

                    </form>  
            </div>
    
            <!-- include footer  -->
    <?php include('../includes/footer.php') ;
        ?>


    <script src="script.js"></script>

</body>

</html>


<!-- php code  -->
<?php 
 
 if(isset($_POST['user_login']))
 {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query="SELECT * FROM user_table WHERE username='$user_username'";
    $reslut=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($reslut);
    $row_data=mysqli_fetch_assoc($reslut);
    $user_ip=getIPAddress();

    //cart item
    $select_query_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_query_cart);
   // $row_count_cart=mysqli_num_rows($result_cart);

    if($row_count>0){
        $_SESSION['username']=$user_username; 
        if(password_verify($user_password,$row_data['user_password'])){
           // echo "<script>alert('Login successful')</script>" ;
           //if($row_count==1 and $row_count_cart==0){
            if($row_count==1){
            $_SESSION['username']=$user_username;
              echo "<script>alert('Login successful')</script>" ;
              echo "<script>window.open('../index.php','_self')</script>" ;
            }
        //    else{
        //     $_SESSION['username']=$user_username;
        //     echo "<script>alert('Login successful')</script>" ;
        //     echo "<script>window.open('index.php','_self')</script>" ;
        //    }

        }else{
            echo "<script>alert('Invalid Password')</script>";
        }

    }else{
        echo "<script>alert('Invalid Username')</script>";
    }
 }
 
 ?>