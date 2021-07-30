<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		.table tr:nth-child(odd)
			{
				background-color: #e3d5d5;
			}
		.table{
			width: 25%;
		}
		.button button{
			background-color: black;
			color: white;
		}
		.button a{
			text-decoration: none;
			color: white;
		}
		.button button:hover{
			background-color: white;
		}
		.button a:hover{
			color: black;
		}
	</style>
</head>
<body>
	<?php include 'header_menu_fixed.php'; ?>
	<div>
		<?php 
			$ma = $_SESSION['ma'];
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8');
			$sql = "select * from khach_hang where ma = '$ma'";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);
		?>
			<br><br><br><br><br><br><br><br><br>
			<h1 align="center">Thông tin cá nhân của bạn</h1>
		<table align="center" class="table" >
				<tr>
					<td>Họ tên:</td>
					<td><?php echo $each['ten'] ?></td>
				</tr>
				<tr>
					<td>Số điện thoại:</td>
					<td><?php echo $each['sdt'] ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $each['email'] ?></td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td><?php echo $each['dia_chi'] ?></td>
				</tr>
		</table>
		<div align="center" class="button">
			<button>
				<a href="sua_mat_khau.php?ma=<?php echo $each['ma'] ?>">Chỉnh sửa mật khẩu</a>
			</button>
			<button>
				<a href="sua_thong_tin_trang_ca_nhan.php?ma=<?php echo $each['ma'] ?>">Chỉnh sửa thông tin</a>
			</button>
		</div>
	</div>
</body>
</html>