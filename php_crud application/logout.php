<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","webstar");
  
    echo "<script>window.open('login_form.php','_self')</script>";
  
session_destroy();

?>