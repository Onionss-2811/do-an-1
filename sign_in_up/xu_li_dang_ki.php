<?php

if (!empty($_POST['ten']) && !empty($_POST['email']) && !empty($_POST['mat_khau']) && !empty($_POST['nhap_lai_mat_khau']) ){

$ten_khach_hang= $_POST['ten'];
$so_dien_thoai= $_POST['so_dien_thoai'];
$email= $_POST['email'];
$mat_khau= $_POST['mat_khau'];
$nhap_lai_mat_khau= $_POST['nhap_lai_mat_khau'];

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "select * from khach_hang
where email = '$email'";
$result = mysqli_query($connect,$sql);

// đếm kq trả về
$so_ket_qua = mysqli_num_rows($result);

if ($so_ket_qua == 1) 
	{ 
		header('location:sign_up.php?error= *email này đã được đăng kí');
	} else if ($mat_khau == $nhap_lai_mat_khau) 
		{
			$sql = "insert into khach_hang(ten,sdt,email,mat_khau)
			values ('$ten_khach_hang','$so_dien_thoai','$email','$mat_khau')";
			mysqli_query($connect,$sql);
			mysqli_close($connect);

			header('location:sign_in.php');
		} else 
			{
				header('location:sign_up.php?error= *mật khẩu và nhập lại mật khẩu không trùng nhau');
			}
		} else {
			header('location:sign_up.php?error= *vui lòng điền đủ tên, số điện thoại, email, mật khẩu, nhập lại mật khẩu');
		}