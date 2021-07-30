<?php 

$ma=$_GET['ma'];
$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');
$sql ="delete from khach_hang where ma='$ma'";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:tat_ca_khach_hang.php');