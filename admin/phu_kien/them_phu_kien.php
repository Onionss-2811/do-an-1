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
				$sql='select * from loai_phu_kien';
				$result=mysqli_query($connect,$sql);
			?>
			<br><br>
			<form method="post" action="them.php" enctype="multipart/form-data">
				<table align="center" class="table">
					<tr>
						<td>Tên phụ kiện:</td>
						<td><textarea name="ten" cols="80px" ></textarea></td>
					</tr>
					<tr>
						<td>Loại phụ kiện:</td>
						<td>
							<select name="loai">
								<?php foreach ($result as $each): ?>
									<option value="<?php echo $each['ma']  ?>">
										<?php echo $each['loai_phu_kien'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Ảnh phụ kiện:</td>
						<td><input type="file" name="anh"></td>
					</tr>
					<tr>
						<td>Giá bán:</td>
						<td><textarea name="gia" cols="80px"></textarea></td>
					</tr>
				</table>
				<table align="center">
					<td><button>Thêm</button></td>
				</table>
			</form>
		</div>
	</div>
</body>
</html>