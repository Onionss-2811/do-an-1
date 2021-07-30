<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
}

#navbar {
  padding: 18px;
  background-color: silver;
  position: fixed;
  top: -100px;
  width: 100%;
  display: block;
  transition: top 0.3s;
}

#navbar a {
  transition: 0.2s ease;
  background: silver;
  color: black;
  font-size: 18px;
  text-decoration: none;
  padding: 18px 0;
  margin: 0 20px;
}

#navbar a:hover {
  border-top: 5px solid gray;
  border-bottom: 5px solid gray;
  padding: 6px 0; 
}
</style>
</head>
<body>

<nav id="navbar">
  <a class="link-1" href="index.php">Trang chủ</a>
  <a class="link-1" href="gioi_thieu.php">Giới thiệu</a>
  <a class="link-1" href="index_product.php">Sản phẩm</a>
  <a class="link-1" href="lien_he.php">Liên hệ</a>
  <a class="link-1" href="xem_hoa_don.php">Hoá đơn</a>
</nav>
  
</div>

<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-100px";
  }
}
</script>

</body>
</html>
