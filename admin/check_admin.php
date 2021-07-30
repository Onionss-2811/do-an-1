<?php 

session_start();
if (empty($_SESSION['admin']))
	{
		header("location:index.php?error= Vui lòng đăng nhập");
	}