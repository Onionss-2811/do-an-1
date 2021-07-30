<!DOCTYPE html>
<html>
 	<head>
  		<meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/baff9036a8.js" crossorigin="anonymous"></script>
        <title></title>
		<style type="text/css">
            /* body{
                  background: #f2f2f2;
                } */

                .search {
                  width: 250px;
                  position: relative;
                  display: flex;
                }

                .searchTerm {
                  width: 100%;
                  border: 3px solid black;
                  border-right: none;
                  padding: 5px;
                  height: 20px;
                  border-radius: 5px 0 0 5px;
                  outline: none;
                  color: sliver;
                }

                .searchTerm:focus{
                  color: black;
                }

                .searchButton {
                  width: 40px;
                  height: 36px;
                  border: 1px solid black;
                  background: black;
                  text-align: center;
                  color: #fff;
                  border-radius: 0 5px 5px 0;
                  cursor: pointer;
                  font-size: 20px;
                }
                .wrap{
                  width: 30%;
                  position: absolute;
                 /* top: 50%;*/
                  /*left: 50%;*/
                  transform: translate(-50%, -50%);
                }
        </style>
		
 	</head>
 	<body>
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

            // lấy tất cả sản phẩm
            $sql = "select * from san_pham where san_pham.ten like '%$tim_kiem%' ";
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
            $sql = "$sql limit $so_san_pham_1_trang offset $bo_qua";
            $result = mysqli_query($connect, $sql);
        ?>
        <form action="index.php" method="GET">
      		<div class="wrap">
               <div class="search">
                    <input type="text" name="tim_kiem" class="searchTerm" placeholder="Tìm kiếm..." value="<?php echo $tim_kiem ?>">
                    <button type="submit" class="searchButton">
                      <i class="fa fa-search"></i>
                   </button>
               </div>
            </div>
        </form>
 	</body>
</html>