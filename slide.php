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
			{
				20%{
					background: url(img/slide_1.jpg);
				}
				40%{
					background: url(img/slide_2.jpg);
				}
				80%{
					background: url(img/slide_3.jpg);
				}
				100%{
					background: url(img/slide_4.jpg);
				}
			}
	</style>
</head>
<body>
	<br><br><br><br><br><br><br><br><br><br>
	<div class="slide">
		
	</div>
</body>
</html>