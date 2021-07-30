<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <style type="text/css">
    body{
      margin: 0;
      padding: 0;
    }
    .slide
      {
        margin: auto;
        width: 1100px;
        height: 500px;
        /*background-color: red;*/
        background: url(img/slide_1.jpg);
        animation: slide 20s infinite;
      }
    @keyframes slide
      <?php 
        $thu_muc_anh= 'img/';
        $connect = mysqli_connect('localhost','root','','1_do_an');
        mysqli_set_charset($connect,'utf8');
        $sql = "select * from slide";
        $result = mysqli_query($connect, $sql);
      ?>
      {
        <?php  foreach ($result as $each): ?>
          20%{
            background: url(<?php echo $thu_muc_anh . $each['anh_1'] ?>);
          }
          40%{
            background: url(<?php echo $thu_muc_anh . $each['anh_2'] ?>);
          }
          80%{
            background: url(<?php echo $thu_muc_anh . $each['anh_3'] ?>);
          }
          100%{
            background: url(<?php echo $thu_muc_anh . $each['anh_4'] ?>);
          }
        <?php endforeach ?>
      }
  </style>
</head>
<body>
  <br><br><br><br><br><br><br><br><br><br>
  <div class="slide">
    
  </div>
</body>
</html>