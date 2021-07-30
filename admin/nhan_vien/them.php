<?php

if (!empty($_POST['ten']) && !empty($_POST['cap_do']) && !empty($_POST['so_dien_thoai']) && !empty($_POST['email']) && !empty($_POST['mat_khau']) ){

	$ten= $_POST['ten'];
	$cap_do= $_POST['cap_do'];
	$sdt= $_POST['so_dien_thoai'];
	$email= $_POST['email'];
	$mat_khau= $_POST['mat_khau'];

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into admin(ten,sdt,email,mat_khau,cap_do)
	values ('$ten','$sdt','$email','$mat_khau','$cap_do')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:tat_ca_nhan_vien.php');
} else {
	header('location:them_nhan_vien.php?error=Vui lòng điền đầy đủ nội dung');
}