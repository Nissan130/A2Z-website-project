<?php
   

    if(isset($_GET['delete_products'])){
        $delete_id=$_GET['delete_products'];
        
        //delete query
        $delete_query="DELETE FROM products WHERE product_id=$delete_id";
        $result_query=mysqli_query($con,$delete_query);

        if($result_query){
            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
?>