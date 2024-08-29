<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

// Getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$total_quantity = 0; // Initialize total quantity
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);

$invoice_number = mt_rand();
$status='pending';
$count_products = mysqli_num_rows($result_cart_price);

// Calculate total price and total quantity
while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity']; // Get the quantity for each item
    $total_quantity += $quantity; // Add to total quantity

    $select_products = "SELECT * FROM products WHERE product_id = $product_id";
    $run_price = mysqli_query($con, $select_products);

    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = $row_product_price['product_offer_price'];
        $total_price += ($product_price * $quantity); // Calculate total price based on quantity
    }
}


// Insert into user_orders table
$insert_orders = "INSERT INTO user_orders(user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES($user_id, $total_price, $invoice_number,$total_quantity,NOW(),'$status')";
$result_query = mysqli_query($con, $insert_orders);

if($result_query){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


// Insert each product into orders_pending table
mysqli_data_seek($result_cart_price, 0); // Reset pointer to the beginning of the result set
while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity']; // Get the quantity for each item

    $insert_pending_orders = "INSERT INTO orders_pending(user_id, invoice_number, product_id, quantity, order_status) VALUES($user_id, $invoice_number, $product_id, $quantity,'$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);
}

// Delete items from cart
$empty_cart = "DELETE FROM cart_details WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);

?>
