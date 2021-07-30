<?php
if (!empty($_POST['email'])){
        if (!empty($_POST['mat_khau_moi'])) {
            if (!empty($_POST['nhap_lai_mat_khau'])) {
            $email = $_POST['email'];
            $mat_khau_moi = $_POST['mat_khau_moi'];
            $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];

            $connect = mysqli_connect('localhost','root','','1_do_an');
            mysqli_set_charset($connect,'utf8');

            $sql = "select * from khach_hang where email = '$email'";
            $result = mysqli_query($connect,$sql);

            $dem = mysqli_num_rows($result);
            
            if($dem == 1)
                {
                    if($mat_khau_moi == $nhap_lai_mat_khau)
                    {
                         $sql = "update khach_hang 
                                set 
                                mat_khau = '$mat_khau_moi' 
                                where 
                                email = '$email'";
                            mysqli_query($connect,$sql);
                            mysqli_close($connect);
                        header("location:sign_in_up.php");
                    } else
                        {
                            header("location:quen_mat_khau.php?error= *Mật khẩu mới và nhập lại mật khẩu không trùng nhau");
                        }
                } else
                    {
                        header("location:quen_mat_khau.php?error= *email bạn nhập không tồn tại");
                }
            }else { 
                header("location:quen_mat_khau.php?error= *nhập lại mật khẩu không được để trống");
            }
        } else { 
            header("location:quen_mat_khau.php?error= *mật khẩu không được để trống");
        }
} else { 
    header("location:quen_mat_khau.php?error= *vui lòng nhập đủ thông tin");
}