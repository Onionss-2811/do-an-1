<?php include '../../admin/check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="admin">
		<div class="noi_dung">
			<form method="post" action="them.php" enctype="multipart/form-data">
				<table align="center" class="table">
					<tr>
						<td>Ảnh 1:</td>
						<td><input type="file" name="anh_1"></td>
					</tr>
					<tr>
						<td>Ảnh 2:</td>
						<td><input type="file" name="anh_2"></td>
					</tr>
					<tr>
						<td>Ảnh 3:</td>
						<td><input type="file" name="anh_3"></td>
					</tr>
					<tr>
						<td>Ảnh 4:</td>
						<td><input type="file" name="anh_4"></td>
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
		</div>
	</div>
</body>
</html>