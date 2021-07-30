<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
	<style type="text/css">
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
	</style>
</head>
<body>
	<?php 
	$connect = mysqli_connect('localhost','root','','1_do_an');
	mysqli_set_charset($connect,'utf8');	
	$ma = $_SESSION['ma'];
	$sql ="select * from khach_hang where ma= '$ma'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	?>
	<div class="center">
      		<input type="checkbox" id="show">
      		<label for="show" class="show-btn">Mua ngay</label>
      		<div class="container">
	        	<label for="show" class="close-btn fas fa-times" title="close"></label>
	        	<div class="text">Thông tin người nhận</div>
				<form action="xu_ly_hoa_don.php" method="POST">
	          		<div class="data">
	            		<label style="float: left;">Tên người nhận</label>
	            		<input type="text" name="ten_nguoi_nhan" value ="<?php echo $each['ten'] ?> " required>
	          		</div>
					<div class="data">
	            		<label style="float: left;">SĐT người nhận</label>
	            		<input type="text" name="sdt_nguoi_nhan" value ="<?php echo $each['sdt'] ?> " required>
	          		</div>
					<div class="data">
	            		<label style="float: left;">Địa chỉ người nhận</label>
	            		<input type="text" name="dia_chi_nguoi_nhan" value ="<?php echo $each['dia_chi'] ?> " required>
	          		</div>
					<div class="btn">
	            		<div class="inner"></div>
						<button type="submit" onclick="alert()">Đặt hàng</button>
	          		</div>
				</form>
			</div>
		</div>
<script type="text/javascript">
	function alert() {	
		Swal.fire({
		  text: 'Đặt hàng thành công',
		  icon: 'success',
		  confirmButtonText: 'Ok'
		})
	}
</script>
</body>
</html>