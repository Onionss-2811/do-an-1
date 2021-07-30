<?php include '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>
<body>
	<div class="admin">
		<?php include '../chung/menu_admin.php'; ?>
		<?php include '../chung/header_admin.php'; ?>
		<div class="noi_dung">

			<?php
				$connect = mysqli_connect('localhost','root','','1_do_an');
				mysqli_set_charset($connect,'utf8'); 
				$sql='select * from loai_san_pham';
				$result=mysqli_query($connect,$sql); 
				$sql_trang_thai='select * from trang_thai_san_pham where ma != 2';
				$result_trang_thai=mysqli_query($connect,$sql_trang_thai);
			?>
			<h1 align="center">Thêm sản phẩm</h1>
			<form method="post" action="them.php" enctype="multipart/form-data">
				<table align="center" class="table">
					<tr>
						<td>Tên sản phẩm:</td>
						<td><textarea name="ten" cols="80px" ></textarea></td>
					</tr>
					<tr>
						<td>Loại sản phẩm:</td>
						<td>
							<select name="loai">
								<?php foreach ($result as $each): ?>
									<option value="<?php echo $each['ma']  ?>">
										<?php echo $each['loai_san_pham'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Trạng thái sản phẩm:</td>
						<td>
							<select name="trang_thai">
								<?php foreach ($result_trang_thai as $each_trang_thai): ?>
									<option value="<?php echo $each_trang_thai['ma']  ?>">
										<?php echo $each_trang_thai['trang_thai_san_pham'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Mô tả:</td>
						<td><textarea name="mo_ta" cols="80px" rows="10px" ></textarea></td>
					</tr>
					<tr>
						<td>Ảnh sản phẩm:</td>
						<td><input type="file" name="anh"></td>
					</tr>
					<tr>
						<td>Giá bán:</td>
						<td><textarea name="gia" cols="80px"></textarea></td>
					</tr>
				</table>
				<?php if(isset($_GET['error'])) { ?>
					<p style="color: red; text-align: center; ">
						<?php echo $_GET['error'] ?>
					</p>
				<?php } ?>
				<table align="center">
					<td><button>Thêm</button></td>
				</table>
			</form>
			<?php mysqli_close($connect) ?>
		</div>
	</div>
</body>
</html>