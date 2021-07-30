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
			$thu_muc_anh= '../../img/';
			$ma = $_GET['ma'];
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8');
			$sql_sp = "select * from san_pham where ma = '$ma'";
			$result_sp = mysqli_query($connect, $sql_sp);
			$each = mysqli_fetch_array($result_sp);

			$sql_lsp ='select * from loai_san_pham';
			$result_lsp=mysqli_query($connect,$sql_lsp);

			$sql_trang_thai ='select * from trang_thai_san_pham';
			$result_trang_thai=mysqli_query($connect,$sql_trang_thai);
			?>
			<h1 align="center">Chỉnh sửa sản phẩm </h1>
			<form method="post" action="sua.php" enctype="multipart/form-data">
				<table align="center" class="table">
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<tr>
						<td>Tên sản phẩm:</td>
						<td><textarea name="ten" cols="80"> <?php echo $each['ten'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Loại sản phẩm:</td>
						<td>
							<select name="loai">
								<?php foreach ($result_lsp as $each_lsp): ?>
									<option value="<?php echo $each_lsp['ma']  ?>"
										<?php 
											if ($each_lsp['ma'] == $each['loai']) echo "selected";
										?>
									>
										<?php echo $each_lsp['loai_san_pham'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Mô tả:</td>
						<td><textarea name="mo_ta" cols="80" rows="10"> <?php echo $each['mo_ta'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Ảnh sản phẩm:</td>
						<input type="hidden" name="anh_cu" value="<?php echo $each['anh'] ?>">
						<td><img height="60" src="<?php echo $thu_muc_anh . $each['anh'] ?>"></td>
					</tr>
					<tr>
						<td>Ảnh mới:</td>
						<td><input type="file" name="anh_moi"></td>
					</tr>
					<tr>
						<td>Giá bán:</td>
						<td><textarea name="gia" cols="80"> <?php echo $each['gia'] ?> </textarea></td>
					</tr>
					<tr>
						<td>Trạng Thái:</td>
						<td>
							<select name="trang_thai">
								<?php foreach ($result_trang_thai as $each_trang_thai): ?>
									<option value="<?php echo $each_trang_thai['ma']  ?>"
										<?php 
											if ($each_trang_thai['ma'] == $each['trang_thai']) echo "selected";
										?>
									>
										<?php echo $each_trang_thai['trang_thai_san_pham'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
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