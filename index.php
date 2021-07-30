<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}
		.tong{
			width: 100%;
			height: auto;
			/*background-color: red;*/
		}
	</style>
<body>
	<div class="tong">
		<?php include 'header_menu_fixed.php'; ?>
		<?php include 'slide.php'; ?>
		<br>
		<br>
		<h2 style="text-align: center;">Sản phẩm mới</h2>
		<?php include 'content_new.php'; ?>
		<br>
		<h3 style="text-align: center;"> <a style="text-decoration: none; color: blue;" href="index_product.php">Xem thêm</a></h3>
		<br>
		<h2 style="text-align: center;">Sản phẩm sắp có</h2>
		<?php include 'content_coming_soon.php'; ?>
		<br>
		<h3 style="text-align: center;"> <a style="text-decoration: none; color: blue;" href="index_product.php">Xem thêm</a></h3>
		<br>
		<br>
		<h2 style="text-align: center;">Gợi ý cho bạn</h2>
		<?php include 'content.php' ?>
		<?php include 'slide_quang_cao.php'; ?>
		<?php include 'footer.php' ?>
		<?php include 'on_top.php' ?>
	</div>
</body>
</html>