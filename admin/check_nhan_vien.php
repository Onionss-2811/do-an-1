<?php 

session_start();
if ($_SESSION['cap_do'] == 3)
	{
		header("location:../index.php?error= Bạn không có quyền truy cập");
	}