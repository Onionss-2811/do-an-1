<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<style type="text/css">
	.content_new{
		width: 100%;
		padding: 10px;
		margin: auto;
		display: flex;
		justify-content: center;
	}
	.content_new div{
		width: 230px;
		height: 260px;
		margin: 0px 5px;
		transition: 0.5s;

	}
	.content_new div:hover{
		background-color: white;
		transform: scale(1.1);
		box-shadow: 0px 8px 16px 0px black;
	}
	.a{
		margin: auto;
		text-decoration: none;
	}
	.button{
		border-radius: 30px;
		height: 20px; 
		background-color: black;
		color: white; 
		border-color: black;
	}
	.button:hover{
		display: block;
		background-color: white;
		color: black;
	}
</style>
<?php 
	$thu_muc_anh= 'img/';
	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');
	$sql = "select * from san_pham where trang_thai = 1 ORDER BY ma desc limit 5";
	$result = mysqli_query($connect, $sql);
 ?>
<div class="content_new">
	<?php  foreach ($result as $each): ?>
		<div align="center" >
			<a style="text-decoration: none; color: black;" href="san_pham_chi_tiet.php?ma=<?php echo $each['ma'] ?>">
				<img style="height: 120px; width: 100%; background-image:url('<?php echo $thu_muc_anh . $each['anh'] ?>'); background-position: center center; background-size: cover;"> 
				<h4 style="text-align: center; height: 36px;">
					<?php echo $each['ten'] ?>
				</h4>
				<?php if ($each['trang_thai']==2) { ?>
					<p style="text-align: center; color: red;">
						Ngừng kinh doanh
					</p>	
				<?php } else if ($each['trang_thai']==3) { ?>
					<p style="text-align: center; color: red;">
						Sắp có
					</p>
				<?php } else { ?>
					<p style="text-align: center; color: red;">
						<?php echo number_format( $each['gia'] )?>VNĐ
					</p>
				<?php } ?>
			</a>
			<?php if (isset($_SESSION['ma'])){ ?>
				<?php if ($each['trang_thai']==2) { ?>

				<?php } else if ($each['trang_thai']==3) { ?>
				
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
	<?php mysqli_close($connect); ?>	
	<!-- <script type="text/javascript">
		function alert() {	
		Swal.fire({
		  text: 'Sản phẩm đã được thêm vào giỏ hàng',
		  icon: 'success',
		  confirmButtonText: 'Ok'
		})
		}
	</script> -->
</div>