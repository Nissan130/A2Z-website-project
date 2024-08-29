<?php 
include('../includes/connect.php');
if(isset($_POST['insert_products'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_offer_price=$_POST['product_offer_price'];
    $product_main_price=$_POST['product_main_price'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or  $product_description=='' or  $product_keywords=='' or $product_category=='' or $product_offer_price=='' or $product_main_price=='' or  $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_products="INSERT INTO products(product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_offer_price,product_main_price,date,status) 
        VALUES('$product_title','$product_description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_offer_price','$product_main_price',NOW(),'$product_status')";

        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the product')</script>";
        }
        else{
            echo "<script>alert('Products not inserted')</script>";
        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>

    <!-- Bootstrap CSS link --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awosome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file -->
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">   
         <h1>Insert Products</h1>
         <div class="product_container">
         <!-- start insert product container  -->
          <div class="insert_product_container">
            <!-- product title -->
            <div class="insert_product_form_outline">
                <label for="product_title" class="insert_form_label">Product Tittle </label>
                <input type="text" name="product_title" id="product_title" class="insert_product_input" placeholder="Enter product title" required>
            </div>

            <!-- product_description -->
            <div class="insert_product_form_outline">
                <label for="product_description" class="insert_form_label">Product Description </label>
                <input type="text" name="product_description" id="product_description" class="insert_product_input" placeholder="Enter product description"  required>
            </div>

            <!-- product keywords -->
            <div class="insert_product_form_outline">
                <label for="product_keywords" class="insert_form_label">Product Keywords </label>
                <input type="text" name="product_keywords" id="product_keywords" class="insert_product_input" placeholder="Enter product keywords"  required>
            </div>

            <!-- categories -->
            <div class="insert_product_form_outline">
            <label for="product_category" class="insert_form_label">Product Category </label>
                <select name="product_category" id="" class="insert_product_input">

                    <option value="">Select a category</option>

                <?php 

                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];

                        echo " <option value='$category_id'>$category_title</option>";
                    }
                
                ?>         
                </select>
            </div>

            <!-- brands -->
            <div class="insert_product_form_outline">
            <label for="product_brands" class="insert_form_label">Product Brand </label>
                <select name="product_brands" id="product_brands" class="insert_product_input">

                    <option value="">Select a brand</option>
                    <?php 

                $select_query = "SELECT * FROM brands";
                $result_query = mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];

                    echo "<option value='$brand_id'>$brand_title</option>";
                }

                ?>    
                </select>
            </div>

            <!-- product image 1 -->
            <div class="insert_product_form_outline">
                <label for="product_image1" class="insert_form_label">Product Image1 </label>
                <input type="file" name="product_image1" id="product_image1" class="insert_product_input" required>
            </div>

             <!-- product image 2 -->
             <div class="insert_product_form_outline">
                <label for="product_image2" class="insert_form_label">Product Image2 </label>
                <input type="file" name="product_image2" id="product_image2" class="insert_product_input"required>
            </div>

             <!-- product image 3 -->
             <div class="insert_product_form_outline">
                <label for="product_image3" class="insert_form_label">Product Image3 </label>
                <input type="file" name="product_image3" id="product_image3" class="insert_product_input"required>
            </div>

             <!-- product offer price -->
             <div class="insert_product_form_outline">
                <label for="product_offer_price" class="insert_form_label">Product Offer Price </label>
                <input type="text" name="product_offer_price" id="product_offer_price" class="insert_product_input" placeholder="Enter product offer price"  required>
            </div>
            <!-- product main price -->
            <div class="insert_product_form_outline">
                <label for="product_main_price" class="insert_form_label">Product Main Price </label>
                <input type="text" name="product_main_price" id="product_main_price" class="insert_product_input" placeholder="Enter product main price"  required>
            </div>

            </div>
        <!-- end insert product container  -->
          <!-- insert product -->
          <div class="insert_product">
                <input type="submit" name="insert_products" class="insert_product_btn" value="Insert products">
            </div>
        </div>
         </form>
    </div>
</body>
</html>