<?php 
session_start();
if(empty($_SESSION['ad_user'])){
  header('Location: ../../adminlogin/adminlogin.php');
}
else{ 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin-Quản lý nhân viên
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <style>
  		 input[type="file"] {
    display: none;
    }
    .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    margin-top: 20px;
    margin-left: 90px;
    cursor: pointer;
	}
	.add-emp .modal-title{color:purple;font-weight:400}
	.add-emp .modal-body label {color:purple;font-weight:400}
	.edit-emp .modal-title{color:purple;font-weight:400}
	.edit-emp .modal-body label {color:purple;font-weight:400}
		table thead th{font-weight:500!important;}
		table tbody tr td{font-weight:500}
	</style>
</head>

<body class="">
  <div class="wrapper ">
   <?php include("include/slidebar.php"); ?>
   <?php include("include/mainpanel.php") ?>
   <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" size="50px" class="form-control search" placeholder="Tìm kiếm...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
       </form>
	<?php include("include/account.php") ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh sách nhân viên</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="pagination_data">
                  </div>
                </div>
				</div>
				<!--them xoa sua-->
        <?php   
        if($_SESSION['ad_role']=='admin')
			     echo '<button mat-raised-button class="btn btn-primary" data-toggle="modal" data-target=".add-emp"">Thêm</button>';
        ?>
              </div>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
      <?php include("include/footer.php"); ?>
	    <!--------Form thêm nhân viên -------->
      <div class="modal fade add-emp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <h4 class="modal-title" style="padding-left: 320px">Thêm nhân viên</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                  <div class="col-md-5" style="float: left">
                    <div style="border:1px solid black;height: 300px;width: 100%" id="image_emp">
                      
                    </div>
                    <label class="custom-file-upload">
                    <input type="file" id="upload-file"/>
                      Tải ảnh lên
                    </label>
				 </div>
                  <div class="col-md-7" style="float: right">
                    	<div class="form-row">
    						<div class="form-group col-md-6">
      							<label>Họ nhân viên:</label>
								<input style="margin-top:10px" id="lastname_emp" type="text"  class="form-control" title="Sai định dạng tên!" required placeholder="Họ nhân viên">
    							<span class="z-txlname" style="color: red"> </span>
							</div>
   						 	<div class="form-group col-md-6 ">
								<label>Tên nhân viên:</label>
      							<input  style="margin-top:10px" id="firstname_emp"  type="text" class="form-control" title="Sai định dạng tên!" required placeholder="Tên nhân viên">
    			 		 		<span class="z-txlname" style="color: red"> </span>
							</div>
  						</div>
						<div class="form-row">
    						<div class="form-group col-md-6">
      							<label>Tài khoản:</label>
								<input style="margin-top:10px" id="user_emp" type="text"  class="form-control" placeholder="Tài khoản" title="Tên tài khoản cần ít nhất 5 ký tự" required>
								<span class="z-txuser" style="color:red"></span>
    						</div>
   						 	<div class="form-group col-md-6 ">
								<label>Mật khẩu:</label>
      							<input  style="margin-top:10px" id="pass_emp"  type="password" class="form-control" placeholder="Mật khẩu" title="Ít nhất 5 ký tự(có thể chứa ký tự đặc biệt)" required>
    			 		 		<span class="z-txpass" style="color: red"> </span>
							</div>
  						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Email:</label>
								<input style="margin-top:10px" id="email_emp" type="text" class="form-control" placeholder="Email" title="Chưa đúng định dạng Email(phải có @ và .)" required />
								<span class="z-txemail" style="color: red"> </span>
							</div>
							<div class="form-group col-md-6">
      							<label>Số điện thoại:</label>
								<input style="margin-top:10px" id="phone_emp" type="text"  class="form-control" placeholder="Số điện thoại" required title="10 hoặc 11 chữ số!"/>
   							 	<span class="z-txphname" style="color: red"></span>
							 </div>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-5">
      							<label>Chức vụ</label>
      								<select class="form-control select_role" name="role">
        								<option value="1" selected>admin</option>
        								<option value="2">Manager</option>								
      								</select>
   							 </div>
						</div>
						<div class="row">
							<button  class="btn btn-primary" id="add_emp">Thêm</button>
						</div>
                  </div>
                </div>
            </div>
        </div>
      </div>
	  <!--------Kết thúc form thêm nhân viên -------->
	  <!--------Form sửa nhân viên -------->
	  <div class="modal fade edit-emp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <h4 class="modal-title" style="padding-left: 320px">Sửa nhân viên</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                  <div class="col-md-5" style="float: left">
                    <div style="border:1px solid black;height: 300px;width: 100%" id="edit_image_emp">
                      
                    </div>
                    <label class="custom-file-upload">
					<input type="hidden" id="edit_id_emp" />
					<input type="hidden" id="edit-img" />
                    <input type="file" id="edit-upload-file"/>
                      Tải ảnh lên
                    </label>
                  </div>
                  <div class="col-md-7" style="float: right">
                    	<div class="form-row">
    						<div class="form-group col-md-6">
      							<label>Họ nhân viên:</label>
								<input style="margin-top:10px" id="edit_lastname_emp" type="text"  class="form-control" title="Sai định dạng tên!" required placeholder="Họ nhân viên">
								<span class="z-txlname" style="color: red"> </span>
    						</div>
   						 	<div class="form-group col-md-6 ">
								<label>Tên nhân viên:</label>
      							<input  style="margin-top:10px" id="edit_firstname_emp"  type="text" class="form-control" title="Sai định dạng tên!" required placeholder="Tên nhân viên">
								<span class="z-txlname" style="color: red"> </span>
    			 		 	</div>
  						</div>
						<div class="form-row">
    						<div class="form-group col-md-6">
      							<label>Tài khoản:</label>
								<input style="margin-top:10px" id="edit_user_emp" type="text"  class="form-control" disabled="disabled" placeholder="Tài khoản">
    						</div>
   						 	<div class="form-group col-md-6 ">
								<label>Mật khẩu:</label>
      							<input  style="margin-top:10px" id="edit_pass_emp"  type="password" class="form-control" placeholder="Mật khẩu" title="Ít nhất 5 ký tự(có thể chứa ký tự đặc biệt)" required>
								<span class="z-txpass" style="color: red"> </span>
    			 		 	</div>
  						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Email:</label>
								<input style="margin-top:10px" id="edit_email_emp" type="text" class="form-control" placeholder="Email"  title="Chưa đúng định dạng Email(phải có @ và .)" required />
								<span class="z-txemail" style="color: red"> </span>
							</div>
							<div class="form-group col-md-6">
      							<label>Số điện thoại:</label>
								<input style="margin-top:10px" id="edit_phone_emp" type="text"  class="form-control" placeholder="Số điện thoại"required title="10 hoặc 11 chữ số!"/>
								<span class="z-txphname" style="color: red"></span>
   							 </div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-5">
      							<label>Chức vụ</label>
      								<select class="form-control edit_select_role" name="role">
        								<option value="1" selected>admin</option>
        								<option value="2">Manager</option>								
      								</select>
   							 </div>
						</div>
						<div class="row">
							<button  class="btn btn-primary" id="edit_emp">Sửa</button>
						</div>
                  </div>
                </div>
            </div>
        </div>
      </div>
	  <!--------Kết thúc form sửa nhân viên -------->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
 <script src="../assets/js/admin.js"></script>
   <script src="../assets/js/removeTone.js"></script>
