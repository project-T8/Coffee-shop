
<script>
$(document).ready(function(){
	$("input").focus(function(){$(this).css("border-color","lightblue");});
	$("#txpass2").blur(function(e){
		if ($(this).is(":invalid")) {$(this).css("border","2px solid red");}	
		else{
			var s1=$("#txpass").val();var s2=$("#txpass2").val();
			if(s1==s2){
				$(this).css("border","2px solid green");$(".z-txpass2").text("");
			}
			else{
				$(this).css("border","2px solid red");	$(".z-txpass2").text("Mật khẩu nhập lại bị sai!");
			}
		}
	});
	$("#txemail").blur(function(){
		var em=$(this).val();var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;
		var out=pattern.test(em);
		if(out==true){ $(".z-txemail").text(""); $(this).css("border","2px solid green");}
		else {$(".z-txemail").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});
	$("#txuser").blur(function(){
		var em=$(this).val();var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txuser").text(""); $(this).css("border","2px solid green");}
		else {$(".z-txuser").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});
	$("#txpass").blur(function(){
		var em=$(this).val();var pattern= /^(?=.*[A-Z])(?=.*[!@#$%^&*+=])(?=.*[0-9])(?=.*[a-z]).{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txpass").text( ""); $(this).css("border","2px solid green");}
		else {$(".z-txpass").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});	
	$("#txfiname").blur(function(){
		var em=removeTone($(this).val());var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txfiname").text("" ); $(this).css("border","2px solid green");}
		else {$(".z-txfiname").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});
	$("#txlname").blur(function(){
		var em=removeTone($(this).val());var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txlname").text("" ); $(this).css("border","2px solid green");}
		else {$(".z-txlname").text($(this).attr("title")); $(this).css("border","2px solid red");}
	});	
	$("#txphone").blur(function(){
		var em=$(this).val();
		if(em=="")  $(this).css("border","2px solid green");
		else{
			var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $(this).css("border","2px solid green");}
			else {$(".z-txlname").text($(this).attr("title")); $(this).css("border","2px solid red");}
		}		
	});	
	$("#btclearcolor,#btreset").click(function(){
		$("input").css("border-color","lightblue");$("input").val("");
		$(".z-txlname").text("");$(".z-txfiname").text("");
		$(".z-txpass").text("");$(".z-txpass2").text("");
		$(".z-txemail").text("");$(".z-txuser").text("");
	});
	$("#ckshowpass").click(function(){
		if(document.getElementById("ckshowpass").checked)
			$("#logpassword").prop("type", "text");
		else $("#logpassword").prop("type", "password");
	});
});
</script>
<!--register form-->
<?php
	$userre=$passre=$pass2re=$lastnamere=$finamere=$phonere=$addressre=$emailre="";
	$uerlogin=$passlogin="";
?>
  <div class="modal" id="myForm" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-lg" >
      <div class="modal-content" >
	  	<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
		</div>
        <div class="modal-header" style="background-color:cornsilk;text-align:center;  ">
          <h4 class="modal-title" style="  color:orange; font-weight: bold;">Đăng ký thành viên</h4>
        </div>
        <div class="modal-body">
		<!--     form    it needs to change action later -->
			<form>
			<div class="col-md-8" style="float:left; border-right:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC" >
				<div class="row">
					<div style="width:100%;text-align:center">
						<h4 style="font-weight:600">Thông tin cá nhân</h4>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">	
						<label>Họ và tên lót:</label>				
						<input type="text"  placeholder="Họ và tên lót" class="form-control" id="txlname" name="txlname"  required  title="Sai định dạng tên!" value="<?php echo $lastnamere;?>">
					<span class="z-txlname" style="color: red"> </span>
					</div>
					<div class="form-group col-md-6">
						<label>Tên</label>
						<input type="text" placeholder="Tên của bạn*" class="form-control" id="txfiname" name="txfiname"    title="Sai định dạng tên!" required value="<?php echo $finamere;?>">
						<span class="z-txfiname" style="color: red"> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label>Email</label>
						<input type="text" class="form-control" placeholder="Email của bạn*" id="txemail" name="txemail"   title="Email phải có dấu '@'và dấu '.'" required value="<?php echo 
					$emailre;?>">
						<span class="z-txemail"style="color: red"> </span>
					</div>
					<div class="form-group col-md-6">
						<label>Số điện thoại:</label>
						<input type="text" class="form-control" placeholder="Số điện thoại" name="txphone" id="txphone"  pattern="^0\d{9,10}$" title="10 hoặc 11 chữ số!" value="<?php echo $phonere;?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label>Địa chỉ:</label>
						<input type="text" class="form-control" placeholder="Địa chỉ" name="txaddress" id="txaddress" value="<?php echo $addressre;?>" >
					</div>
				</div>
				
			</div>
			
			<div class="col-md-4" style="float:right;border-bottom:1px solid #CCCCCC">
				<div class="row">
					<div style="width:100%;text-align:center">
						<h4 style="font-weight:600">Thông tin tài khoản</h4>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label>Tên tài khoản:</label>
							<input type="text" placeholder="Tài khoản*" class="form-control" name="txuser" id="txuser"   required title="Có ít nhất 5 ký tự và không có ký tự đặc biệt" value="<?php echo $userre;?>">
							<span class="z-txuser" style="color: red"> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label>Mật khẩu:</label>
						<input type="password" placeholder="Mật khẩu*" class="form-control" name="txpass" id="txpass"   title="Phải có ít nhất 1 ký tự đặc biệt,1 ký tự in hoa,1 chữ số và hơn 5 ký tự" required value="<?php echo $passre;?>" >
						<span class="z-txpass" style="color: red"> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label>Nhập lại mật khẩu:</label>
						<input type="password" placeholder="Nhập lại mật khẩu*" class="form-control" name="txpass2" id="txpass2"  title="Phải giống mật khẩu!" required value="<?php echo $pass2re;?>">
						<span class="z-txpass2" style="color: red"> </span>
					</div>
				</div>
			</div>
			<div class="col-md-8" style="margin-top:10px;margin-left:150px">
				<div class="row">	
					<div class="form-group col-md-6">
						<button type="button" style="background-color:orange;border:none" id="btsubmit" class="btn btn-primary btn-block" >Đăng ký</button>
					</div>
					<div class="form-group col-md-6">
						<button type="reset" style="background-color:orange;border:none" id="btreset" class="btn btn-primary btn-block">Xóa</button>
					</div> 
				</div>
			</div>
			</form> 
        </div>
      </div>    
    </div>
  </div>
<!-- log in form-->
  <div class="modal fade" id="myloginForm" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content" >
       <div class="modal-header" style="background-color:aliceblue">
          <h4 class="modal-title" style=" align-content: center; color:lightgray; font-weight: bold">Người dùng đăng nhập</h4>
        </div>
		<div class="model-body" style="margin: 15px">
			<form method="post">
				<div class="input-group" >
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" id="loguser" name="loguser" tabindex="1" placeholder="Tên tài khoản" required>
				</div><br />
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" class="form-control" id="logpassword" name="logpassword" tabindex="2" placeholder="Mật khẩu" required>
				</div>
				<div>
				<input type="hidden" name="loai" value="1">
				</div>
				<div  style="justify-content: flex-end; display:flex">
      				<input type="checkbox" class="ch" id="ckshowpass" name="example">
      				<label class="custom-control-label" for="switch">Hiện mật khẩu</label>
    			</div>
				<div class="form-group">
					<button id="loginuser" class="btn  btn-block" style="background-color: orange; " tabindex="3">Đăng nhập</button>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a data-toggle="modal" href="#myForm" id="clearcolor"data-dismiss="modal" style="">Đăng ký thành viên</a>
			<button type="button" class="btn"style="background-color: orange" id="clearcolor" data-dismiss="modal">Đóng</button>
		</div>  
      </div>    
    </div>
  </div>
<script>
function removeTone(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    return str;
}
$(document).ready(function(){
	$(document).on('click', '#loginuser', function(){
		var username = $("#loguser").val();
		var pass = $("#logpassword").val();
		var login = "login";
		if(username == "" || pass == "")
		{
			alert("Tài khoản hoặc mật khẩu không được trống");
		}
		else{
		$.ajax({
			url:"solvelogin.php",
			method:"POST",
			data:{login:login,username:username,pass:pass},
			success:function(data)
			{
				if($.trim(data)=="no") 
				{
					alert("Tài khoản hoặc mật khẩu không chính xác");	
				}
				else 
				{
					alert("Đăng nhập thành công");
					$("#myloginForm").hide();
					location.reload();
				
				}
			},
			error:function(){alert("Lỗi không thể đăng nhập!");}
		});
		}
	});
	$("#logout").click(function(){
	 var action = "logout";
	 $.ajax({
	 	url:"solvelogin.php",
		method:"POST",
		data:{action:action},
		success:function(data)
		{
			location.href="index.php";
		}
		});
	});
	$("#account").click(function(){
		window.location.href = "account.php";
	});
	$(document).on('click', '#btsubmit', function(){
		var lastnamere = $("#txlname").val();
		var firstnamere = $("#txfiname").val();
		var emailre = $("#txemail").val();
		var userre = $("#txuser").val();
		var passre = $("#txpass").val();
		var pass2re = $("#txpass2").val();
		var addressre = $("#txaddress").val();
		var phonere = $("#txphone").val();
		var signup = "signup";
		var kt=1;

		var em=removeTone(lastnamere);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txlname").text("" ); $("#txlname").css("border","2px solid green");}
		else {$(".z-txlname").text($("#txlname").attr("title")); $("#txlname").css("border","2px solid red");kt=0;}

		var em=removeTone(firstnamere);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txfiname").text("" ); $("#txfiname").css("border","2px solid green");}
		else {$(".z-txfiname").text($("#txfiname").attr("title")); $("#txfiname").css("border","2px solid red");kt=0;}

		var em=emailre;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;var out=pattern.test(em);
		if(out==true){ $(".z-txemail").text(""); $("#txemail").css("border","2px solid green");}
		else {$(".z-txemail").text($("#txemail").attr("title")); $("#txemail").css("border","2px solid red");kt=0;}

		var em=userre;var pattern= /[A-Za-z0-9\_\-\@\.%^&*+=]{5,}/;var out=pattern.test(em);
		if(out==true){ $(".z-txuser").text(""); $("#txuser").css("border","2px solid green");}
		else {$(".z-txuser").text($("#txuser").attr("title")); $("#txuser").css("border","2px solid red");kt=0;}

		var em=passre;var pattern= /^(?=.*[A-Z])(?=.*[!@#$%^&*+=])(?=.*[0-9])(?=.*[a-z]).{5,}$/;var out=pattern.test(em);
		if(out==true){ $(".z-txpass").text( ""); $("#txpass").css("border","2px solid green");}
		else {$(".z-txpass").text($("#txpass").attr("title")); $("#txpass").css("border","2px solid red");kt=0;}

		if ($("#txpass2").is(":invalid")) {$("#txpass2").css("border","2px solid red");kt=0;}	
		else{
			if(passre==pass2re){$("#txpass2").css("border","2px solid green");$(".z-txpass2").text("");}
			else{$("#txpass2").css("border","2px solid red");	$(".z-txpass2").text("Mật khẩu nhập lại bị sai!");kt=0;}
		}

		var em=phonere;
		if(em=="")  $(this).css("border","2px solid green");
		else{
			var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $(this).css("border","2px solid green");}
			else {$(".z-txlname").text($(this).attr("title")); $(this).css("border","2px solid red");kt=0;}
		}	
		if(kt==1){
		$.ajax({
			url:"solvelogin.php",
			method:"POST",
			data:{signup:signup,username:userre,pass:passre,lastname:lastnamere,firstname:firstnamere,
			email:emailre,address:addressre,phone:phonere},
			success:function(data)
			{
				if($.trim(data) == "no") 
				{
					alert("Tài khoản đã tồn tại");
					$("#myForm").show();	
				}
				else 
				{
					alert("Đăng ký thành công");
					$("#myForm").hide();
					location.reload();
				}
			}
		});
		}
	});
});
</script>
