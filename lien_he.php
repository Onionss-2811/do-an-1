<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background-color: black;
		}
		.noi_dung{
			width: 100%;
			height: 100%;
			position: relative;
			float: left;
		}
		.trai{
			position: absolute;
			width: 65%;
			height: 475px;
			/*background-color: red;*/
		}
		.phai{
			float: right;
			width: 35%;
			height: 475px;
			background-color: white;
		}
		.khong_biet_dat_ten_la_gi{
			width: 33%;
			height: 35%;
			float: left;
			vertical-align: center;
			/*background-color: blue;*/
			/*border: 1px solid black;*/
		}
		.khong_biet_dat_ten_la_gi i{
			margin: auto;
		}
	</style>
</head>
<body>	
		<?php include 'header_menu_fixed.php'; ?>
		<br><br><br><br><br><br><br><br>
			<div class="noi_dung">
				<div class="trai">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3850.216375941293!2d105.8468655746835!3d21.002616835179158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe0dd0b2919d48ce9!2zSOG7jWMgdmnhu4duIENOVFQgQsOhY2ggS2hvYQ!5e1!3m2!1svi!2s!4v1608046305572!5m2!1svi!2s" width="876" height="475" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2151.7835269467423!2d105.84258643996174!3d20.99685853512555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac70239e5759%3A0x31206e7d99173c4!2sAn%20Vi%E1%BB%87t%20Hospital!5e0!3m2!1svi!2s!4v1611289072676!5m2!1svi!2s" width="876" height="475" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
				</div>
				<div class="phai">
					<h1 align="center">Thông tin liên hệ</h1>
					<table align="center">
						<tr>
							<td><h4>Địa chỉ: Tòa nhà A17, 17 Tạ Quang Bửu, Bách Khoa, <br>Hai Bà Trưng, Hà Nội</h4></td>
						</tr>
						<tr>
							<td><h4>Số điện thoại: 0987654321</h4></td>
						</tr>
						<tr>
							<td><h4>Email: admin@gmail.com</h4></td>
						</tr>
					</table>
				</div>
			</div>
		<?php include 'footer.php' ?>
</body>
</html>