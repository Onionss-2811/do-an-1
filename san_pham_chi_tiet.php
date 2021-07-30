<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}
		.tong{
			width: 100%;
			height: 550px;
			/*background-color: red;*/
		}
		.chi_tiet_sp{
			position: relative;
			width: 100%;
			height: 400px;
			/*background-color: red;*/
			float: left;
		}
		.img{
			position: absolute;
			width: 45%;
			height: 400px;
			transition-duration: 0.3s;
			margin: 0.5px;
			/*float: left;*/
		}
		.noi_dung{
			/*position: absolute;*/
			width: 55%;
			height: 100%;
			/*background-color: green;*/
			float: right;
		}
		.noi_dung button{
			border-radius: 30px;
			background-color: black; 
			border-color: black; 
			color: white; 
			width: 156px; 
			height: 40px;
		}
		.noi_dung button:hover{
			background-color: white;
			color: black;
		}
		.thong_tin_sp{
			width: 100%;
			height: 200px;
		}
		.sp_khac{
			width: 100%;
			height: 650px;
		}
		.img:hover{
			/*transform: scale(1.2);*/
		}
	</style>
</head>
<body>
	<?php include 'header_menu_fixed.php'; ?>
	<div class="tong">
		<br><br><br><br><br><br><br><br><br>
		<?php 
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8'); 
			$ma = $_GET['ma'];
			$sql = "select * from san_pham where ma = '$ma'";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);

			$thu_muc_anh = 'img/';
		?>
		<div class="chi_tiet_sp">
			<?php foreach ($result as $each): ?>
				<div class="img">
					<img style="height: 400px; width: 100%; background-image:url('<?php echo $thu_muc_anh . $each['anh'] ?>'); background-position: center center; background-size: cover;"> 	
				</div>
				<div class="noi_dung">
					<h2 >
						<?php echo $each['ten'] ?>
					</h2>
					<h1 style="color: red;">
						<?php if ($each['trang_thai']==2) { ?>
							Ngừng kinh doanh
						<?php } else if ($each['trang_thai']==3) { ?>
							Sắp có
						<?php } else{ ?>
							<?php echo number_format( $each['gia'] )?>VNĐ
						<?php } ?>
					</h1>

					<!-- <h3>
						Kích Thước(size): 
						<select>
							<option>38</option>
							<option>39</option>
							<option>40</option>
							<option>41</option>
							<option>42</option>
							<option>43</option>
						</select>
					</h3> -->
					<?php if (isset($_SESSION['ma'])){ ?>
						<?php if ($each['trang_thai']==2) { ?>
							
						<?php } else if ($each['trang_thai']==3) { ?>

						<?php } else { ?>
							<a style="text-decoration: none; float: right; color: blue;" href="them_sp_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
								<button onclick="alert()">
										Thêm vào giỏ hàng
								</button>
							</a>
						<?php } ?>
						<?php } else{ ?>
							<a style="text-decoration: none; float: right; color: blue;" href="sign_in_up/sign_in.php">
								<button>
										Đăng nhập để thêm sản phẩm vào giỏ hàng
								</button>
							</a>
					<?php } ?>
					<?php mysqli_close($connect); ?>
				</div>
		</div>
	</div>
	<br>
		<div align="center" class="thong_tin_sp">
			<h2 >Thông tin sản phẩm</h2>
				<h3>
					<?php echo $each['mo_ta'] ?>
				</h3>
		</div>
		<div class="sp_khac">
			<h2  align="center">Các sản phẩm khác</h2>
			<?php include 'content.php' ?>
			<?php include 'footer.php' ?>
			<?php include 'on_top.php' ?>
		</div>
			<?php endforeach ?>	
		<script type="text/javascript">
			function alert() {	
				Swal.fire({
				  text: 'Sản phẩm đã được thêm vào giỏ hàng',
				  icon: 'success',
				  confirmButtonText: 'Ok'
				})
			}
		</script>
</body>
</html>