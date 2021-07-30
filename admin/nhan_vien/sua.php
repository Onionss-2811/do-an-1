<?php

$ma= $_POST['ma'];
$cap_do= $_POST['cap_do'];
$ten= $_POST['ten'];
$sdt= $_POST['so_dien_thoai'];
$email= $_POST['email'];
$mat_khau= $_POST['mat_khau'];

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "update admin 
	set
		ten= '$ten',
		sdt='$sdt',
		email='$email',
		mat_khau='$mat_khau',
		cap_do='$cap_do'
		where
		ma= '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:tat_ca_nhan_vien.php');