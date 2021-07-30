<?php


	$anh_1= $_FILES['anh_1'];
	$anh_2= $_FILES['anh_2'];
	$anh_3= $_FILES['anh_3'];
	$anh_4= $_FILES['anh_4'];

	$thu_muc_anh= 'img/';
	$duoi_anh_1=explode('.', $anh_1['name'])[1];
	$duoi_anh_2=explode('.', $anh_2['name'])[1];
	$duoi_anh_3=explode('.', $anh_3['name'])[1];
	$duoi_anh_4=explode('.', $anh_4['name'])[1];
	$ten_anh_1='anh1' .time() . '.' . $duoi_anh_1;
	$ten_anh_2='anh2' .time() . '.' . $duoi_anh_2;
	$ten_anh_3='anh3' .time() . '.' . $duoi_anh_3;
	$ten_anh_4='anh4' .time() . '.' . $duoi_anh_4;
	$duong_dan_anh_1= $thu_muc_anh . $ten_anh_1;
	$duong_dan_anh_2= $thu_muc_anh . $ten_anh_2;
	$duong_dan_anh_3= $thu_muc_anh . $ten_anh_3;
	$duong_dan_anh_4= $thu_muc_anh . $ten_anh_4;
	move_uploaded_file($anh_1['tmp_name'], $duong_dan_anh_1);
	move_uploaded_file($anh_2['tmp_name'], $duong_dan_anh_2);
	move_uploaded_file($anh_3['tmp_name'], $duong_dan_anh_3);
	move_uploaded_file($anh_4['tmp_name'], $duong_dan_anh_4);

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into slide(anh_1, anh_2, anh_3, anh_4)
	values ('$ten_anh_1','$ten_anh_2','$ten_anh_3','$ten_anh_4')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	// header('location:slide.php');