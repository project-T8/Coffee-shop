<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../adminlogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../adminlogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../adminlogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="../adminlogin/css/main.css">
<!--===============================================================================================-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../adminlogin/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						????ng nh???p					</span>				</div>
				<div class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">T??i kho???n</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Nh???p t??n t??i kho???n">
						<span class="focus-input100"></span>					
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">M???t kh???u</span>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Nh???p m???t kh???u">
						<span class="focus-input100"></span>					
					</div>

					<div class="flex-sb-m w-full p-b-30">
				

						<div>
							<a href="#" class="txt1">
								Qu??n m???t kh???u?							</a>						
						</div>
					</div>
			
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" id="login">
							????ng nh???p						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../adminlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../adminlogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../adminlogin/vendor/bootstrap/js/popper.js"></script>
	<script src="../adminlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../adminlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../adminlogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="../adminlogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../adminlogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../adminlogin/js/main.js"></script>

</body>
</html>
<script>
$(document).ready(function(){
	$(document).on('click','#login',function(){
		var ad_id = $("#username").val();
		var ad_pass =$("#pass").val();
		var action = "ad_login";
		if(ad_id == "" || ad_pass == "")
		{
			alert("T??i kho???n ho???c m???t kh???u tr???ng!");
		}
		else{
		$.ajax({
			url:"xuly.php",
			method:"POST",
			data:{ad_id:ad_id,ad_pass:ad_pass,action:action},
			success:function(data){
				if($.trim(data) == "no")
				{
					alert("T??i kho???n ho???c m???t kh???u b??? sai!");
				}
				else
				{
					alert("????ng nh???p th??nh c??ng");
					window.location.href = "../coffeeshop_admin/admin/index.php";
				}
			},
			error:function(){alert("Kh??ng th??? ????ng nh???p");}
		});
		}
	});
});
</script>