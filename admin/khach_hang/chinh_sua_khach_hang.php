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
			$ma = $_GET['ma'];
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8');
			$sql = "select * from khach_hang where ma = '$ma'";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);
			?>
			<h1 align="center">Chỉnh sửa khách hàng</h1>
			<form method="post" action="sua.php">
				<table align="center" class="table" >
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<tr>
						<td>Tên khách hàng:</td>
						<td><textarea name="ten" cols="80px" > <?php echo $each['ten'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td><textarea name="so_dien_thoai" cols="80px"><?php echo $each['sdt'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><textarea name="email" cols="80px"><?php echo $each['email'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td><textarea name="dia_chi" cols="80px"><?php echo $each['dia_chi'] ?> </textarea></td>
					</tr>
					<!-- <tr>
						<td>Mật khẩu:</td>
						<td><textarea name="mat_khau" cols="80px"><?php echo $each['mat_khau'] ?> </textarea></td>
					</tr> -->
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