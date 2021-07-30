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
			<h1 align="center">Thêm khách hàng </h1>
			<form method="post" action="them.php">
				<table align="center" class="table">
					<tr>
						<td>Tên khách hàng:</td>
						<td><textarea name="ten" cols="80px" ></textarea></td>
					</tr>
					<!-- <tr>
						<td>Số điện thoại:</td>
						<td><textarea name="so_dien_thoai" cols="80px"></textarea></td>
					</tr> -->
					<tr>
						<td>Email:</td>
						<td><textarea name="email" cols="80px"></textarea></td>
					</tr>
					<!-- <tr>
						<td>Tên tài khoản:</td>
						<td><textarea name="ten_tai_khoan" cols="80px"></textarea></td>
					</tr> -->
					<tr>
						<td>Mật khẩu:</td>
						<td><textarea name="mat_khau" cols="80px"></textarea></td>
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