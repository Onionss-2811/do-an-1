<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/sign_in_up.css">
</head>
<body>
	<div class="container" id="container">
		<div>
			<br><br><br><br><br><br><br>
			<form action="xu_li_quen_mat_khau.php" method="post">
				<h1>Vui lòng điền thông tin của bạn</h1>
				<input type="email" name="email" placeholder="Email" />
				<input type="password" name="mat_khau_moi" placeholder="Mật khẩu mới" />
				<input type="password" name="nhap_lai_mat_khau" placeholder="Nhập lại mật khẩu" />
				<!-- <input type="password" name="mat_khau" placeholder="Mật khẩu" /> -->
				<!-- <a href="quen_mat_khau.php">Bạn quên mật khẩu?</a> -->
				<?php if(isset($_GET['error'])) { ?>
						<p style="color: red; text-align: center; ">
							<?php echo $_GET['error'] ?>
						</p>
				<?php } ?>
				<button>Xác nhận</button>
			</form>
		</div>
	</div>
</body>
</html>