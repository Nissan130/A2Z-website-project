<?php
    if(isset($_GET['edit_brands'])){
        $brand_id=$_GET['edit_brands'];

        $update_brand="SELECT * FROM brands WHERE brand_id=$brand_id";
        $result_update_brand=mysqli_query($con,$update_brand);
        $row_brand=mysqli_fetch_assoc($result_update_brand);
        $brand_title=$row_brand['brand_title'];
        
    }
?>


<div class="container mt-5">
    <h1 class="text-center">
        Edit Brands
    </h1>

    <form action="" method="post" enctype="multipart/form-data">

            <!-- brand title  -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="brand_title" class="form-label">Brand Title</label>
                <input type="text" id="brand_title" name="brand_title" value="<?php echo $brand_title; ?>" class="form-control" required>
            </div>

            <!-- update brand  -->
            <div class="w-50 m-auto">
                <input type="submit" name="update_brand" value="Update brand" class="btn btn-info px-3 mb-3">
             </div>
    </form>
</div>

<?php
        if(isset($_POST['update_brand'])){
            $brand_title=$_POST['brand_title'];

            //query
            $update_query="UPDATE brands SET brand_title='$brand_title' WHERE brand_id=$brand_id";
            $result=mysqli_query($con,$update_query);

            if($result){
                echo "<script>alert('Brand updated successfully')</script>";
                echo "<script>window.open('index.php?view_brands','_self')</script>";
            }
        }

?>
