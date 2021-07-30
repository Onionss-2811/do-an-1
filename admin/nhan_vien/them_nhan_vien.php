<?php include '../check_nhan_vien.php'; ?>
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
				$sql='select * from cap_do where ma != 1';
				$result=mysqli_query($connect,$sql);
			?>
			<?php
				$connect = mysqli_connect('localhost','root','','1_do_an');
				mysqli_set_charset($connect,'utf8'); 
				$sql_cap_do='select * from cap_do where ma = 3';
				$result_cap_do=mysqli_query($connect,$sql_cap_do);
			?>
			<h1 align="center">Thêm nhân viên</h1>
			<form method="post" action="them.php">
				<table align="center" class="table">
					<?php if ($_SESSION['cap_do'] == 1) { ?>
							<tr>
								<td>Cấp độ:</td>
								<td align="center">
									<select name="cap_do">
										<?php foreach ($result as $each): ?>
											<option value="<?php echo $each['ma']  ?>">
												<?php echo $each['cap_do'] ?>
											</option>
										<?php endforeach ?>
									</select>
								</td>
							</tr>
					<?php } else { ?>
						<tr>
								<td>Cấp độ:</td>
								<td align="center">
									<select name="cap_do">
										<?php foreach ($result_cap_do as $each_cap_do): ?>
											<option value="<?php echo $each_cap_do['ma']  ?>">
												<?php echo $each_cap_do['cap_do'] ?>
											</option>
										<?php endforeach ?>
									</select>
								</td>
							</tr>
					<?php } ?>
					<tr>
						<td>Tên nhân viên:</td>
						<td><textarea name="ten" cols="80px" ></textarea></td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td><textarea name="so_dien_thoai" cols="80px"></textarea></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><textarea name="email" cols="80px"></textarea></td>
					</tr>
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