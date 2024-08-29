<h3 class="text-center mb-3 text-success">All Payments</h3>
<table class="table table-bordered">
<thead class="table-info">
<?php
   
    $get_orders="SELECT * FROM user_payments";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo "<h2 class='text-danger text-center'>No payments yet</h2>";
    }
    else{
        echo "
        <tr class='text-center'>
            <th>SL No</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Payment Date Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='table-secondary'>";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id =$row_data['payment_id'];
            $amount_due=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;


            echo "<tr class='text-center'>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount_due</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><i class='fa-solid fa-trash'></i></td>
                </tr>";
        }
    }

?>


    </tbody>
</table>