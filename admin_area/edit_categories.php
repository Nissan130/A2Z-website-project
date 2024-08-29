<?php
    if(isset($_GET['edit_categories'])){
        $category_id=$_GET['edit_categories'];

        $update_cat="SELECT * FROM categories WHERE category_id=$category_id";
        $result_update_cat=mysqli_query($con,$update_cat);
        $row_cat=mysqli_fetch_assoc($result_update_cat);
        $cat_title=$row_cat['category_title'];
        
    }
?>


<div class="container mt-5">
    <h1 class="text-center">
        Edit Categories
    </h1>

    <form action="" method="post" enctype="multipart/form-data">

            <!-- category title  -->
            <div class="form-outline w-50 m-auto mb-4">
                <label for="category_title" class="form-label">Category Title</label>
                <input type="text" id="category_title" name="category_title" value="<?php echo $cat_title; ?>" class="form-control" required>
            </div>

            <!-- update category  -->
            <div class="w-50 m-auto">
                <input type="submit" name="update_category" value="Update Category" class="btn btn-info px-3 mb-3">
             </div>
    </form>
</div>

<?php
        if(isset($_POST['update_category'])){
            $category_title=$_POST['category_title'];

            //query
            $update_query="UPDATE categories SET category_title='$category_title' WHERE category_id=$category_id";
            $result=mysqli_query($con,$update_query);

            if($result){
                echo "<script>alert('Category updated successfully')</script>";
                echo "<script>window.open('index.php?view_categories','_self')</script>";
            }
        }

?>
