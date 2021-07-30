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
			<h1 align="center">Thêm loại sản phẩm</h1>
			<form method="post" action="them.php">
				<table align="center" class="table">
					<tr>
						<td>Tên loại sản phẩm:</td>
						<td><textarea name="loai_san_pham" cols="80px" ></textarea></td>
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
			<?php mysqli_close($connect) ?>
		</div>
	</div>
</body>
</html>