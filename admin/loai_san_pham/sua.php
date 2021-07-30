<?php


	$ma= $_POST['ma'];
	$loai_san_pham= $_POST['loai_san_pham'];

	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');

	$sql = "update loai_san_pham 
		set
			loai_san_pham= '$loai_san_pham'
			where
			ma= '$ma'
	";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('location:tat_ca_loai_san_pham.php');