<?php
        if(isset($_GET['edit_products'])){
            $edit_id=$_GET['edit_products'];
           $get_data="SELECT * FROM products WHERE product_id=$edit_id";
           $result_data=mysqli_query($con,$get_data);
           $row=mysqli_fetch_assoc($result_data);

           $product_title=$row['product_title'];
           $product_description=$row['product_description'];
           $product_keywords=$row['product_keywords'];
           $category_id=$row['category_id'];
           $brand_id=$row['brand_id'];
           $product_image1=$row['product_image1'];
           $product_image2=$row['product_image2'];
           $product_image3=$row['product_image3'];
           $product_offer_price=$row['product_offer_price'];
           $product_main_price=$row['product_main_price'];


            
            //fetching category name
            $select_cat="SELECT * FROM categories WHERE category_id=$category_id";
            $result_cat=mysqli_query($con,$select_cat);
            $row_cat=mysqli_fetch_assoc($result_cat);
            $category_title=$row_cat['category_title'];

            //fetching brand name
            $select_brand="SELECT * FROM brands WHERE brand_id=$brand_id";
            $result_brand=mysqli_query($con,$select_brand);
            $row_brand=mysqli_fetch_assoc($result_brand);
            $brand_title=$row_brand['brand_title'];
        }

?>

<div class="container mt-5">
    <h1 class="text-center">
        Edit Product
    </h1>

    <form action="" method="post" enctype="multipart/form-data">

            <!-- product title  -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" required value="<?php echo $product_title;?>">
            </div>

            <!-- product description -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" required value="<?php echo $product_description;?>">
            </div>

            <!-- product keywords -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control" required value="<?php echo $product_keywords;?>">
            </div>

            <!-- product categories  -->
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
               <select name="product_category" class="form-select" required>
                <option value="<?php echo $category_id;?>"><?php echo $category_title;?></option>

                <?php
                    //fetching category name
                $select_category_all="SELECT * FROM categories";
                $result_cat_all=mysqli_query($con,$select_category_all);
                while($row_cat_all=mysqli_fetch_assoc($result_cat_all)){
                    $category_id=$row_cat_all['category_id'];
                $category_title=$row_cat_all['category_title'];
                echo "<option value='$category_id'>$category_title</option>";
        }
                ?>
                
               </select>
            </div>

            <!-- product brands  -->
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label">Product brand</label>
               <select name="product_brand" class="form-select" required>
                <option value="<?php echo $brand_id;?>"><?php echo $brand_title;?></option>
                <?php

                //fetching category name
                $select_brand_all="SELECT * FROM brands";
                $result_brand_all=mysqli_query($con,$select_brand_all);
                while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                $brand_id=$row_brand_all['brand_id'];
                $brand_title=$row_brand_all['brand_title'];
                echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
               </select>
            </div>

            <!-- product image1 -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required>
                <img src="./product_images/<?php echo $product_image1;?>" alt="" class="image">
                </div>
            </div>

             <!-- product image2 -->
             <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required>
                <img src="./product_images/<?php echo $product_image2;?>" alt="" class="image">
                </div>
            </div>

            <!-- product image3 -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3"  class="form-control w-90 m-auto" required>
                <img src="./product_images/<?php echo $product_image3;?>" alt="" class="image">
                </div>
            </div>

            <!-- product offer price -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_offer_price" class="form-label">Product Offer Price</label>
                <input type="text" id="product_offer_price" name="product_offer_price" class="form-control" required value="<?php echo $product_offer_price;?>">
            </div>

            <!-- product main price -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_main_price" class="form-label">Product Main Price</label>
                <input type="text" id="product_main_price" name="product_main_price" class="form-control" required value="<?php echo $product_main_price;?>">
            </div>

            <!-- update products  -->
             <div class="w-50 m-auto">
                <input type="submit" name="update_products" value="Update product" class="btn btn-info px-3 mb-3">
             </div>

            
    </form>
</div>


<!-- updating products  -->
<?php 
    if(isset($_POST['update_products'])){
            $product_title=$_POST['product_title'];
            $product_description=$_POST['product_description'];
            $product_keywords=$_POST['product_keywords'];
            $product_category=$_POST['product_category'];
            $product_brand=$_POST['product_brand'];
            $product_offer_price=$_POST['product_offer_price'];
            $product_main_price=$_POST['product_main_price'];


            $product_image1=$_FILES['product_image1']['name'];
            $product_image2=$_FILES['product_image2']['name'];
            $product_image3=$_FILES['product_image3']['name'];
            
            $tmp_product_image1=$_FILES['product_image1']['tmp_name'];
            $tmp_product_image2=$_FILES['product_image2']['tmp_name'];
            $tmp_product_image3=$_FILES['product_image3']['tmp_name'];

             //checking empty condition
        if($product_title=='' or  $product_description=='' or  $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_offer_price=='' or $product_main_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }
        else{
           move_uploaded_file($tmp_product_image1,"./product_images/$product_image1");
           move_uploaded_file($tmp_product_image2,"./product_images/$product_image2");
           move_uploaded_file($tmp_product_image3,"./product_images/$product_image3");

           //query to update products

           $update_products="UPDATE products SET 
           product_title='$product_title',
           product_description='$product_description',
           product_keywords='$product_keywords',
           category_id='$product_category',
           brand_id='$product_brand',
           product_image1='$product_image1',
           product_image2='$product_image2',
           product_image3='$product_image3',
           product_offer_price='$product_offer_price',
           product_main_price='$product_main_price',
           date=NOW() WHERE product_id=$edit_id";

           $result_update=mysqli_query($con,$update_products);
           if($result_update){
                echo "<script>alert('Product updated successfully')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
           }
        }
    }

?>