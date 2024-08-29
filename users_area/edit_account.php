<?php
           
        if(isset($_GET['edit_account'])){
            $user_session_name=$_SESSION['username'];
            $select_query="SELECT * FROM user_table WHERE username='$user_session_name'";
            $result_query=mysqli_query($con,$select_query);
            $row_fetch=mysqli_fetch_assoc($result_query);
            $user_id=$row_fetch['user_id'];
            $user_fullname=$row_fetch['user_fullname'];
            $username=$row_fetch['username'];
            $user_email=$row_fetch['user_email'];
            $user_address=$row_fetch['user_address'];
            $user_mobile=$row_fetch['user_mobile'];
        }
            if(isset($_POST['user_update'])){
                $update_id=$user_id;
                $user_fullname=$_POST['user_fullname'];
                $user_username=$_POST['user_username'];
                $user_email=$_POST['user_email'];
                $user_address=$_POST['user_address'];
                $user_mobile=$_POST['user_mobile'];
                $user_image = $_FILES['user_image']['name'];
                $user_image_tmp= $_FILES['user_image']['tmp_name'];
                move_uploaded_file($user_image_tmp,"./user_images/$user_image");
                

                //update query
                $update_query="UPDATE user_table SET user_fullname='$user_fullname',username='$user_username', user_email='$user_email', user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id=$update_id";
                $result_query_update=mysqli_query($con,$update_query);

                if($result_query_update){
                    echo "<script>alert('Data updated successfully')</script>";
                    echo "<script>window.open('logout.php','_self')</script>";
                }
            }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Accounnt</title>
</head>

<body>
    <div class="edit_account_container">
        <h3>Edit Account</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Fullname and Username -->
            <div class="input_container">
                <div class="input_box">
                    <label for="user_fullname">Fullname</label>
                    <input type="text" class="input" name="user_fullname" value="<?php echo $user_fullname;?>" required>
                </div>
                <div class="input_box">
                    <label for="user_username">Username</label>
                    <input type="text" class="input" name="user_username" value="<?php echo $username;?>" required>
                </div>
            </div>

            <!-- Email and User Image -->
            <div class="input_container">
                <div class="input_box">
                    <label for="user_email">Email</label>
                    <input type="email" class="input" name="user_email" value="<?php echo $user_email;?>" required>
                </div>
                <div class="input_box">
                    <label for="user_image">User Image</label>
                    <input type="file" class="input" name="user_image" required>
                    <img src="./user_images/<?php echo $user_image ;?>" class="edit_profile_img">
                </div>
            </div>

            <!-- Address and Mobile -->
            <div class="input_container">
                <div class="input_box">
                    <label for="user_address">Address</label>
                    <input type="text" class="input" name="user_address" value="<?php echo $user_address;?>" required>
                </div>
                <div class="input_box">
                    <label for="user_mobile">Mobile</label>
                    <input type="text" class="input" name="user_mobile" value="<?php echo $user_mobile;?>" required>
                </div>
            </div>

            <input type="submit" class="update_info" name="user_update" value="Update Information">
        </form>

        <!-- update password start  -->
        <div class="edit_password_container">
            <form action="">
                <div class="row_password">
                    <div class="pass_input">
                        <label for="old_password">Old Password</label>
                        <input type="password" class="input_password" name="old_password" required>
                    </div>
                    <div class="pass_input">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="input_password" name="current_password" required>
                    </div>
                    <div class="pass_input">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="input_password" name="confirm_password" required>
                    </div>

                </div>
                <input type="submit" class="update_password" name="user_update_password" value="Update Password">
            </form>
        </div>
        <!-- update password end  -->
    </div>

</body>

</html>