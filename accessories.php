<style type="text/css">
	.accessories
		{
			width: 80%;
			height:350px;
			margin: auto;
			/*background-color: red;*/
		}
	.accessories div
		{
			margin: 1px;
			width: 33%;
			height: 320px;
			float: left;
			/*border: 1px solid;*/
		}
	.accessories div:hover
		{
			box-shadow: 0px 8px 16px 0px black;
			display: block;
			background-color: silver;

		}
	.button{
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
<?php 
	$thu_muc_anh= 'img/';
	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');
	$sql = "select * from phu_kien limit 3";
	$result = mysqli_query($connect, $sql);
 ?>
 <br><br>
 <h2 style="text-align: center;">Phụ kiện bán chạy</h2>
<div class="accessories">
	<?php  foreach ($result as $each): ?>
		<div align="center">
			<a style="text-decoration: none; color: black;" href="phu_kien_chi_tiet.php?ma=<?php echo $each['ma'] ?>">
				<img style="height: 180px; width: 100%; background-image:url('<?php echo $thu_muc_anh . $each['anh'] ?>'); background-position: center center; background-size: cover;"> 
				<h4 style="text-align: center; height: 36px;">
					<?php echo $each['ten'] ?>
				</h4>
				<p style="text-align: center; color: red;">
					<?php echo $each['gia'] ?>
				</p>
			</a>
			<?php if (isset($_SESSION['ma'])){ ?>
				<a style="text-decoration: none;" href="them_sp_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
					<button class="button" onclick="alert('Thêm sản phẩm vào giỏ hàng')">
							Thêm vào giỏ hàng
					</button>
				</a>
			<?php } ?>
		</div>
	<?php endforeach ?>
</div>