<!-- connect file -->
<?php 
      include('../includes/connect.php');
      session_start();

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Checkout page</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awosome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->

        <nav class="navbar navbar-expand-lg sticky-top  bar">
            <div class="container-fluid">
                <img src="../Images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item navbar_link">
                            <a class="nav-link text-light fw-bold" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item navbar_link">
                            <a class="nav-link text-light fw-bold" href="../display_all.php">Products</a>
                        </li>
                        <?php
                               if(isset($_SESSION['username'])){
                                echo "<li class='nav-item navbar_link'>
                            <a class='nav-link text-light fw-bold' href='./users_area/profile.php'>My Account</a>
                        </li>";
                               } 
                               else{
                                echo "<li class='nav-item navbar_link'>
                            <a class='nav-link text-light fw-bold' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                               }
                        ?>

                        <li class="nav-item navbar_link">
                            <a class="nav-link text-light fw-bold" href="">Contact</a>
                        </li>

                    </ul>

                    <!-- search box -->
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second chiled -->

        <nav class="navbar navbar-expand-lg chiled_nav">
            <ul class="navbar-nav me-auto">
               
                <?php 
                 if(!isset($_SESSION['username'])){
                    echo " <li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                         </li>";
                        }
                        else{
                            echo " <li class='nav-item'>
                    <a class='nav-link' href='./logout.php'>Welcome ".$_SESSION['username']."</a>
                    </li>'";
                        }
                        
                    if(!isset($_SESSION['username'])){
                        echo " <li class='nav-item'>
                        <a class='nav-link' href='./user_login.php'>Login</a>
                        </li>'";
                            }
                            else{
                                echo " <li class='nav-item'>
                        <a class='nav-link' href='./logout.php'>Logout</a>
                        </li>'";
                            }

                ?>
            </ul>
        </nav>

        <!-- third chiled -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is at the heart if e-commerce and community</p>
        </div>

        <!-- fourth-chiled -->
        <div class="row">
            <div class="col-md-12">
                <!-- products -->
                <div class="row px-3">
                    <?php 
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }
                    else{
                        include('payment.php');
                    }
                    ?>
                    <!-- row end  -->
                </div>
                <!-- col end  -->

            </div>
        </div>

        <!-- last chiled -->
        <!-- include footer  -->
        <?php include('../includes/footer.php') ;
        ?>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>