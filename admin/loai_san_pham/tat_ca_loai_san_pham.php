<?php include '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
	<style type="text/css">
		.table{
			width: 20%;
		}
	</style>
</head>
<body>
	<div class="admin">
		<?php include '../chung/menu_admin.php'; ?>
		<?php include '../chung/header_admin.php'; ?>
		<div class="noi_dung">
			<?php 
            $connect = mysqli_connect('localhost','root','','1_do_an');
                mysqli_set_charset($connect,'utf8');

            // lấy tất cả sản phẩm
            $sql = "select * from loai_san_pham";
            // $sql = "select * from san_pham where san_pham.ten like '%$tim_kiem%' ";
            $result = mysqli_query($connect, $sql);
            // tổng số ản phẩm đang có
            $tong_so_san_pham = mysqli_num_rows($result);
            $so_san_pham_1_trang = 9;
            // tính ra số trang
            $tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);
            $trang_hien_tai  = 1;
            if (isset($_GET['trang']))
              {
                $trang_hien_tai = $_GET['trang'];
              }
            $bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;
            // hiển thị sản phẩm trên từng trang
			$result = mysqli_query($connect, $sql);
            $sql = "$sql limit $so_san_pham_1_trang offset $bo_qua";
            $result = mysqli_query($connect, $sql);
        ?>
			<h1 align="center">Tất cả loại sản phẩm</h1>
		 <table align="center" class="table">
			<tr>
				<th>Tên loại sản phẩm</th>
				<th>Sửa</th>
				<!-- <th>Xóa</th> -->
			</tr>
			<?php foreach ($result as $each) { ?>
			 			<tr align="center">
			 				<td>
							 	<?php echo $each['loai_san_pham'] ?>
			 				</td>
			 				<td>
			 					<a href="chinh_sua_loai_san_pham.php?ma= <?php echo $each['ma'] ?>">Sửa</a>
			 				</td>
			 				<!-- <td>
			 					<button style="border: 0.5px solid red;" onclick="xoa_loai_san_pham()">
			 						<a id="xoa_loai_san_pham" style="text-decoration: none;color: red;" href="">Xóa</a>
			 					</button>
			 				</td> -->
			 			</tr>	
			<?php } ?>
		</table>
		<p style="text-align: center;">
					<?php for ($i=1; $i<=$tong_so_trang ; $i++) { ?>
						<a style="text-decoration:none; color:black; display: inline; " href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"> 
							<button>
								<?php echo $i ?>
							</button> 
						</a>
					<?php } ?>
				</p>
		
		</div>
	</div>
	<script type="text/javascript">
		function xoa_loai_san_pham() {
			var x = confirm("Thao tác này của bạn sẽ xóa toàn bộ giỏ hàng. Tiếp tục ?");
				if (x == true) {
				  document.getElementById("xoa_loai_san_pham").href = "xoa.php?ma= <?php echo $each['ma'] ?>";
				} else {
				  //don't delete
				}
		}
	</script>
</body>
</html>