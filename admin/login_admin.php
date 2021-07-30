<?php

if (!empty($_POST['email']) && !empty($_POST['mat_khau'])){  

$email =$_POST['email'];
$mat_khau =$_POST['mat_khau'];

$connect = mysqli_connect('localhost','root','','1_do_an');
mysqli_set_charset($connect,'utf8');

$sql = "select * from admin
where email = '$email' and mat_khau = '$mat_khau'";
$result = mysqli_query($connect,$sql);

// đếm kq trả về
$so_ket_qua = mysqli_num_rows($result);

if ($so_ket_qua == 1) 
	{
		session_start();
		$each = mysqli_fetch_array($result);
		$_SESSION['ma'] = $each['ma'];
		$_SESSION['ten'] = $each['ten'];
		$_SESSION['cap_do'] = $each['cap_do'];
		$_SESSION['admin'] = 1;

		header("location:admin.php");
	} else 
		{
			header("location:index.php?error= *email hoặc mật khẩu không chính xác");
		}
} else {
	header("location:index.php?error= *vui lòng nhập email và mật khẩu");
}