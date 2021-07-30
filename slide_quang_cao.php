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
		.slide_quang_cao
			{
				margin: auto;
				width: 1250px;
				height: 250px;
				/*background-color: red;*/
				background: url(img/slide_8.jpg);
				animation: slide_quang_cao 20s infinite;
			}
		@keyframes slide_quang_cao
			{
				20%{
					background: url(img/slide_8.jpg);
				}
				40%{
					background: url(img/slide_6.jpg);
				}
				80%{
					background: url(img/slide_7.jpg);
				}
				100%{
					background: url(img/slide_8.jpg);
				}
			}
	</style>
</head>
<body>
	<br><br><br><br><br><br><br><br><br><br>
	<div class="slide_quang_cao">
		
	</div>
</body>
</html>