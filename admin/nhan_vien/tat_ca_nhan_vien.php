<?php include '../check_nhan_vien.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
	<style type="text/css">
		.button_xoa{
			border-radius:15px;
			background-color: silver;
		}
		.button_xoa a{
			text-decoration: none;
			color: red;
		}
		.button_xoa:hover{
			background-color: red;
		}
		.button_xoa:hover a{
			color: white;
		}
	</style>
</head>
<body>
	<div class="admin">
		<?php include '../chung/menu_admin.php'; ?>
		<?php include '../chung/header_admin.php'; ?>
		<div class="noi_dung">
			<?php 
				if ($_SESSION['cap_do'] == 1) 
				{
					$connect = mysqli_connect('localhost','root','','1_do_an');
					mysqli_set_charset($connect,'utf8');
					$sql = "select 
							admin.*, cap_do.cap_do as 'ten_cap_do'
							from admin
							join cap_do on cap_do.ma = admin.cap_do
							where admin.ma != 1";
					$result = mysqli_query($connect,$sql);
				} else {
					$connect = mysqli_connect('localhost','root','','1_do_an');
					mysqli_set_charset($connect,'utf8');
					$sql = "select 
							admin.*, cap_do.cap_do as 'ten_cap_do'
							from admin
							join cap_do on cap_do.ma = admin.cap_do
							where admin.cap_do = 3";
					$result = mysqli_query($connect,$sql);
				}
			?>
			<h1 align="center">Tất cả nhân viên</h1>
		 <table align="center" class="table">
			<tr>
				<th>Tên nhân viên</th>
				<th>Cấp độ</th>
				<th>Số điện thoại</th>
				<th>Email</th>
				<!-- <th>Mật khẩu</th> -->
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
			<?php foreach ($result as $each) { ?>
			 			<tr>
			 				<td>
							 	<?php echo $each['ten'] ?>
			 				</td>
			 				<td>
							 	<?php echo $each['ten_cap_do'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['sdt'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['email'] ?>
			 				</td>
			 				<!-- <td>
			 					<?php echo $each['mat_khau'] ?>
			 				</td> -->
			 				<td>
			 					<a href="chinh_sua_nhan_vien.php?ma= <?php echo $each['ma'] ?>">Sửa</a>
			 				</td>
			 				<td>
			 					<button class="button_xoa" >
									<a onclick="return confirm('Bạn muốn xoá nhân viên này?')" href="xoa.php?ma= <?php echo $each['ma'] ?>">Xóa</a>
								</button>
			 				</td>
			 			</tr>	
			<?php } ?>
		</table>
		</div>
	</div>
</body>
</html>