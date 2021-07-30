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
			$sql = "select * from khach_hang ";
			$result = mysqli_query($connect,$sql);
			?>
			<h1 align="center">Tất cả khách hàng</h1>
		 <table align="center" class="table">
			<tr>
				<th>Tên khách hàng</th>
				<th>Số điện thoại</th>
				<th>Email</th>
				<th>Địa chỉ</th>
				<!-- <th>Tên tài khoản</th> -->
				<!-- <th>Mật khẩu</th> -->
				<th>Sửa</th>
			</tr>
			<?php foreach ($result as $each) { ?>
			 			<tr>
			 				<td>
							 	<?php echo $each['ten'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['sdt'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['email'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['dia_chi'] ?>
			 				</td>
			 				<!-- <td>
			 					<?php echo $each['ten_tai_khoan'] ?>
			 				</td> -->
			 				<!-- <td>
			 					<?php echo $each['mat_khau'] ?>
			 				</td> -->
			 				<td>
			 					<a href="chinh_sua_khach_hang.php?ma= <?php echo $each['ma'] ?>">Sửa</a>
			 				</td>
			 			</tr>	
			<?php } ?>
		</table>
		</div>
	</div>
</body>
</html>