<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	<?php 
		$connect = mysqli_connect('localhost', 'root', '', '1_do_an');
		mysqli_set_charset($connect,'utf-8');
		$sql = "select * from san_pham";
		$result = mysqli_query($connect, $sql);
	?>
	<?php foreach ($result as $each) { ?>
	 	<a href="index_product.php?ma=
	 		<?php echo $each['ma'] ?>">
		 		<div class="product">
				 	<table>
				 		<tr>
				 			<td>
				 				<p>
				 					<?php echo $each['ten'] ?>
								</p>
				 				<p>
				 					<?php echo $each['gia'] ?>
				 				</p>
				 			</td>
				 		</tr>
				 	</table>
				</div>	
	<?php } ?> 	
	<?php mysqli_close($connect); ?>
</body>
</html>