<h3 class="text-center mb-3 text-success">All orders</h3>
<table class="table table-bordered">
<thead class="table-info">
<?php
   
    $get_orders="SELECT * FROM user_orders";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo "<h2 class='text-danger text-center'>No orders yet</h2>";
    }
    else{
        echo "
        <tr class='text-center'>
            <th>SL No</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='table-secondary'>";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;


            echo "<tr class='text-center'>
                <td>$number</td>
                <td> $amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><i class='fa-solid fa-trash'></i></td>
                </tr>";
        }
    }

?>


    </tbody>
</table>