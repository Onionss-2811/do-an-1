<?php
if (!empty($_POST['email'])){
            $email = $_POST['email'];

            $connect = mysqli_connect('localhost','root','','1_do_an');
            mysqli_set_charset($connect,'utf8');

            $sql = "select * from khach_hang where email = '$email'";
            $result = mysqli_query($connect,$sql);

            $dem = mysqli_num_rows($result); 
            if($dem == 1)
                {
                    header("location:xu_li_quen_mat_khau.php?email= <?php echo $each['email'] ?>");
                } else{
                    header("location:quen_mat_khau.php? error= *email bạn nhập không tồn tại");
                }          
} else { 
    header("location:quen_mat_khau.php?error= *email không được để trống");
}