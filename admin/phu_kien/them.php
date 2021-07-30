<?php

$ten= $_POST['ten'];
$loai= $_POST['loai'];
$anh= $_FILES['anh'];
$gia= $_POST['gia'];

$thu_muc_anh= '../../img/';
$duoi_anh=explode('.', $anh['name'])[1];
$ten_anh=time() . '.' . $duoi_anh;
$duong_dan_anh= $thu_muc_anh . $ten_anh;
move_uploaded_file($anh['tmp_name'], $duong_dan_anh);

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "insert into phu_kien(ten,loai,gia,anh)
values ('$ten','$loai','$gia','$ten_anh')";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:tat_ca_phu_kien.php');