<?php

if (!empty($_POST['ten']) && !empty($_POST['email']) && !empty($_POST['mat_khau']) ){

	$ten_khach_hang= $_POST['ten'];
	// $so_dien_thoai= $_POST['so_dien_thoai'];
	$email= $_POST['email'];
	// $ten_tai_khoan= $_POST['ten_tai_khoan'];
	$mat_khau= $_POST['mat_khau'];

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into khach_hang(ten,email,mat_khau)
	values ('$ten_khach_hang','$email','$mat_khau')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:tat_ca_khach_hang.php');
} else {
	header('location:them_khach_hang.php?error=Vui lòng điền đẩy đủ nội dung');
}