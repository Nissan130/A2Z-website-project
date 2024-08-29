<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- font awosome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file  -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <header class="header">

        <div class="logo">
            <img src="../Images/logo.png" alt="logo" class="admin_logo_image">
        </div>
        <div class="text-center navbar"> 
            <h2 class="text-center text-light">Admin Dashboard</h2>
        </div>
        <i class='bx bx-menu' id="menu"></i>
    </header>

            <div class="admin_section">
            <button class="my-3 button"><a href="index.php" class="nav-link text-light p-2">Home</a></button>
                <button class="my-3 button"><a href="index.php?insert_products" class="nav-link text-light p-2">Insert
                        Products</a></button>


                <button class="my-3 button"><a href="index.php?view_products" class="nav-link text-light  p-2">View
                        Products</a></button>

                <button class="my-3 button"><a href="index.php?insert_category" class="nav-link text-light  p-2">Insert
                        Categories</a></button>

                <button class="my-3 button"><a href="index.php?view_categories" class="nav-link text-light  p-2">View
                        Categories</a></button>

                <button class="my-3 button"><a href="index.php?insert_brand" class="nav-link text-light  p-2">Insert
                        Brands</a></button>

                <button class="my-3 button"><a href="index.php?view_brands" class="nav-link text-light  p-2">View
                        Brands</a></button>

                <button class="my-3 button"><a href="index.php?list_orders" class="nav-link text-light p-2">All
                        Orders</a></button>

                <button class="my-3 button"><a href="index.php?list_payments" class="nav-link text-light p-2">All
                        Payments</a></button>
                <button class="my-3 button"><a href="index.php?list_users" class="nav-link text-light p-2">List
                        users</a></button>

                <button class="my-3 button"><a href="" class="nav-link text-light p-2">Logout</a></button>
            </div>
        </div>
    </div>

    <!-- fourth chiled -->
    <div class="container">
    <?php 
                if(isset($_GET['insert_products'])){
                    include('insert_products.php');
                }
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['delete_products'])){
                    include('delete_products.php');
                }
                if(isset($_GET['edit_categories'])){
                    include('edit_categories.php');
                }
                if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                }
                if(isset($_GET['delete_categories'])){
                    include('delete_categories.php');
                }
                if(isset($_GET['delete_brands'])){
                    include('delete_brands.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }


            ?>
    </div>

    <?php 
   include('../includes/footer.php') ; 
    ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>