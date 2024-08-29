<?php 

session_start();
session_unset();
session_destroy();

echo "<script>window.alert('Logout Successfully')</script>";
echo "<script>window.open('../index.php','_self')</script>";


?>