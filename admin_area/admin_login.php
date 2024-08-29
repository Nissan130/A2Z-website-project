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
    <title>Admin Login</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

     <!-- font awosome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../style.css">

</head>
<body>
    <div class="container-fluid m-5">
        <h2 class="text-center mb-5">Admin Login</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                    <img src="./product_images/apple1.jpg" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">

                    <!-- username  -->
                            <div class="form-outline mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text"  class="form-control"id="username" name="username" placeholder="Enter your username" autocomplete="off" required>
                            </div>

                            <!-- password  -->
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"  class="form-control"id="password" name="password" placeholder="Enter your password" autocomplete="off" required>
                            </div>

                            <!-- login button  -->
                            <div>
                                <input type="submit" class="bg-info py-2 px-3 border-0" value="Login" name="admin_login">
                                <p class="small fw-bold mt-2 pt-1">Already have an account ? <a href="admin_registration.php" class="link-danger">Register</a></p>
                            </div>

                    </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
        if(isset($_POST['admin_login'])){
            $admin_username=$_POST['username'];
            $password=$_POST['password'];

            //select query
            $select_query="SELECT * FROM admin_table WHERE admin_username='$admin_username'";
            $result=mysqli_query($con,$select_query);
            $rows_count=mysqli_num_rows($result);
            $rows_data=mysqli_fetch_assoc($result);
            $admin_ip=getIPAddress();


            if($rows_count>0){
                $_SESSION['username']=$admin_username; 
                if(password_verify($password,$rows_data['admin_password'])){
                    echo "<script>alert('Login successful')</script>" ;
                    echo "<script>window.open('index.php','_self')</script>" ;
        
                }else{
                    echo "<script>alert('Invalid Password')</script>";
                }
        
            }else{
                echo "<script>alert('Invalid Username')</script>";
            }

        }

?>