<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
	function alert() {	
		Swal.fire({
		  text: 'Sản phẩm đã được thêm vào giỏ hàng',
		  icon: 'success',
		  confirmButtonText: 'Ok'
		})
		}
	window.location.href = 'index.php';
</script>
<?php 

session_start();

$ma_san_pham = $_GET['ma'];

if (isset($_SESSION['gio_hang'][$ma_san_pham])) {
	$_SESSION['gio_hang'][$ma_san_pham]++;
	
} else{
	$_SESSION['gio_hang'][$ma_san_pham] = 1;
}

// header("location:index.php");
?>

