<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link href="/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}
		.header{
			width: 100%;
			height: 90px;
			background-color: black;
		}
		.header a{
			text-decoration: none;
		}
		/*.header a:hover{
			font-size: 110%;
			transition: 0.5s;
		}*/
		/* Dropdown Button */
		.dropbtn {
		  background-color: black;
		  border: none;
		}
		.dropbtn a{
			color: silver;
			line-height: 20px;
		}

		/* The container <div> - needed to position the dropdown content */
		.dropdown {
		  position: relative;
		  display: inline-block;
		}

		/* Dropdown Content (Hidden by Default) */
		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: black;
		  line-height: 30px;
		  /*min-width: 160px;*/

		  z-index: 1;
		}

		/* Links inside the dropdown */
		.dropdown-content a {
			margin: 0;
			padding: 0;
		  color: silver;
		  background-color: black;
		  text-decoration: none;
		  display: block;
		  line-height: 30px;
		}
		.dropdown-content button {
		  width: 200px;
		  color: silver;
		  background-color: black;
		  border: none;
		  margin: 10px;
		}

		/* Change color of dropdown links on hover */
		.dropdown-content a:hover {background-color: #222222;}

		/* Show the dropdown menu on hover */
		.dropdown:hover .dropdown-content {display: block;}

		/* Change the background color of the dropdown button when the dropdown content is shown */
		.dropdown:hover .dropbtn {background-color: #222222;}
	</style>
</head>
<body>
	<?php 
		if (!empty($_SESSION['ma'])) {
		$connect = mysqli_connect('localhost','root','','1_do_an');
		mysqli_set_charset($connect,'utf8');
		$ma = $_SESSION['ma'];
		$sql = "select * from khach_hang where ma = '$ma'";
		$result = mysqli_query($connect,$sql);
	} else{}
	?>
	<div class="header">
				<table style=" width: 100%;">
					<tr>
						<td width="18%" align="center">
							<?php if (empty($_SESSION)) { ?>
								<a href="sign_in_up/sign_in.php" style="color: silver; a:hover none;">
									Đăng ký / đăng nhập
								</a>
							<?php } else{ ?>
								<div class="dropdown">
								 	<button class="dropbtn">
								 		<?php foreach ($result as $each) { ?>
									 		<a href="trang_ca_nhan.php?ma=<?php echo $each['ma'] ?>">Xin Chào <br> 
									 			<?php echo $each['ten'] ?>
									 		</a>
								 		<?php } ?>
								 	</button>
									<div class="dropdown-content">
								 		<button>
								 			<a href="trang_ca_nhan.php?ma=<?php echo $each['ma'] ?>">Thông tin cá nhân</a>
								 		</button>
								 		<button name="log_out" onclick="myFunction()">
								    		<a id="log_out" href="">Đăng xuất</a>
								    	</button>
								 	</div>
								</div>
							<?php } ?>
						</td>
						<td width="12%" align="center"> 
							<!-- <p style="color: silver; vertical-align: center;" id="time"></p> -->
							<p style="color: silver; vertical-align: center;" id="date"></p>
						</td>
						<!-- <td width="9%"></td> -->
						<td align="center"> <a href="index.php"><img src="img\logo.jpg"></a></td>
						<!-- <td width="1%"></td> -->
						<td width="10%" align="right" style="width: 19%;"> <?php include 'search.php'; ?></td>
						<td width="11%">
							<a href="xem_gio_hang.php" style="color: silver; a:hover none;">
								<i class="fas fa-shopping-cart"></i>
								Giỏ hàng
							</a>
						</td>
					</tr>
				</table>
			</div>
			<script>
				function myFunction() {
				var r = confirm("Bạn muốn đăng xuất ?");
					if (r == true) {
					  document.getElementById("log_out").href = "sign_in_up/xu_li_log_out.php";
					} else {
					  //don't delete
					}
				}
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				if(dd<10) {
				  dd='0'+dd
				} 

				if(mm<10) {
				  mm='0'+mm
				} 

				today = dd+'/'+mm+'/'+yyyy;
				document.getElementById("date").innerHTML = today;
				var myVar=setInterval(function(){myTimer()},1000);

				function myTimer() {
				    var d = new Date();
				    document.getElementById("time").innerHTML = d.toLocaleTimeString();
				}
			</script>
</body>
</html>