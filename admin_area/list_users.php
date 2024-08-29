<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h3 class="text-center mb-3 text-success">All Users</h3>
<table class="table table-bordered">
<thead class="table-info">
<?php
   
    $get_orders="SELECT * FROM user_table";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo "<h2 class='text-danger text-center'>No users yet</h2>";
    }
    else{
        echo "
        <tr class='text-center'>
            <th>SL No</th>
            <th>Usernamer</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='table-secondary'>";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id =$row_data['user_id'];
            $username =$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;


            echo "<tr class='text-center'>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image' class='image'></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><i class='fa-solid fa-trash'></i></td>
                </tr>";
        }
    }

?>


    </tbody>
</table>
</body>
</html>
