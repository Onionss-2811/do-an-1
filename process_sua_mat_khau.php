<?php
if (!empty($_POST['mat_khau_cu']) && !empty($_POST['mat_khau_moi']) && !empty($_POST['nhap_lai_mat_khau'])){ 

    $ma = $_POST['ma'];
    $mat_khau_cu = $_POST["mat_khau_cu"];
    $mat_khau_moi = $_POST["mat_khau_moi"];
    $nhap_lai_mat_khau = $_POST["nhap_lai_mat_khau"];

    $connect = mysqli_connect('localhost','root','','1_do_an');
    mysqli_set_charset($connect,'utf8');

    $sql = "select * from khach_hang where mat_khau = '$mat_khau_cu'";
    $result = mysqli_query($connect,$sql);

    $dem = mysqli_num_rows($result);
    
    if($dem == 1)
        {
            if ($mat_khau_moi == $nhap_lai_mat_khau)
                {
                    $sql = "update khach_hang 
                        set 
                        mat_khau = '$mat_khau_moi' 
                        where 
                        ma = '$ma'";
                    mysqli_query($connect,$sql);
                    mysqli_close($connect);
                    header("location:trang_ca_nhan.php");
                } else
                    {
                        header("location:sua_mat_khau.php?error= *mật khẩu mới và nhập lại mật khẩu không trùng nhau");
                    }
        } else
            {
                header("location:sua_mat_khau.php?error= *mật khẩu cũ không chính xác");
            }
        }else {
            header("location:sua_mat_khau.php?error= *vui lòng nhập đầy đủ và mật khẩu cũ, mật khẩu mới và nhập lại mật khẩu");
        }