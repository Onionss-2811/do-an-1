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
	<?php include '../chung/header_hoa_don.php'; ?>
	<?php 
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8');
		$tim_kiem = '';
        if (isset($_GET['tim_kiem'])) 
            {
                $tim_kiem = $_GET['tim_kiem'];
            }
        $sql = "select * from hoa_don where hoa_don.ten_nguoi_nhan like '%$tim_kiem%' ";
		$result = mysqli_query($connect,$sql);


		$sql = "select  
				hoa_don.*, khach_hang.ten, khach_hang.dia_chi, khach_hang.sdt 
				from hoa_don
				join
				khach_hang on khach_hang.ma = hoa_don.ma_khach_hang
				where hoa_don.ten_nguoi_nhan like '%$tim_kiem%'
				order by ma desc
				";
		$result = mysqli_query($connect, $sql);

            // tổng số ản phẩm đang có
            $tong_so_hoa_don = mysqli_num_rows($result);
            $so_hoa_don_1_trang = 9;
            // tính ra số trang
            $tong_so_trang = ceil($tong_so_hoa_don / $so_hoa_don_1_trang);
            $trang_hien_tai  = 1;
            if (isset($_GET['trang']))
              {
                $trang_hien_tai = $_GET['trang'];
              }
            $bo_qua = ($trang_hien_tai - 1) * $so_hoa_don_1_trang;
            // hiển thị sản phẩm trên từng trang
			$result = mysqli_query($connect, $sql);
            $sql = "$sql limit $so_hoa_don_1_trang offset $bo_qua";
            $result = mysqli_query($connect, $sql);
        ?>
	?>
	<div class="noi_dung">
	<h1 align="center">Tất cả hóa đơn</h1>
		<table align="center" class="table">
			<tr>
				<th>Thời Gian</th>
				<th>Tình trạng</th>
				<th>Thông tin người nhận</th>
				<th>Thông tin người đặt</th>
				<th>Sửa tình trạng</th>
				<th>Xem</th>
			</tr>
			<?php foreach ($result as $each): ?>
				<tr align="center">
					<td>
						<?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s') ?>
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
						<?php echo $each['ten'] ?>
						<br>
						<?php echo $each['dia_chi'] ?>
						<br>
						<?php echo $each['sdt'] ?>
					</td>
					<td>
						<?php if ($each['tinh_trang']==1){?>
							<a style="display: inline;" href="sua_tinh_trang.php?ma=<?php echo $each['ma'] ?>&tinh_trang=2"><button>Duyệt</button></a>
							<a style="display: inline;" href="sua_tinh_trang.php?ma=<?php echo $each['ma'] ?>&tinh_trang=3"><button>Hủy</button></a>
						<?php } else { ?>
							<p>Đã xác nhận</p>
						<?php } ?>
					</td>
					<td>
						<a href="xem_chi_tiet.php?ma=<?php echo $each['ma'] ?>"><button>Xem</button></a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<p style="text-align: center;">
					<?php for ($i=1; $i<=$tong_so_trang ; $i++) { ?>
						<a style="text-decoration:none; color:black; display: inline; " href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"> 
							<button>
								<?php echo $i ?>
							</button> 
						</a>
					<?php } ?>
				</p>
	</div>
</div>
</body>
</html>