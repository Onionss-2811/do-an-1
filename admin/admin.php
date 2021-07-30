<?php include 'check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="admin">
		<div class="trai">
			<div>
				<h3>Chào mừng trở lại <br><?php echo $_SESSION['ten'] ?></h3>
			</div>
			<div style="border-bottom: none;">
				<ul>
					<?php if ($_SESSION['cap_do']!=3){ ?>
						<li>
							<a href="nhan_vien/tat_ca_nhan_vien.php">Nhân viên</a>
								<ul>
									<li>
										<a href="nhan_vien/them_nhan_vien.php">Thêm nhân viên</a>
									</li>
									<li>
										<a href="nhan_vien/tat_ca_nhan_vien.php">Tất cả nhân viên</a>
									</li>
								</ul>
						</li>
					<?php } ?>
					<li>
						<a href="san_pham/tat_ca_san_pham.php">Sản phẩm</a>
							<ul>
								<li>
									<a href="san_pham/them_san_pham.php">Thêm sản phẩm</a>
								</li>
								<li>
									<a href="san_pham/tat_ca_san_pham.php">Tất cả sản phẩm</a>
								</li>
							</ul>
					</li>
					<li>
						<a href="loai_san_pham/tat_ca_loai_san_pham.php">Loại sản phẩm</a>
							<ul>
								<li>
									<a href="loai_san_pham/them_loai_san_pham.php">Thêm loại sản phẩm</a>
								</li>
								<li>
									<a href="loai_san_pham/tat_ca_loai_san_pham.php">Tất cả loại sản phẩm</a>
								</li>
							</ul>
					</li>
					<!-- <li>
						<a href="phu_kien/tat_ca_phu_kien.php">Phụ kiện</a>
							<ul>
								<li>
									<a href="phu_kien/them_phu_kien.php">Thêm phụ kiện</a>
								</li>
								<li>
									<a href="phu_kien/tat_ca_phu_kien.php">Tất cả phụ kiện</a>
								</li>
							</ul>
					</li> -->
					<li>
						<a href="khach_hang/tat_ca_khach_hang.php">Khách hàng</a>
							<ul>
								<li>
									<a href="khach_hang/them_khach_hang.php">Thêm khách hàng</a>
								</li>
								<li>
									<a href="khach_hang/tat_ca_khach_hang.php">Tất cả khách hàng</a>
								</li>
							</ul>
					</li>
					<li>
						<a href="hoa_don/index.php">Hóa đơn</a>
					</li>
					<!-- <li>
						<a href="">Chỉnh sửa giao diện</a>
							<ul>
								<li>
									<a href="">Slide sản phẩm</a>
								</li>
								<li>
									<a href="">Slide quảng cáo</a>
								</li>
							</ul>
					</li> -->
					<li>
						<button style="border: none; background-color: silver;" name="log_out" onclick="myFunction()">
							<a id="log_out" href="">Đăng xuất</a>	
						</button>
					</li>
				</ul>
			</div>
		</div>
		<div class="phai">
			<table width="100%">
				<table width="100%">
					<tr>
						<td align="center" style="width: 95%;">
							<img src="../img/logo_nho.jpg">
						</td>
						<td> <?php include 'search_admin_index.php'; ?></td>
					</tr>
				</table>
			</table>
		</div>
		<div class="noi_dung">
			<img style="height: 800px; width: 100%; background-image:url(../img/img_admin.jpg); background-position: center center; background-size: cover;">
		</div>
	</div>
	<script>
				function myFunction() {
				var r = confirm("Bạn muốn đăng xuất ?");
					if (r == true) {
					  document.getElementById("log_out").href = "chung/log_out.php";
					} else {
					  //don't delete
					}
				}
			</script>
</body>
</html>