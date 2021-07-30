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
				$sql_sp = "select * from loai_san_pham where ma = '$ma'";
				$result_sp = mysqli_query($connect, $sql_sp);
				$each = mysqli_fetch_array($result_sp);
			?>
			<h1 align="center">Chỉnh sửa loại sản phẩm </h1>
			<form method="post" action="sua.php">
				<table align="center" class="table">
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<tr>
						<td>Tên loại sản phẩm:</td>
						<td><textarea name="loai_san_pham" cols="80"> <?php echo $each['loai_san_pham'] ?> </textarea></td>
					</tr>
				</table>
				<?php if(isset($_GET['error'])) { ?>
					<p style="color: red; text-align: center; ">
						<?php echo $_GET['error'] ?>
					</p>
				<?php } ?>
				<table align="center">
					<td><button>Sửa</button></td>
				</table>
			</form>
		<?php mysqli_close($connect) ?>
		</div>
	</div>
</body>
</html>