<?php

$ma = $_GET['ma'];
$tinh_trang = $_GET['tinh_trang'];

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "update hoa_don 
	set
		tinh_trang='$tinh_trang'
		where
		ma= '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');