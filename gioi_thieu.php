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
		section{
			position: relative;
			width: 100;
			min-height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			overflow: hidden;
		}
		section video{
			position: absolute;
			top: 0;
			left: 0;
			/*width: 20%;*/
			width: 100%;
			height: 100%;
			object-fit: cover;
			pointer-events: none;
		}
		.noi_dung{
			width: 100%;
			height: 100%;
			position: relative;
			float: left;
		}
		.trai{
			position: absolute;
			width: 30%;
			height: 500px;
			/*background-color: red;*/
		}
		.phai{
			float: right;
			width: 70%;
			height: 500px;
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
		<section>
				<video src="video/gioi_thieu.mp4" autoplay="" muted="" loop=""></video>
				<!-- <video src="video/co_lam_moi_co_an.mp4" autoplay="" muted="" loop=""></video> -->
		</section>
			<div class="noi_dung">
				<div class="trai">
					<img style="height: 500px; width: 100%; background-image:url('img/gioi_thieu.jpg'); background-position: center center; background-size: cover;"> 
				</div>
				<div class="phai">
					<h1 align="center">Giới Thiệu</h1>
					<h3 align="center">
					Chào mừng bạn đến với ngôi nhà SpaceSneaker! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Sneaker, và đang không ngừng phát triển lớn mạnh.</h3>
					<div class="khong_biet_dat_ten_la_gi">
						<div align="center">
							<h2>Miễn phí giao hàng</h2>
						</div>
						<div align="center">
							<i class="fas fa-shipping-fast fa-5x"></i>
						</div>
					</div>
					<div class="khong_biet_dat_ten_la_gi">
						<div align="center">
							<h2>Đổi trả trong vòng 7 ngày</h2>
						</div>
						<div align="center">
							<i class="fas fa-undo fa-5x"></i>
						</div>
					</div>
					<div class="khong_biet_dat_ten_la_gi">
						<div align="center">
							<h2>Sản phẩm mới 100%</h2>
						</div>
						<div align="center">
							<i class="fas fa-certificate fa-5x"></i>
						</div>
					</div>
					<div class="khong_biet_dat_ten_la_gi">
						<div align="center">
							<h2>Thanh toán đa dạng</h2>
						</div>
						<div align="center">
							<i class="fas fa-credit-card fa-5x"></i>
						</div>
					</div>
					<div class="khong_biet_dat_ten_la_gi">
						<div align="center">
							<h2>Hàng chính hãng</h2>
						</div>
						<div align="center">
							<i class="fas fa-shield-alt fa-5x"></i>
						</div>
					</div>
					<div class="khong_biet_dat_ten_la_gi">
						<div align="center">
							<h2>Chăm sóc khách hàng</h2>
						</div>
						<div align="center">
							<i class="fas fa-comments fa-5x"></i>
						</div>
					</div>
				</div>
			</div>
		<?php include 'footer.php' ?>
		<?php include 'on_top.php' ?>
		<script type="text/javascript">
			let video = document.querySelector('video');
			window.addEventListener('scroll', function(){
				let value = 1 + window.scrollY/-600;
				video.style.opacity = value;
			})
		</script>
</body>
</html>