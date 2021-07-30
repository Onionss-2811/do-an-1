<?php


	$ma= $_POST['ma'];
	$ten= $_POST['ten'];
	$loai= $_POST['loai'];
	$mo_ta= $_POST['mo_ta'];
	$anh= $_FILES['anh_moi'];
	$gia= $_POST['gia'];
	$trang_thai= $_POST['trang_thai'];

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

	$sql = "update san_pham 
		set
			ten= '$ten',
			loai= '$loai',
			mo_ta= '$mo_ta',
			gia= '$gia',
			anh= '$ten_anh',
			trang_thai= '$trang_thai'
			where
			ma= '$ma'
	";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:tat_ca_san_pham.php');