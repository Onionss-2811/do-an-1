<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		html {
		  height: 100%;
		}
		body {
		  margin:0;
		  padding:0;
		  font-family: sans-serif;
		  background: linear-gradient(#282b30, #545a61);
		}

		.login-box {
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  width: 400px;
		  padding: 40px;
		  transform: translate(-50%, -50%);
		  background: rgba(0,0,0,.5);
		  box-sizing: border-box;
		  box-shadow: 0 15px 25px rgba(0,0,0,.6);
		  border-radius: 10px;
		}

		.login-box h2 {
		  margin: 0 0 30px;
		  padding: 0;
		  color: #fff;
		  text-align: center;
		}

		.login-box .user-box {
		  position: relative;
		}

		.login-box .user-box input {
		  width: 100%;
		  padding: 10px 0;
		  font-size: 16px;
		  color: #fff;
		  margin-bottom: 30px;
		  border: none;
		  border-bottom: 1px solid #fff;
		  outline: none;
		  background: transparent;
		}
		.login-box .user-box label {
		  position: absolute;
		  top:0;
		  left: 0;
		  padding: 10px 0;
		  font-size: 16px;
		  color: #fff;
		  pointer-events: none;
		  transition: .5s;
		}

		.login-box .user-box input:focus ~ label,
		.login-box .user-box input:valid ~ label {
		  top: -20px;
		  left: 0;
		  color: #87aaab;
		  font-size: 12px;
		}

		.login-box form a {
		  position: relative;
		  display: inline-block;
		  padding: 10px 20px;
		  color: #87aaab;
		  font-size: 16px;
		  text-decoration: none;
		  text-transform: uppercase;
		  overflow: hidden;
		  transition: .5s;
		  margin-top: 40px;
		  letter-spacing: 4px
		}

		.login-box a:hover {
		  background: #87aaab;
		  color: #fff;
		  border-radius: 5px;
		  box-shadow: 0 0 5px #87aaab,
		              0 0 25px #87aaab,
		              0 0 50px #87aaab,
		              0 0 100px #87aaab;
		}

		.login-box a span {
		  position: absolute;
		  display: block;
		}

		.login-box a span:nth-child(1) {
		  top: 0;
		  left: -100%;
		  width: 100%;
		  height: 2px;
		  background: linear-gradient(90deg, transparent, #87aaab);
		  animation: btn-anim1 1s linear infinite;
		}

		@keyframes btn-anim1 {
		  0% {
		    left: -100%;
		  }
		  50%,100% {
		    left: 100%;
		  }
		}

		.login-box a span:nth-child(2) {
		  top: -100%;
		  right: 0;
		  width: 2px;
		  height: 100%;
		  background: linear-gradient(180deg, transparent, #87aaab);
		  animation: btn-anim2 1s linear infinite;
		  animation-delay: .25s
		}

		@keyframes btn-anim2 {
		  0% {
		    top: -100%;
		  }
		  50%,100% {
		    top: 100%;
		  }
		}

		.login-box a span:nth-child(3) {
		  bottom: 0;
		  right: -100%;
		  width: 100%;
		  height: 2px;
		  background: linear-gradient(270deg, transparent, #87aaab);
		  animation: btn-anim3 1s linear infinite;
		  animation-delay: .5s
		}

		@keyframes btn-anim3 {
		  0% {
		    right: -100%;
		  }
		  50%,100% {
		    right: 100%;
		  }
		}

		.login-box a span:nth-child(4) {
		  bottom: -100%;
		  left: 0;
		  width: 2px;
		  height: 100%;
		  background: linear-gradient(360deg, transparent, #87aaab);
		  animation: btn-anim4 1s linear infinite;
		  animation-delay: .75s
		}

		@keyframes btn-anim4 {
		  0% {
		    bottom: -100%;
		  }
		  50%,100% {
		    bottom: 100%;
		  }
		}
		.span_error
		{
			color: red;
		}
	</style>
</head>
<body>
	<div class="login-box">
	  <h2>Đăng nhập</h2>
	  <form method="post" action="xu_li_log_in.php" >
	    <div class="user-box">
	      <input type="email" id="email" name="email" required >
	      <label>Email</label>
	      <span id="error_email" class="span_error"></span>
	    </div>
	    <div class="user-box">
	      <input type="password" id="mat_khau" name="mat_khau" required >
	      <label>Mật khẩu</label>
	      <span id="error_mat_khau" class="span_error"></span>
	    </div>
	    <?php if(isset($_GET['error'])) { ?>
						<p style="color: red; text-align: center; ">
							<?php echo $_GET['error'] ?>
						</p>
				<?php } ?>
	    <div align="center">
	    	<a href="#">
		      <span></span>
		      <span></span>
		      <span></span>
		      <span></span>
		      <button style="background: none; border: none; color: white;" onclick="return ok()">Đăng nhập</button>
		    </a>
		</div>
	  </form>
	  <br><br>
	  <div align="center" style="border-top: 1px solid #87aaab; color: white">
	  	<p>Bạn chưa có tài khoản? <a href="sign_up.php" style="color: white">Đăng ký ngay!!</a></p>
	  </div>
	</div>
	  <script type="text/javascript">
			function ok() 
			{
				var check_error = false;
				// mật khẩu
				var mat_khau = document.getElementById('mat_khau').value;
				var mat_khau_regex=/^[A-Za-z0-9]{8,}$/;
				if(mat_khau_regex.test(mat_khau))
				{
					document.getElementById('error_mat_khau').innerHTML='';
				} else
					{
						document.getElementById('error_mat_khau').innerHTML='*mật khẩu phải bao gồm 8 kí tự trở lên không phân biệt viết hoa và không chứa kí tự đặc biệt ';
						check_error = true;
					}
				// email
				var email = document.getElementById('email').value;
				var email_regex=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if(email_regex.test(email))
				{
					document.getElementById('error_email').innerHTML='';
				} else
					{
						document.getElementById('error_email').innerHTML='*vui lòng nhập đúng định dạng email ';
						check_error = true;
					}
					if (check_error) {
						return false;
					}
			}
		</script>
</body>
</html>