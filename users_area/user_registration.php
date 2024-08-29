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
                    echo "<a href='./users_area/user_registration.php'>Register</a>";
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
                            echo "<a href='cart.php'><i class='bx bx-cart cart_icon'><sup>".cart_item()."</sup></i></a>";
                        } else {
                            echo "<a href='./users_area/user_login.php'><i class='bx bx-cart cart_icon'><sup>".cart_item()."</sup></i></a>";
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

    <div class="user_registration_container">
        <h3>New User Registration</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Fullname and Username -->
            <div class="reg_input_container">
                <div class="reg_input_box">
                    <label for="user_fullname">Fullname</label>
                    <input type="text" class="reg_input" name="user_fullname" placeholder="Enter your fullname"
                        required>
                </div>
                <div class="reg_input_box">
                    <label for="user_username">Username</label>
                    <input type="text" class="reg_input" name="user_username" placeholder="Enter your username"
                        required>
                </div>
            </div>

            <!-- Email and User Image -->
            <div class="reg_input_container">
                <div class="reg_input_box">
                    <label for="user_email">Email</label>
                    <input type="email" class="reg_input" name="user_email" placeholder="Enter your email " required>
                </div>
                <div class="reg_input_box">
                    <label for="user_image">Your Image</label>
                    <input type="file" class="reg_input" name="user_image" required>

                </div>
            </div>

            <!-- password field  -->
            <div class="reg_input_container">
                <div class="reg_input_box">
                    <label for="user_password">Password</label>
                    <input type="password" class="reg_input" name="user_password" placeholder="Enter password "
                        required>
                </div>
                <div class="reg_input_box">
                    <label for="user_confirm_password">Confirm Password</label>
                    <input type="password" class="reg_input" name="user_confirm_password"
                        placeholder="Enter confirm password " required>

                </div>
            </div>


            <!-- Address and Mobile -->
            <div class="reg_input_container">
                <div class="reg_input_box">
                    <label for="user_address">Address</label>
                    <input type="text" class="reg_input" name="user_address" placeholder="Enter your address" required>
                </div>
                <div class="reg_input_box">
                    <label for="user_mobile">Mobile</label>
                    <input type="text" class="reg_input" name="user_mobile" placeholder="Enter your mobile number"
                        required>
                </div>
            </div>

            <div>
                <input type="submit" class="register" name="user_register" value="Register">
                <p>Already have an account ?
                            <a href="./user_login.php" class="register_link">Login</a>
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
    if(isset($_POST['user_register'])){
        $user_fullname=$_POST['user_fullname'];
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash ($user_password,PASSWORD_DEFAULT);

        $user_confirm_password=$_POST['user_confirm_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        //select query
        $select_query="SELECT * FROM user_table WHERE username='$user_username' or user_email='$user_email'";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('Username & email already exists.')</script>";
        }
        else if($user_password!=$user_confirm_password)
        {
            echo "<script>alert('Password do not match')</script>";
        }
        else{
        //insert query
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="INSERT INTO user_table(user_fullname,username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES('$user_fullname','$user_username','$user_email','$hash_password','$user_image','$user_ip',' $user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);

        if($sql_execute){
            echo "<script>alert('Registration has been completed successfully')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        }else{
            die(mysqli_error($con));
        }
        
    }
//selecting cart items
$select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo "<script>window.open(index.php','_self')</script>";
}
    }

?>