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
			width: 23.5%;
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
	<?php
		if (!empty($_SESSION['ma'])) {
			$ma = $_GET['ma'];
		} else{}
	?>
	<?php include 'header_menu_fixed.php'; ?>
	<br><br><br><br><br><br><br><br><br>
	<h1 align="center">Chỉnh sửa mật khẩu</h1>
	<form method="post" action="process_sua_mat_khau.php">
		<table align="center" class="table">	
			<input type="hidden" name="ma" value="<?php echo $ma ?>">
			<tr>
				<td>Nhập mật khẩu cũ:</td>
				<td>
					<input type="password" id="mat_khau_cu" name="mat_khau_cu">
					<br>
					<span id="error_mat_khau_cu" class="span_error"></span>
				</td>
			</tr>
			<tr>
				<td>Nhập mật khẩu mới:</td>
				<td>
					<input type="password" id="mat_khau_moi" name="mat_khau_moi">
				</td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu:</td>
				<td>
					<input type="password" id="nhap_lai_mat_khau" name="nhap_lai_mat_khau">
				</td>
					<span id="error_nhap_lai_mat_khau" class="span_error"></span>
			</tr>
		</table>
		<div align="center">
			<span id="error_mat_khau_moi" class="span_error"></span>
		</div>
		<br>
		<?php if(isset($_GET['error'])) { ?>
						<p style="color: red; text-align: center; ">
							<?php echo $_GET['error'] ?>
						</p>
			<?php } ?>
		<div align="center" class="button">
			<button>
				<a href="trang_ca_nhan.php?ma=<?php echo $each['ma'] ?>">Hủy</a>
			</button>
			<button  onclick="return ok()" >
				Cập nhật
			</button>
		</div>
	</form>
	<script type="text/javascript">
			function ok() 
			{
				var check_error = false;

				var mat_khau_moi = document.getElementById('mat_khau_moi').value;
				var mat_khau_moi_regex=/^[A-Za-z0-9]{8,}$/;
				if(mat_khau_moi_regex.test(mat_khau_moi))
				{
					document.getElementById('error_mat_khau_moi').innerHTML='';
				} else
					{
						document.getElementById('error_mat_khau_moi').innerHTML='Mật khẩu phải có từ 8 ký tự chữ và số trở lên không phân biệt chữ viết hoa và không bao gồm ký tự đặc biệt ';
						check_error = true;
					}
					if (check_error) {
						return false;
					}
			}
		</script>
</body>
</html>