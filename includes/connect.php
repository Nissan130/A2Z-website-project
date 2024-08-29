<?php

$con=mysqli_connect('localhost','root','','mystore');

// if($con){
//     echo "Connected successfully";
// }
// else{
//     die(mysqli_error($con));
// }

if(!$con){
    die(mysqli_error($con));
}

?>