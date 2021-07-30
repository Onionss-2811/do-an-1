<?php

$ma= $_POST['ma'];
$ten= $_POST['ten'];
$loai= $_POST['loai'];
$anh= $_FILES['anh_moi'];
$gia= $_POST['gia'];

if ($anh['size']==0) 
	{
		$ten_anh=$_POST['anh_cu'];

	}	else
			{		
				$thu_muc_anh= '../../img/';
				$duoi_anh=explode('.', $anh['name'])[1];
				$ten_anh=time() . '.' . $duoi_anh;
				$duong_dan_anh= $thu_muc_anh . $ten_anh;
				move_uploaded_file($anh['tmp_name'], $duong_dan_anh);
			}

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "update phu_kien 
	set
		ten= '$ten',
		loai= '$loai',
		gia= '$gia',
		anh= '$ten_anh'
		where
		ma= '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:tat_ca_phu_kien.php');