
     
     
     <div class="delete_account_container">
       <h3>Delete Account ?</h3>

        <form action="" method="post">
            <div>
             <button type="submit" name="delete" class="delete">Delete Account</button>
                <!-- <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account"> -->
            </div>
            <div>
             <button type="submit" name="dont_delete">Don't Delete Account</button>
                <!-- <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account"> -->
            </div>
        </form>
        </div>
<?php 

    $username_session = $_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="DELETE FROM user_table  WHERE username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }     
    }

    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>