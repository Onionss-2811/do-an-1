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
			$thu_muc_anh= '../../img/';
			$ma = $_GET['ma'];
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8');
			$sql_pk = "select * from phu_kien where ma = '$ma'";
			$result_pk = mysqli_query($connect, $sql_pk);
			$each = mysqli_fetch_array($result_pk);

			$sql_lpk ='select * from loai_phu_kien';
			$result_lpk=mysqli_query($connect,$sql_lpk);
			?>
			<br><br>
			<form method="post" action="sua.php" enctype="multipart/form-data">
				<table align="center" class="table">
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<tr>
						<td>Tên phụ kiện:</td>
						<td><textarea name="ten" cols="80"> <?php echo $each['ten'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Loại phụ kiện:</td>
						<td>
							<select name="loai">
								<?php foreach ($result_lpk as $each_lpk): ?>
									<option value="<?php echo $each_lpk['ma']  ?>"
										<?php 
											if ($each_lpk['ma'] == $each['loai']) echo "selected";
										?>
									>
										<?php echo $each_lpk['loai_phu_kien'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Ảnh phụ kiện:</td>
						<input type="hidden" name="anh_cu" value="<?php echo $each['anh'] ?>">
						<td><img height="60" src="<?php echo $thu_muc_anh . $each['anh'] ?>"></td>
					</tr>
					<tr>
						<td>Ảnh mới:</td>
						<td><input type="file" name="anh_moi"></td>
					</tr>
					<tr>
						<td>Giá bán:</td>
						<td><textarea name="gia" cols="80"> <?php echo $each['gia'] ?> </textarea></td>
					</tr>
				</table>
				<table align="center">
					<td><button>Sửa</button></td>
				</table>
			</form>
		<?php mysqli_close($connect) ?>
		</div>
	</div>
</body>
</html>