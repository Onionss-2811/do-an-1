<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}
		.hoa_don{
			width: 100%;
			display: flex;
		}
		.table_hoa_don{
			width: 80%;
			margin: auto;
			text-align: center;
		}
		.table_hoa_don th{
			background-color: silver
		}
		.table_hoa_don tr:nth-child(odd)
		{
			background-color: #e3d5d5;
		}
		.button{
			border-radius: 30px; 
			background-color: #CCCCCC; 
			color: black; 
			border-color:#CCCCCC; 
			width: 100px; 
			height: 30px;
		}
		.button:hover{
			background-color: white; 
			color: black; 
		}
	</style>
</head>
<body>
	<?php include 'header_menu_fixed.php'; ?>
	<br><br><br><br><br><br><br><br><br>
	<?php 
		if (!empty($_SESSION['ma'])) {

		$ma_khach_hang = $_SESSION['ma'];
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8');
		$sql = "select * from hoa_don
				where hoa_don.ma_khach_hang = '$ma_khach_hang' order by ma desc;
				";
		$result = mysqli_query($connect,$sql);
		// $tong_so_hoa_don = mysqli_num_rows($result);
		// $so_hoa_don_1_trang = 9;
		// // tính ra số trang
		// $tong_so_trang = ceil($tong_so_hoa_don / $so_hoa_don_1_trang);
		// $trang_hien_tai  = 1;
		// if (isset($_GET['trang']))
		// 	{
		// 		$trang_hien_tai = $_GET['trang'];
		// 	}
		// $bo_qua = ($trang_hien_tai - 1) * $so_hoa_don_1_trang;
		
		// // hiển thị sản phẩm trên từng trang
		// $sql = "$sql limit $so_san_pham_1_trang offset $bo_qua";
		// $result = mysqli_query($connect, $sql);
	?>
	<div class="hoa_don">
	<table class="table_hoa_don">
		<tr>
			<th>Thời Gian</th>
			<th>Tình trạng</th>
			<th>Thông tin người nhận</th>
			<th>Xem</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr align="center">
				<td>
					<?php echo date_format(date_create($each['thoi_gian_mua']),'H:i:s d-m-Y') ?>
				</td>
				<td>
					<?php if ($each['tinh_trang']==1){
						echo "Đang chờ duyệt";
					} else if ($each['tinh_trang']==2){
						echo "Đã duyệt";
						} else 
							echo "Đã hủy";
					?>
				</td>
				<td>
					<?php echo $each['ten_nguoi_nhan'] ?>
					<br>
					<?php echo $each['dia_chi_nguoi_nhan'] ?>
					<br>
					<?php echo $each['sdt_nguoi_nhan'] ?>
				</td>
				<td>
					<a href="xem_chi_tiet_hoa_don.php?ma=<?php echo $each['ma'] ?>"><button class="button">Xem</button></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	</div>
<!-- 	<div align="center" >
					<?php for ($i=1; $i<=$tong_so_trang ; $i++) { ?>
						<div align="center" style="display: inline;">
							<a style="text-decoration:none; color:black;" href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"> 
								<button  class="button" style="margin: 10px;">
									<?php echo $i ?>
								</button>
							</a>
						</div>
					<?php } ?>
			</div> -->
	<?php } else { ?>
		<br><br><br><br>
		<h2 style="text-align: center;">Bạn cần đăng nhập để xem hóa đơn</h2>
	<?php } ?>
	<br><br><br><br><br>
	<?php include 'footer.php' ?>
	<?php include 'on_top.php' ?>
</body>
</html>