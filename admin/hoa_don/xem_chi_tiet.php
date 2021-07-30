<?php include '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>
<body>
<div class="admin">
	<?php include '../chung/menu_admin.php'; ?>
	<?php include '../chung/header_admin.php'; ?>
	<?php
		$ma = $_GET['ma'];
		$thu_muc_anh = '../../img/';
		$tong=0;
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8');
		$sql = "select 
				hoa_don_chi_tiet.*,
				san_pham.ten,
                hoa_don.tinh_trang,
                hoa_don.ma,
				san_pham.anh
				from hoa_don_chi_tiet 
				join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
                join hoa_don on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
				where ma_hoa_don = '$ma'";
		$result = mysqli_query($connect,$sql);
	?>
	<div class="noi_dung">
	<h1 align="center">Chi tiết hóa đơn</h1>
	<table align="center" class="table" >
		<tr>
			<th>Tên sản phẩm</th>
			<th>Hình ảnh</th>
			<th>Số lượng</th>
			<th>Giá bán</th>
			<th>Tổng</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td>
					<?php echo $each['ten'] ?>
				</td>
				<td>
			 		<img height="60" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
				</td>
				<td>
					<?php echo $each['so_luong'] ?>
				</td>
				<td>
					<?php echo number_format($each['gia']) ?>VNĐ
				</td>
				<td>
					<?php echo number_format($each['so_luong'] * $each['gia']) ?>
					<?php $tong += $each['so_luong'] * $each['gia'] ?>VNĐ
				</td>
				<input type="hidden" name="ma" value="<?php echo $ma ?>">
			</tr>
		<?php endforeach ?>
	</table>
	<!-- <h3 style="text-align: left;"><button><a href="index.php">Quay lại</a></button></h3> -->
	<h3 style="text-align: right; color: red;">Tổng tiền: <?php echo number_format($tong) ?>VNĐ </h3>
	<div align="center">
		<?php if ($each['tinh_trang']==1){?>
			<a style="display: inline;" href="sua_tinh_trang.php?ma=<?php echo $each['ma'] ?>&tinh_trang=2"><button>Duyệt</button></a>
			<a style="display: inline;" href="sua_tinh_trang.php?ma=<?php echo $each['ma'] ?>&tinh_trang=3"><button>Hủy</button></a>
		<?php } ?>
	</div>
	</div>
</div>
</body>
</html>