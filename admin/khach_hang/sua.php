<?php

$ma= $_POST['ma'];
$ten_khach_hang= $_POST['ten'];
$sdt= $_POST['so_dien_thoai'];
$email= $_POST['email'];
$dia_chi= $_POST['dia_chi'];
$mat_khau= $_POST['mat_khau'];

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "update khach_hang 
	set
		ten= '$ten_khach_hang',
		sdt='$sdt',
		email='$email',
		dia_chi='$dia_chi',
		mat_khau='$mat_khau'
		where
		ma= '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:tat_ca_khach_hang.php');