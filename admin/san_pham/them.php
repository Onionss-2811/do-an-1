<?php

if (!empty($_POST['ten']) && !empty($_POST['loai']) && !empty($_POST['mo_ta']) && !empty($_POST['gia']) && !empty($_FILES['anh']) ){

	$ten= $_POST['ten'];
	$loai= $_POST['loai'];
	$mo_ta= $_POST['mo_ta'];
	$anh= $_FILES['anh'];
	$gia= $_POST['gia'];
	$trang_thai= $_POST['trang_thai'];

	$thu_muc_anh= '../../img/';
	$duoi_anh=explode('.', $anh['name'])[1];
	$ten_anh=time() . '.' . $duoi_anh;
	$duong_dan_anh= $thu_muc_anh . $ten_anh;
	move_uploaded_file($anh['tmp_name'], $duong_dan_anh);

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into san_pham(ten,loai,mo_ta,gia,anh,trang_thai)
	values ('$ten','$loai','$mo_ta','$gia','$ten_anh','$trang_thai')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:tat_ca_san_pham.php');
} else {
	header('location:them_san_pham.php?error= *vui lòng điền đủ tên, loại, mô tả, ảnh, giá sản phẩm');
}