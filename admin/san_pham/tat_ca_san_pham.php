<?php include '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>
<body>
	<div class="admin">
		<?php include '../chung/menu_admin.php'; ?>
		<?php include '../chung/header_admin.php'; ?>
		<div class="noi_dung">
			<?php 
            $connect = mysqli_connect('localhost','root','','1_do_an');
                mysqli_set_charset($connect,'utf8');
            $tim_kiem = '';
            if (isset($_GET['tim_kiem'])) 
                {
                    $tim_kiem = $_GET['tim_kiem'];
                }
            $sql = "select * from san_pham where san_pham.ten like '%$tim_kiem%' ";
            $result = mysqli_query($connect, $sql);
            $thu_muc_anh = '../../img/';

            // lấy tất cả sản phẩm
            $sql = "select san_pham.*, loai_san_pham.loai_san_pham , trang_thai_san_pham.trang_thai_san_pham from san_pham join loai_san_pham on loai_san_pham.ma = san_pham.loai join trang_thai_san_pham on trang_thai_san_pham.ma = san_pham.trang_thai
				where san_pham.ten like '%$tim_kiem%' order by ma desc ";
            // $sql = "select * from san_pham where san_pham.ten like '%$tim_kiem%' ";
            $result = mysqli_query($connect, $sql);
            // tổng số ản phẩm đang có
            $tong_so_san_pham = mysqli_num_rows($result);
            $so_san_pham_1_trang = 7;
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
			<h1 align="center">Tất cả sản phẩm</h1>
		 <table align="center" class="table">
			<tr>
				<th>Tên sản phẩm</th>
				<th>Loại sản phẩm</th>
				<th>Mô tả</th>
				<th>Giá bán</th>
				<th>Hình ảnh sản phẩm</th>
				<th>Trạng thái</th>
				<th>Sửa</th>
				<!-- <th>Xóa</th> -->
			</tr>
			<?php foreach ($result as $each) { ?>
			 			<tr>
			 				<td width="170">
							 	<?php echo $each['ten'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['loai_san_pham']?>
			 				</td>
			 				<td width="500">
			 					<?php echo $each['mo_ta']?>
			 				</td>
			 				<td>
			 					<?php echo number_format($each['gia']) ?>
			 				</td>
			 				<td align="center">
			 					<img height="60" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			 				</td>
			 				<td align="center">
			 					<?php echo $each['trang_thai_san_pham']?>
			 				</td>
			 				<td>
			 					<a href="chinh_sua_san_pham.php?ma= <?php echo $each['ma'] ?>">Sửa</a>
			 				</td>
			 				<!-- <td>
			 					<a href="xoa.php?ma= <?php echo $each['ma'] ?>">Xóa</a>
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
</body>
</html>