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
		.button_huy{
			border-radius: 30px; 
			border-color: black;
			background-color: black; 
			width: 150px; 
			height: 40px;
		}
		.button_huy:hover{
			border-radius: 30px; 
			border-color: red;
			background-color: red;
		}
		.hoa_don{
			width: 100%;
			display: flex;
		}
		.table_hoa_don_chi_tiet{
			width: 80%;
			margin: auto;
			text-align: center;

		}
		.table_hoa_don_chi_tiet th{
			background-color: silver
		}
		.table_hoa_don_chi_tiet tr:nth-child(odd)
			{
				background-color: #e3d5d5;
			}
	</style>
</head>
<body>
	<?php include 'header_menu_fixed.php'; ?>
	<br><br><br><br><br><br><br><br><br>
	<?php
		$ma = $_GET['ma'];
		$thu_muc_anh = 'img/';
		$tong=0;
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8');
		$sql = "select 
				hoa_don_chi_tiet.*,
				san_pham.ten,
				san_pham.anh
				from hoa_don_chi_tiet 
				join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
				where ma_hoa_don = '$ma'";
		$result = mysqli_query($connect,$sql);
	?>
	<div class="hoa_don">
	<table class="table_hoa_don_chi_tiet" >
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
					<?php echo number_format( $each['gia'] )?>VNĐ
				</td>
				<td>
					<?php echo number_format( $each['so_luong'] * $each['gia'] )?>VNĐ
					<?php $tong += $each['so_luong'] * $each['gia'] ?> 
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	</div>
	<h3 style="text-align: right; color: red;">Tổng tiền: <?php echo number_format( $tong )?>VNĐ </h3>
	<div align="center" >
			<!-- <button class="button_huy" onclick="myFunction()"><a id="huỷ đơn hàng" href="" style="text-decoration: none;color: white;">Huỷ đơn hàng</a></button> -->
		</div>
	<br><br><br><br><br>
	<?php include 'footer.php' ?>
	<script type="text/javascript">
		function myFunction() {
			var x = confirm("Bạn muốn huỷ đơn hàng này?");
				if (x == true) {
				  document.getElementById("huy_don_hang").href = "";
				} else {
				  //don't delete
				}
		}
	</script>
</body>
</html>