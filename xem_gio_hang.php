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
		.table_gio_hang{
		
			width: 80%;
			margin: auto;
			text-align: center;
		}
		.button_thanh_toan{
			border-radius: 30px; 
			border-color: black;
			background-color: black; 
			color: white;  
			width: 150px; 
			height: 40px;
		}
		.button_thanh_toan:hover{
			border-radius: 30px; 
			background-color: white;
			color: black;
		}
		.table_gio_hang th{
			background-color: silver
		}
		.table_gio_hang tr:nth-child(odd)
			{
				background-color: #e3d5d5;
			}
		.button_xoa{
			border-radius:15px;
			background-color: silver;
		}
		.button_xoa a{
			text-decoration: none;
			color: red;
		}
		.button_xoa:hover{
			background-color: red;
		}
		.button_xoa:hover a{
			color: white;
		}
		/*Thông tin người nhận*/
		*{
			  margin: 0;
			  padding: 0;
			  outline: none;
			  box-sizing: border-box;
			}
			body{
			 
			}
			.show-btn{
			  background: black;
			  padding: 10px 20px;
			  font-size: 16px;
			  font-weight: 500;
			  color: white;
			  cursor: pointer;
			  border-radius: 30px;
			}
			.show-btn:hover{
				background:#220000;
			}
			.show-btn, .container{
			  position: absolute;
			  /*top: 50%;*/
			  /*left: 50%;*/
			  transform: translate(-50%, -50%);
			}

			input[type="checkbox"]{
			  display: none;
			}
			.container{
			  display: none;
			  background: #EEEEEE;
			  width: 410px;
			  padding: 30px;
			  box-shadow: 0px 8px 16px 0px black;
			}
			#show:checked ~ .container{
			  display: block;
			  top: 50%;
			  left: 50%;
			  transform: translate(-50%, -34%);
			}
			.container .close-btn{
			  position: absolute;
			  right: 20px;
			  top: 15px;
			  font-size: 18px;
			  cursor: pointer;
			}
			.container .close-btn:hover{
			  color: #DD0000;
			}
			.container .text{
			  font-size: 35px;
			  font-weight: 600;
			  text-align: center;
			}
			.container form{
			  margin-top: -20px;
			}
			.container form .data{
			  height: 45px;
			  width: 100%;
			  margin: 40px 0;
			}
			form .data label{
			  font-size: 18px;
			}
			form .data input{
			  height: 100%;
			  width: 100%;
			  padding-left: 10px;
			  font-size: 17px;
			  border: 1px solid silver;
			}
			form .data input:focus{
			  border-color: #222222;
			  border-bottom-width: 2px;
			}
			form .forgot-pass{
			  margin-top: -8px;
			}
			form .forgot-pass a{
			  color: #3498db;
			  text-decoration: none;
			}
			form .forgot-pass a:hover{
			  text-decoration: underline;
			}
			form .btn{
			  margin: 30px 0;
			  height: 45px;
			  width: 100%;
			  position: relative;
			  overflow: hidden;
			}
			form .btn .inner{
			  height: 100%;
			  width: 300%;
			  position: absolute;
			  left: -100%;
			  z-index: -1;
			  background: -webkit-linear-gradient(right, #adb7b8, #201e21, #adb7b8, #201e21);
			  transition: all 0.4s;
			}
			form .btn:hover .inner{
			  left: 0;
			}
			form .btn button{
			  height: 100%;
			  width: 100%;
			  background: none;
			  border: none;
			  color: #fff;
			  font-size: 18px;
			  font-weight: 500;
			  text-transform: uppercase;
			  letter-spacing: 1px;
			  cursor: pointer;
			}
			form .signup-link{
			  text-align: center;
			}
			form .signup-link a{
			  color: #3498db;
			  text-decoration: none;
			}
			form .signup-link a:hover{
			  text-decoration: underline;
			}
			.span_error
			{
				color: red;
			}
	</style>
</head>
<body>
	<?php include 'header_menu_fixed.php'; ?>
	<br><br>
	<?php 
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8'); 

		if (!empty($_SESSION['ma'])) {

			if (!empty($_SESSION['gio_hang'])) {

			$thu_muc_anh = 'img/';

			$tong=0;
		?>
		<br><br><br><br><br><br><br>
		<table class="table_gio_hang">
			<tr>
				<th>Tên sản phẩm</th>
				<th>Hình ảnh</th>
				<th>Số lượng</th>
				<th>Giá bán</th>
				<th>Tổng</th>
				<th>Xóa</th>
			</tr>
			<?php foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong): ?>
				<?php 
					$sql = "select * from san_pham where ma = '$ma_san_pham'";
					$result = mysqli_query($connect,$sql);
					$each = mysqli_fetch_array($result);
				?>
				<tr>
					<td>
						<?php echo $each['ten'] ?>
					</td>
					<td>
						<img height="70" src=" <?php echo $thu_muc_anh . $each['anh'] ?> ">
					</td>
					<td>
					<a href="tang_giam_san_pham_trong_gio_hang.php?ma=<?php echo $ma_san_pham ?>&kieu=tru" style="text-decoration: none;"><button>-</button></a>
						<?php echo $so_luong ?>
					<a href="tang_giam_san_pham_trong_gio_hang.php?ma=<?php echo $ma_san_pham ?>&kieu=cong" style="text-decoration: none;"><button >+</button></a>
					</td>
					<td>
						<?php echo number_format( $each['gia'] )?>VNĐ
					</td>
					<td> 	
						<?php echo number_format( $each['gia'] * $so_luong) ?>VNĐ
						<?php $tong += $each['gia'] * $so_luong; ?>
					</td>
					<td>
						<button class="button_xoa" >
							<a onclick="return confirm('Bạn muốn xoá sản phẩm này?')" href="xoa_san_pham_trong_gio_hang.php?ma=<?php echo $ma_san_pham ?>">Xóa</a>
						</button>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<button class="button_xoa" onclick="xoa_gio_hang()">
			<a id="xoa_gio_hang">
				Xóa  giỏ hàng
			</a>
		</button>
		<h3 style="text-align: right; color: red;">Tổng tiền: <?php echo number_format( $tong) ?>VNĐ </h3>
	<?php } else { ?>
		<br><br><br><br><br><br><br><br>
		<h2 style="text-align: center;">Bạn chưa thêm sản phẩm nào vào giỏ hàng</h2>
	<?php } ?>
<?php } else { ?>
	<br><br><br><br><br><br><br><br>
	<h2 style="text-align: center;">Vui lòng đăng nhập để xem giỏ hàng</h2>
<?php } ?>
	<?php if(isset($_SESSION['gio_hang'])): ?>
		<?php 
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8');	
		$ma = $_SESSION['ma'];
		$sql_nguoi_nhan ="select * from khach_hang where ma= '$ma'";
		$result_nguoi_nhan = mysqli_query($connect,$sql_nguoi_nhan);
		$each_nguoi_nhan = mysqli_fetch_array($result_nguoi_nhan);
		?>
		<br><br>
		<div align="center" class="thanh_toan">
			<div class="center">
      		<input type="checkbox" id="show">
      		<label for="show" class="show-btn">Mua ngay</label>
      		<div class="container">
	        	<label for="show" class="close-btn fas fa-times" title="close"></label>
	        	<?php if(isset($_GET['error'])) { ?>
					<style type="text/css">
						.container{
							display: block;
							 top: 60%;
			  				 left: 50%;
			 				 transform: translate(-50%, -50%);
						}
					</style>
				<?php } ?>
	        	<div class="text">Thông tin người nhận</div>
				<form action="xu_ly_hoa_don.php" method="POST">
	          		<div class="data">
	            		<label style="float: left;">Tên người nhận</label>
	            		<input type="text" name="ten_nguoi_nhan" value ="<?php echo $each_nguoi_nhan['ten'] ?> " required>
	            		<span id="error_ten" class="span_error"></span>
	          		</div>
					<div class="data">
	            		<label style="float: left;">SĐT người nhận</label>
	            		<input type="text" name="sdt_nguoi_nhan" value ="<?php echo $each_nguoi_nhan['sdt'] ?> " required>
	            		<span id="error_sdt" class="span_error"></span>
	          		</div>
					<div class="data">
	            		<label style="float: left;">Địa chỉ người nhận</label>
	            		<input type="text" name="dia_chi_nguoi_nhan" value ="<?php echo $each_nguoi_nhan['dia_chi'] ?> " required>
	            		<span id="error_dia_chi" class="span_error"></span>
	          		</div>
	          		<?php if(isset($_GET['error'])) { ?>
						<p style="color: red; text-align: center; ">
							<?php echo $_GET['error'] ?>
						</p>
					<?php } ?>
					<div class="btn">
	            		<div class="inner"></div>
						<button type="submit" onclick="return ok()">Đặt hàng</button>
	          		</div>
				</form>
			</div>
		</div>
		</div>
	<?php endif ?>
	<br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php' ?>
	<script>
		// function myFunction() {
		// 	var x = confirm("Bạn muốn xóa sản phẩm này?");
		// 		if (x == true) {
		// 		  document.getElementById("xoa_san_pham_trong_gio_hang").href = "
		// 		  //don't delete
		// 		}
		// }
		function xoa_gio_hang() {
			var x = confirm("Thao tác này của bạn sẽ xóa toàn bộ giỏ hàng. Tiếp tục ?");
				if (x == true) {
				  document.getElementById("xoa_gio_hang").href = "xoa_gio_hang.php?ma=<?php echo $ma_san_pham ?>";
				} else {
				  //don't delete
				}
		}
		function ok() 
			{
				var check_error = false;
				// ten
				var ten = document.getElementById('ten').value;
				var ten_regex=/^[A-Za-z ]{2,}$/;
				if(ten_regex.test(ten))
				{
					document.getElementById('error_ten').innerHTML='';
				} else
					{
						document.getElementById('error_ten').innerHTML='Tên không được để trống và không bao gồm kí tự đặc biệt ';
						check_error = true;
					}
				// số điện thoại
				var sdt = document.getElementById('sdt').value;
				var sdt_regex=/^[0-9 ]{10,}$/;
				if(sdt_regex.test(sdt))
				{
					document.getElementById('error_sdt').innerHTML='';
				} else
					{
						document.getElementById('error_sdt').innerHTML='Vui lòng nhập số điện thoại hợp lệ ';
						check_error = true;
					}
				// địa chỉ
				var dia_chi = document.getElementById('dia_chi').value;
				var dia_chi_regex=/^[A-Za-z ]{2,}$/;
				if(dia_chi_regex.test(dia_chi))
				{
					document.getElementById('error_dia_chi').innerHTML='';
				} else
					{
						document.getElementById('error_dia_chi').innerHTML='Địa chỉ không được để trống và không bao gồm kí tự đặc biệt ';
						check_error = true;
					}

				// check return
				if (check_error) {
					return false;
				}
			}
	</script>
</body>
</html>