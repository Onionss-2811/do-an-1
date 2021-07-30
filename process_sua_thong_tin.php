<?php

if (!empty($_POST['ten']) && !empty($_POST['sdt']) && !empty($_POST['dia_chi'])){ 

	$ma= $_POST['ma'];
	$ten= $_POST['ten'];
	$sdt= $_POST['sdt'];
	// $email= $_POST['email'];
	$dia_chi= $_POST['dia_chi'];

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "update khach_hang 
		set
			ten= '$ten',
			sdt='$sdt',
			dia_chi='$dia_chi'
			where
			ma= '$ma'
	";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:trang_ca_nhan.php');
}else {
            header("location:sua_thong_tin_ca_nhan.php?error= *vui lòng nhập đầy đủ thông tin");
        }