<?php 
if (!empty($_POST['ten_nguoi_nhan']) && !empty($_POST['sdt_nguoi_nhan']) && !empty($_POST['dia_chi_nguoi_nhan'])){ 

date_default_timezone_set('Asia/Ho_Chi_Minh');
$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];

session_start();

$ma_khach_hang = $_SESSION['ma'];
$tinh_trang = 1; //đang chờ xử lý 
$thoi_gian_mua = date("Y-m-d H:i:s");

$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8'); 

$sql = "insert into hoa_don(ma_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,
tinh_trang,thoi_gian_mua)
values ('$ma_khach_hang','$ten_nguoi_nhan','$sdt_nguoi_nhan','$dia_chi_nguoi_nhan','$tinh_trang','$thoi_gian_mua')";

mysqli_query($connect,$sql);

$sql = "select max(ma) from hoa_don";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

$ma_hoa_don = $each['max(ma)'];

foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong) {
	$sql = "select gia from san_pham where ma  = '$ma_san_pham'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);

	$gia = $each['gia'];

	$sql = "insert into hoa_don_chi_tiet(ma_hoa_don,ma_san_pham,so_luong,gia)
	values('$ma_hoa_don','$ma_san_pham','$so_luong','$gia')";

	mysqli_query($connect,$sql);
}

unset($_SESSION['gio_hang']);
header('location:index.php');
} else{
	header('location:xem_gio_hang.php?error= *vui lòng điền đầy đủ thông tin người nhận');
}