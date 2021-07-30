<?php  

session_start();

session_destroy();

// unset($_SESSION['ma']);
// unset($_SESSION['ten']);
// unset($_SESSION['email']);
// unset($_SESSION['mat_khau']);

header("location:../index.php");