<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="Css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		    display: flex;
		    align-items: center;
		    justify-content: center;
		}
		.product{
			width: 100%;
			height: auto;
			/*background-color: green;*/
			position: relative;
			float: left;
		}

		.menu_product{
			position: absolute;
			width: 15%;
			/*background-color: blue;*/
		}
		.menu_product table{
			width: 100%;
			border-right: 1px black solid;
			/*border-top: 1px black solid;*/
			/*border-bottom: 1px black solid;*/
		}
		.menu_product tr{
			height: 45px;
			width: 150px;
		}
		.menu_product a{
			text-decoration: none;
			color: black;
			line-height: 45px;

		}
		.menu_product td:hover{
			background-color: silver;
		}
		.content
			{
				float: right;
				width: 85%;
				/*height: 300px;*/
				/*background-color: red;*/
			}
		.khung{
			width: 81%;
			margin:auto;
			/*background-color: blue;*/
		}
		.div_product
			{
				float: left;
				width: 33%;
				height: 300px;
				/*background-color: yellow;*/
				margin: 1px;
			}
		.div_product:hover
			{
				box-shadow: 0px 8px 16px 0px black;
 				display: block;
				background-color: silver;
			}
		.button{
			margin: auto;
			border-radius: 30px;
			height: 20px; 
			background-color: black;
			color: white; 
			border-color: black 
		}
		.button:hover{
			background-color: white;
			color: black;
		}
	</style>
<body>
	<div class="tong">
		<?php include 'header_menu_fixed.php'; ?>
		<br><br><br><br><br><br><br><br><br><br>
			<?php 
				$thu_muc_anh= 'img/';
				$connect = mysqli_connect('localhost','root','','1_do_an');
				mysqli_set_charset($connect,'utf8');
				$ma_loai_san_pham = $_GET['ma_loai_san_pham'];
				$tim_kiem = '';
				if (isset($_GET['tim_kiem'])) 
					{
						$tim_kiem = $_GET['tim_kiem'];
					}
				// l???y t???t c??? s???n ph???m
				$sql = "select * from san_pham where loai = '$ma_loai_san_pham' ";
				$result = mysqli_query($connect, $sql);
				// t???ng s??? ???n ph???m ??ang c??
				$tong_so_san_pham = mysqli_num_rows($result);
				$so_san_pham_1_trang = 9;
				// t??nh ra s??? trang
				$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);
				$trang_hien_tai  = 1;
				if (isset($_GET['trang']))
					{
						$trang_hien_tai = $_GET['trang'];
					}
				$bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;
				
				// hi???n th??? s???n ph???m tr??n t???ng trang
				$sql = "$sql limit $so_san_pham_1_trang offset $bo_qua";
				$result = mysqli_query($connect, $sql);
			?>
			<?php 
				$connect = mysqli_connect('localhost','root','','1_do_an');
				mysqli_set_charset($connect,'utf8');
				$sql_loai_san_pham = "select * from loai_san_pham";
				$result_loai_san_pham = mysqli_query($connect, $sql_loai_san_pham);
			?>
		<div class="product">
			<div class="menu_product">
				<table align="center">
					<tr align="center" style="background-color: #DDDDDD">
						<td>
							<a href="index_product.php">T???t c??? s???n ph???m</a>
						</td>
					</tr>
					<tr align="center" style="background-color: #DDDDDD">
						<td>
							<a href="index_product_sap_co.php">S???n ph???m s???p c??</a>
						</td>
					</tr>
					<tr align="center" style="background-color: #DDDDDD">
						<td>
							<a href="index_product_gia_tang.php">Gi?? t??ng d???n</a>
						</td>
					</tr>
					<tr align="center" style="background-color: #DDDDDD">
						<td>
							<a href="index_product_gia_giam.php">Gi?? gi???m d???n</a>
						</td>
					</tr>
					<?php foreach ($result_loai_san_pham as $each_loai_san_pham): ?>
						<tr align="center" style="background-color: #DDDDDD;">
							<td>
								<a href="xem_san_pham_theo_loai.php?ma_loai_san_pham=<?php echo $each_loai_san_pham['ma'] ?>"><?php echo $each_loai_san_pham['loai_san_pham'] ?>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
				<div class="content">
					<div class="khung">
					<?php  foreach ($result as $each): ?>
						<div class="div_product">
							<a style="text-decoration: none; color: black;" href="san_pham_chi_tiet.php?ma=<?php echo $each['ma'] ?>">
								<img style="height: 150px; width: 100%; background-image:url('<?php echo $thu_muc_anh . $each['anh'] ?>'); background-position: center center; background-size: cover;"> 
								<h4 style="text-align: center; height: 36px;">
									<?php echo $each['ten'] ?>
								</h4>
								<?php if ($each['trang_thai']==2) { ?>
									<p style="text-align: center; color: red;">
										Ng???ng kinh doanh
									</p>
								<?php } else if ($each['trang_thai']==3) { ?>
									<p style="text-align: center; color: red;">
										S???p c??
									</p>		
								<?php } else{ ?>
									<p style="text-align: center; color: red;">
										<?php echo number_format( $each['gia'] )?>VN??
									</p>
								<?php } ?>
							</a>
							<?php if (isset($_SESSION['ma'])){ ?>
								<?php if ($each['trang_thai']==2) { ?>

								<?php } else if ($each['trang_thai']==3) { ?>
									
								<?php } else{ ?>
									<div align="center">
										<a class="a" href="them_sp_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
											<button class="button" onclick="alert()">
													Th??m v??o gi??? h??ng
											</button>
										</a>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
				<?php endforeach ?>
				</div>
		</div> 
	</div>
			<div align="center" >
					<?php for ($i=1; $i<=$tong_so_trang ; $i++) { ?>
						<div align="center" style="display: inline;">
							<a style="text-decoration:none; color:black;" href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"> 
								<button  class="button" style="margin: 10px;">
									<?php echo $i ?>
								</button>
							</a>
						</div>
					<?php } ?>
			</div>
		<?php include 'footer.php' ?>
		<?php include 'on_top.php' ?>
		<script type="text/javascript">
			function alert() {	
			Swal.fire({
			  text: 'S???n ph???m ???? ???????c th??m v??o gi??? h??ng',
			  icon: 'success',
			  confirmButtonText: 'Ok'
			})
		}
	</script>
</body>
</html>