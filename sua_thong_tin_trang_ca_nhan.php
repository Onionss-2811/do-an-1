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
			color: black;
		}
		.button a:hover{
			color: black;
		}
		.span_error
		{
			color: red;
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
			$result = mysqli_query($connect,$sql);
		?>
			<br><br><br><br><br><br><br><br><br>
			<h1 align="center">Nhập thông tin cá nhân mới của bạn</h1>
		<form method="post" action="process_sua_thong_tin.php">
			<table align="center" class="table" >
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<tr>
						<td>Họ tên:</td>
						<td>
							<input type="text" id="ten" name="ten" value="<?php echo $each['ten'] ?>" required>
							<br>
							<span id="error_ten" class="span_error"></span>
						</td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td>
							<input type="text" id="sdt" name="sdt" value="<?php echo $each['sdt'] ?>" required>
							<br>
							<span id="error_sdt" class="span_error"></span>
						</td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td>
							<input type="text" id="dia_chi" name="dia_chi" value="<?php echo $each['dia_chi'] ?>" required>
							<br>
							<span id="error_dia_chi" class="span_error"></span>
						</td>
					</tr>
			</table>
			<div align="center" class="button">
				<button>
					<a href="trang_ca_nhan.php?ma=<?php echo $each['ma'] ?>">Hủy</a>
				</button>
				<button onclick="return ok()">
					Cập nhật
				</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
			function ok() 
			{
				var check_error = false;
				// ten
				var ten = document.getElementById('ten').value;
				var ten_regex=/^[A-Za-z ]{2,}$/;
				if(ten_regex.test(ten))
				{
					document.getElementById('error_ten').innerHTML='';
				} else
					{
						document.getElementById('error_ten').innerHTML='Tên không được để trống và không bao gồm kí tự đặc biệt ';
						check_error = true;
					}
				// số điện thoại
				var sdt = document.getElementById('sdt').value;
				var sdt_regex=/^[0-9 ]{10,}$/;
				if(sdt_regex.test(sdt))
				{
					document.getElementById('error_sdt').innerHTML='';
				} else
					{
						document.getElementById('error_sdt').innerHTML='Vui lòng nhập số điện thoại hợp lệ ';
						check_error = true;
					}
				// địa chỉ
				var dia_chi = document.getElementById('dia_chi').value;
				var dia_chi_regex=/^[A-Za-z ]{2,}$/;
				if(dia_chi_regex.test(dia_chi))
				{
					document.getElementById('error_dia_chi').innerHTML='';
				} else
					{
						document.getElementById('error_dia_chi').innerHTML='Địa chỉ không được để trống và không bao gồm kí tự đặc biệt ';
						check_error = true;
					}

				// check return
				if (check_error) {
					return false;
				}
			}
		</script>
</body>
</html>