<?php

if (!empty($_POST['loai_san_pham']) ){

	$loai_san_pham= $_POST['loai_san_pham'];

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into loai_san_pham(loai_san_pham)
	values ('$loai_san_pham')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:tat_ca_loai_san_pham.php');
} else {
	header('location:them_loai_san_pham.php?error= *vui lòng điền tên loại sản phẩm');
}