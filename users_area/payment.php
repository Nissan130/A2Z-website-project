<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

     <!-- Bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        
</head>
<body>
    <!-- php code to access user id  -->
     <?php
            $user_ip=getIPAddress();
            $get_user="SELECT * FROM user_table WHERE user_ip='$user_ip'";
            $result=mysqli_query($con,$get_user);
            $run_query=mysqli_fetch_array($result);
            $user_id=$run_query['user_id'];
     ?>
    <div class="container">
        <h2 class="text-center text-sucess ">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://www.bkash.com" target="_blank"><img src="../Images/bkash.png" alt=""></a>
            </div>
            <div class="col-md-6">
                <button class="bg-success px-3 py-2 m-5 border-0 button">
                <a href="order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"><h2 class="text-center text-light">Pay offline</h2></a>
                </button>
            </div>
           
        </div>
    </div>
</body>
</html>