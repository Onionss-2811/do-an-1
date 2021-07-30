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
			$ma = $_GET['ma'];
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8');
			$sql = "select * from admin where ma = '$ma'";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);

			$sql_admin ='select * from cap_do where ma !=1';
			$result_admin=mysqli_query($connect,$sql_admin);

			$sql_quan_li ='select * from cap_do where ma !=1 && ma !=2';
			$result_quan_li=mysqli_query($connect,$sql_quan_li);
			?>
			<h1 align="center">Chỉnh sửa nhân viên</h1>
			<form method="post" action="sua.php">
				<table align="center" class="table">
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<?php if ($_SESSION['cap_do'] == 1) { ?>
						<tr>
							<td>Cấp độ:</td>
							<td align="center">
								<select name="cap_do">
									<?php foreach ($result_admin as $each_admin): ?>
										<option value="<?php echo $each_admin['ma']  ?>"
											<?php 
												if ($each_admin['ma'] == $each['cap_do']) echo "selected";
											?>
										>
											<?php echo $each_admin['cap_do'] ?>
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
									<?php foreach ($result_quan_li as $each_quan_li): ?>
										<option value="<?php echo $each_quan_li['ma']  ?>"
											<?php 
												if ($each_quan_li['ma'] == $each['cap_do']) echo "selected";
											?>
										>
											<?php echo $each_quan_li['cap_do'] ?>
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td>Tên nhân viên:</td>
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