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
			$thu_muc_anh= '../../img/';
			$connect = mysqli_connect('localhost','root','','1_do_an');
			mysqli_set_charset($connect,'utf8');

			$sql = "select phu_kien.*, loai_phu_kien.loai_phu_kien 
			from phu_kien 
			join loai_phu_kien on loai_phu_kien.ma = phu_kien.loai";

			$result = mysqli_query($connect,$sql);
			?>
			<br><br>
		 <table align="center" class="table">
			<tr>
				<th>Tên phụ kiện</th>
				<th>Loại phụ kiện</th>
				<th>Giá bán</th>
				<th>Hình ảnh phụ kiện</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
			<?php foreach ($result as $each) { ?>
			 			<tr>
			 				<td>
							 	<?php echo $each['ten'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['loai_phu_kien'] ?>
			 				</td>
			 				<td>
			 					<?php echo $each['gia'] ?>
			 				</td>
			 				<td>
			 					<img height="60" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			 				</td>
			 				<td>
			 					<a href="chinh_sua_phu_kien.php?ma= <?php echo $each['ma'] ?>">Sửa</a>
			 				</td>
			 				<td>
			 					<a href="xoa.php?ma= <?php echo $each['ma'] ?>">Xóa</a>
			 				</td>
			 			</tr>	
			<?php } ?>
		</table>
		</div>
	</div>
</body>
</html>