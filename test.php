<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		ul{
			list-style: none;
			padding: 0;
		}
		ul li ul{
			display: none;
		}
		a{
			color: red;
			text-decoration: none;
		}
		ul li{
			height: 50px;
			width: 200px;
			background: pink;
			border: 1px solid;
			position: relative;
		}
		ul li:hover ul{
			display: block;
			position: absolute;
			top: -1px;
			left: 201px;
		}
	</style>
</head>
<body>
	<ul>
		<li>
			<a href="#">Văn học</a>
			<ul>
				<li>
					<a href="#">Hiện đại</a>
				</li>
				<li>
					<a href="#">Cổ đại</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#">Toán học</a>
		</li>
		<li>
			<a href="#">Khoa học</a>
		</li>
		<li>
			<a href="#">Sinh học</a>
		</li>
	</ul>
</body>
</html>