</body>

</html>
<script>
function fetch_emp(a)
{
	var id_emp = a.id;
	$.ajax({
		url:"action/fetch_emp.php",
		method:"GET",
		data:{"id_emp":id_emp},
		success:function(data){
			var emp = JSON.parse(data);
			$("#edit_image_emp").html('<img width="100%" src="../../../img/employee/'+emp.img+'" height="100%" >');
			$("#edit_phone_emp").val(emp.phone);
			$("#edit_id_emp").val(emp.id_em);
			$("#edit_lastname_emp").val(emp.lastname);
			$("#edit-img").val(emp.img);
			$("#edit_firstname_emp").val(emp.firstname);
			$("#edit_user_emp").val(emp.username);
			$(".edit_select_role").val(emp.id_role);
			$("#edit_pass_emp").val(emp.password);
			$("#edit_email_emp").val(emp.email);
			
		}
	});
}
$(document).ready(function(){
	pagination_employee(1);
	function pagination_employee(page)
	{
		$.ajax({
			url:"include/pagination_employee.php",
			method:"POST",
			data:{page:page},
			success:function(data)
			{
				$('#pagination_data').html(data);
				if(page!=1){
					$(".page_first").removeClass("btn-primary");
					$(".page_first").addClass("btn-link");
					$("#"+page+"").removeClass("btn-link");
					$("#"+page+"").addClass("btn-primary");
				}
				else
				{
					$(".page_first").removeClass("btn-link");
					$(".page_first").addClass("btn-primary");
				}
			}
		});
	}
	$(document).on('click', '.pagination_link', function()
	{
   		 var value = $(".search").val();
		var page = $(this).attr("id");
		pagination_employee(page,value);
	});
	$(document).on('keyup','.search',function(){
		var value = $(".search").val();

		var page;
		$.ajax({
			url:"include/pagination_employee.php",
			method:"POST",
			data:{page:page,value:value},
			success:function(data)
			{
				$("#pagination_data").html(data);
				$("#"+page+"").removeClass("btn-link");
				$("#"+page+"").addClass("btn-primary");
			}
		});
	});	
	$('#edit-upload-file').change(function(){
		var picture = $('#edit-upload-file').val().split('.').pop().toLowerCase();
		var value = $('#edit-upload-file').val().substr(12,);
		if($.inArray(picture, ['gif','png','jpg','jpeg']) == -1) 
		{
				alert('Chỉ upload file ảnh!');
				$('#edit-upload-file').val("");
		}
		else{
				sizee = $("#edit-upload-file")[0].files[0].size; 
				sizee = sizee / 1024; 
				sizee = sizee / 1024; 
 				if (sizee > 10) 
				{
					alert("Dung lượng ảnh vượt giới hạn cho phép!");
					return false;
				}  
				else 
				{
				$("#edit_image_emp").html('<img width="100%" src="../../../img/employee/'+value+'" height="100%" >');
				$("#edit-img").val(value);
				}
		}
    });
  	$('#upload-file').change(function(){
		var picture = $('#upload-file').val().split('.').pop().toLowerCase();
		var value = $('#upload-file').val().substr(12,);
		if($.inArray(picture, ['gif','png','jpg','jpeg']) == -1) 
		{
				alert('Chỉ upload file ảnh!');
				$('#upload-file').val("");
				$("#image_emp").html("");
		}
		else{
				sizee = $("#upload-file")[0].files[0].size; 
				sizee = sizee / 1024; 
				sizee = sizee / 1024; 
 				if (sizee > 10) 
				{
					alert("Dung lượng ảnh vượt giới hạn cho phép!");
					return false;
				}  
				else 
				{
				$("#image_emp").html('<img width="100%" src="../../../img/employee/'+value+'" height="100%" >');
				
				}
		}
    });
	$(document).on('click','#edit_emp',function(){
		var action = "edit_emp";
		var id_emp = $("#edit_id_emp").val();
		var lastname_emp = $("#edit_lastname_emp").val();
		var firstname_emp = $("#edit_firstname_emp").val();
		var user_emp = $("#edit_user_emp").val();
		var img_emp = $('#edit-img').val();
		var pass_emp = $("#edit_pass_emp").val();
		var role_emp = $('.edit_select_role').children('option:selected').val();
		var email_emp =$('#edit_email_emp').val();
		var phone_emp = $('#edit_phone_emp').val();
		var kt = 1;
		var em=removeTone(lastname_emp);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $("#edit_lastname_emp").css("border","2px solid green");}
			else {$(".z-txlname").text($("#edit_lastname_emp").attr("title")); $("#edit_lastname_emp").css("border","2px solid red");kt=0;}

			var em=removeTone(firstname_emp);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txfiname").text("" ); $("#edit_firstname_emp").css("border","2px solid green");}
			else {$(".z-txfiname").text($("#edit_firstname_emp").attr("title")); $("#edit_firstname_emp").css("border","2px solid red");kt=0;}
	
			
			var em=email_emp;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txemail").text(""); $("#edit_email_emp").css("border","2px solid green");}
			else {$(".z-txemail").text($("#edit_email_emp").attr("title")); $("#edit_email_emp").css("border","2px solid red");kt=0;}

			var em=pass_emp;var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txpass").text( ""); $("#edit_pass_emp").css("border","2px solid green");}
			else {$(".z-txpass").text($("#edit_pass_emp").attr("title")); $("#edit_pass_emp").css("border","2px solid red");kt=0;}

			var em=phone_emp;var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txphname").text("" ); $("#edit_phone_emp").css("border","2px solid green");}
			else {$(".z-txphname").text($("#edit_phone_emp").attr("title")); $("#edit_phone_emp").css("border","2px solid red");kt=0;}
			if(kt == 1){
				$.ajax({
					url:"action/xuly_emp.php",
					method:"POST",
					data:{action:action,id_emp:id_emp,lastname_emp:lastname_emp,firstname_emp:firstname_emp,user_emp:user_emp,img_emp:img_emp,pass_emp:pass_emp,role_emp:role_emp,email_emp:email_emp,phone_emp:phone_emp},
					success:function(data)
					{
						alert("Sửa nhân viên thành công!");
						$(".edit-emp").modal('toggle');
						pagination_employee(); 
					}
				});
			}
	});
	$(document).on('click','#add_emp',function(){
		var action = "add_emp";
		var lastname_emp = $("#lastname_emp").val();
		var firstname_emp = $("#firstname_emp").val();
		var user_emp = $("#user_emp").val();
		var img_emp = $('#upload-file').val().substr(12,);
		var pass_emp = $("#pass_emp").val();
		var role_emp = $('.select_role').children('option:selected').val();
		var email_emp =$('#email_emp').val();
		var phone_emp = $('#phone_emp').val();
		var kt = 1;
		
		var em=removeTone(lastname_emp);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $("#lastname_emp").css("border","2px solid green");}
			else {$(".z-txlname").text($("#lastname_emp").attr("title")); $("#lastname_emp").css("border","2px solid red");kt=0;}

			var em=removeTone(firstname_emp);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txfiname").text("" ); $("#firstname_emp").css("border","2px solid green");}
			else {$(".z-txfiname").text($("#firstname_emp").attr("title")); $("#firstname_emp").css("border","2px solid red");kt=0;}
	
			var em=email_emp;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txemail").text(""); $("#email_emp").css("border","2px solid green");}
			else {$(".z-txemail").text($("#email_emp").attr("title")); $("#email_emp").css("border","2px solid red");kt=0;}
			
			var em=user_emp;var pattern= /[A-Za-z0-9\_\-\@\.]{5,}/;var out=pattern.test(em);
			if(out==true){ $(".z-txuser").text(""); $("#user_emp").css("border","2px solid green");}
			else {$(".z-txuser").text($("#user_emp").attr("title")); $("#user_emp").css("border","2px solid red");kt=0;}


			var em=pass_emp;var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txpass").text( ""); $("#pass_emp").css("border","2px solid green");}
			else {$(".z-txpass").text($("#pass_emp").attr("title")); $("#pass_emp").css("border","2px solid red");kt=0;}

			var em=phone_emp;var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txphname").text("" ); $("#phone_emp").css("border","2px solid green");}
			else {$(".z-txphname").text($("#phone_emp").attr("title")); $("#phone_emp").css("border","2px solid red");kt=0;}
			if(kt==1){
				$.ajax({
					url:"action/xuly_emp.php",
					method:"POST",
					data:{action:action,lastname_emp:lastname_emp,firstname_emp:firstname_emp,user_emp:user_emp,img_emp:img_emp,pass_emp:pass_emp,role_emp:role_emp,email_emp:email_emp,phone_emp:phone_emp},
					success:function(data)
					{
						
						alert("Thêm nhân viên thành công!");
						$(".add-emp").modal('toggle');
						pagination_employee();
					}
				});
			}
		
	});
	$(document).on('click','.del_emp',function(){
		var id_emp = $(this).attr("id");
		var check = confirm("Bạn có chắc muốn xóa?");
		if(check==true)
		{
			var action = "del_emp";
			$.ajax({
				url:"action/xuly_emp.php",
				method:"POST",
				data:{action:action,id_emp:id_emp},
				success:function()
				{
					alert("Xóa thành công");
					pagination_employee(); 
				}
			})
		}
	});
	$(document).on('click','#ad_logout',function(){
		var action = "logout";
		$.ajax({
			url:"include/xuly.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				window.location.reload();
			}
		});
	});
});
</script>
<?php } ?>
