<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

     <!-- font awosome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../style.css">

</head>
<body>
    <div class="container-fluid m-5">
        <h2 class="text-center mb-5">Admin Registration</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                    <img src="./product_images/apple1.jpg" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                    <form action="" method="post" enctype="multipart/form-data">

                     <!-- User fullname  -->
                     <div class="form-outline mb-4">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text"  class="form-control"id="fullname" name="fullname" placeholder="Enter your full name" autocomplete="off" required>
                            </div>

                    <!-- username  -->
                            <div class="form-outline mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text"  class="form-control"id="username" name="username" placeholder="Enter your username" autocomplete="off" required>
                            </div>

                            <!-- Email  -->
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"  class="form-control"id="email" name="email" placeholder="Enter your email" autocomplete="off" required>
                            </div>

                            <!-- password  -->
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"  class="form-control"id="password" name="password" placeholder="Enter your password" autocomplete="off" required>
                            </div>

                            <!--confirm password  -->
                            <div class="form-outline mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password"  class="form-control"id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" autocomplete="off" required>
                            </div>

                            <!-- User Image  -->
                            <div class="form-outline mb-4">
                                <label for="admin_image" class="form-label">Enter your image</label>
                                <input type="file"  class="form-control"id="admin_image" name="admin_image" required>
                            </div>

                            <!-- register button  -->
                            <div>
                                <input type="submit" class="bg-info py-2 px-3 border-0" value="Register" name="admin_register">
                                <p class="small fw-bold mt-2 pt-1">Don't have an account ? <a href="admin_login.php" class="link-danger">Login</a></p>
                            </div>

                    </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
if(isset($_POST['admin_register'])){

    $admin_fullname=$_POST['fullname'];
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);

    $confirm_password=$_POST['confirm_password'];
    $admin_image=$_FILES['admin_image']['name'];
    $admin_image_tmp=$_FILES['admin_image']['tmp_name'];
    $admin_ip=getIPAddress();

   
    //select query
    $select_query="SELECT * FROM admin_table WHERE admin_username='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('username or email already exists. Try different')</script>";
    }
    else if($password!=$confirm_password){
        echo "<script>alert('Password do not match')</script>";
    }

    else{
        move_uploaded_file($admin_image_tmp,"./admin_images/$admin_image");
    //insert query
    $insert_query="INSERT INTO admin_table(admin_fullname,admin_username,admin_email,admin_ip,admin_password,admin_image) VALUES('$admin_fullname','$admin_username','$admin_email','$admin_ip','$hash_password','$admin_image')";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
        echo "<script>alert('Registration has completed successfully')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
    else{
        die(mysqli_error($con));
    }

}
}

?>