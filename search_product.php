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
			position: relative;
			float: left;
		}

		.menu_product{
			position: absolute;
			width: 15%;
			/*background-color: aqua;*/
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
				/*float: right;*/
				/*background-color: blue;*/
				width: 85%;
				margin: auto;
			}
		.content div
			{
				float: right;
				margin: 1px;
				width: 25%;
				height: 300px;
				transition: 0.3s;
			}
		.content div:hover
			{
				box-shadow: 0px 8px 16px 0px black;
 				display: block;
				background-color: silver;
			}
		.button{
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
				$tim_kiem = '';
				if (isset($_GET['tim_kiem'])) 
					{
						$tim_kiem = $_GET['tim_kiem'];
					}
				// lấy tất cả sản phẩm
				$sql = "select * from san_pham where san_pham.ten like '%$tim_kiem%' ORDER BY ma desc ";

				$result = mysqli_query($connect, $sql);
				// tổng số ản phẩm đang có
				$tong_so_san_pham = mysqli_num_rows($result);
				$so_san_pham_1_trang = 6 ;
				// tính ra số trang
				$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);
				$trang_hien_tai  = 1;
				if (isset($_GET['trang']))
					{
						$trang_hien_tai = $_GET['trang'];
					}
				$bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;
				
				// hiển thị sản phẩm trên từng trang
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
					<tr align="center" style="background-color: silver"><td><h3>Sắp xếp</h3></td></tr>
					<tr align="center" style="background-color: #DDDDDD"><td><a href="index_product.php">Tất cả sản phẩm</a></td></tr>
					<?php foreach ($result_loai_san_pham as $each_loai_san_pham): ?>
						<tr align="center" style="background-color: #DDDDDD;">
							<td>
								<a href="xem_san_pham_theo_loai.php?ma_loai_san_pham=<?php echo $each_loai_san_pham['ma'] ?>"><?php echo $each_loai_san_pham['loai_san_pham'] ?></a>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
				<div class="content">
					<?php  foreach ($result as $each): ?>
						<div align="center">
							<a style="text-decoration: none; color: black;" href="san_pham_chi_tiet.php?ma=<?php echo $each['ma'] ?>">
								<img style="height: 150px; width: 100%; background-image:url('<?php echo $thu_muc_anh . $each['anh'] ?>'); background-position: center center; background-size: cover;"> 
								<h4 style="text-align: center; height: 36px;">
									<?php echo $each['ten'] ?>
								</h4>
								<?php if ($each['trang_thai']==2) { ?>
									<p style="text-align: center; color: red;">
										Ngừng kinh doanh
									</p>	
								<?php } else{ ?>
									<p style="text-align: center; color: red;">
										<?php echo number_format( $each['gia'] )?>VNĐ
									</p>
								<?php } ?>
							</a>
							<?php if (isset($_SESSION['ma'])){ ?>
								<?php if ($each['trang_thai']==2) { ?>
									
								<?php } else{ ?>
									<a class="a" href="them_sp_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
										<button class="button" onclick="alert()">
												Thêm vào giỏ hàng
										</button>
									</a>
								<?php } ?>
							<?php } ?>
						</div>
				<?php endforeach ?>
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
			  text: 'Sản phẩm đã được thêm vào giỏ hàng',
			  icon: 'success',
			  confirmButtonText: 'Ok'
			})
		}
	</script>
</body>
</html>
