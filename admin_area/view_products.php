
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-center text-success">All Products</h3>

<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr class="text-center">
            <th>SL No</th>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Offer Price</th>
            <th>Product Main Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary">
        <?php
                $select_products="SELECT * FROM products";
                $result=mysqli_query($con,$select_products);
                $number=0;
                while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image=$row['product_image1'];
                    $product_offer_price=$row['product_offer_price'];
                    $product_main_price=$row['product_main_price'];
                    $product_status=$row['status'];
                    $number++;
              ?>      
                <tr class="text-center">
                <td><?php echo $number;?></td>
                <td><?php echo $product_id;?></td>
                <td><?php echo $product_title;?></td>
                <td><img src="./product_images/<?php echo $product_image;?>" class="product_image"></td>
                <td><?php echo $product_offer_price;?></td>
                <td><?php echo $product_main_price;?></td>
                <td><?php 
                    $get_count="SELECT * FROM orders_pending WHERE product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;

                ?></td>
                <td><?php echo $product_status;?></td>
                <td><a href="index.php?edit_products=<?php echo $product_id;?>" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_products=<?php echo $product_id;?>" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php
                }?>
    </tbody>
</table>
</body>
</html>
