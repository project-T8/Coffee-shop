<?php 
session_start();
if(empty($_SESSION['ad_user'])){
  header('Location: ../../adminlogin/adminlogin.php');
}
else{ 
?>
 <?php
     require("connect.php");
	 $sotin1trang=4;
	 if (isset($_GET['trang']))
     {
	 	 $trang=$_GET['trang'];  // trang đang xem
		 settype($trang,"int");
	 }
	 else {$trang=1;}// ko có biến trang để get thì mặc định là trang 1
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin-Quản lý khách hàng
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS -->
 
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->

<style>
input[type=text], input[type=password]
{
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: none;
    box-sizing: border-box;
    font-size:16px;
}
.content_form_popup
{
    padding: 20px 20px 20px 20px;
}
#form_popup{
overflow:auto!important;
}
#form_popup input{
	border:none;
}
.modal-content
{
    background-color: #fefefe;
    margin: 2% 0 0 15%;
    border: 1px solid #888;
    width: 5	0%;
}
.dsach td {
  font-weight: 500;
}
#myModal input{
	border:none;
}
table thead th{font-weight:500!important; color:purple}
table tbody tr td{font-weight:400}
</style>
    <!--<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>-->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
	
        $(document).ready(function()
        {
          // XÓA
            
            //   SỬA
           //$(document).on('click','a[data-role=update]',function()
           //$('.sua').click(function()
           $(document).on('click','a[data-role=update]',function()
           {
           });
            // TÌM KIẾM
            //$("#btnSearch").click(function()
            $('.timkiem').keyup(function()
            {
                var txt= $('.timkiem').val();
                $.post('timkiem.php',{tukhoa:txt},function(data) 
                {
                  $('.dsach').html(data);
                });
            });   
           
        })
    </script>
</head>

<body >
    <?php
       if($_SERVER["REQUEST_METHOD"] == "POST")
       {
          if ($_POST['ho'] == NULL or $_POST['ten'] == NULL or $_POST['taikhoan'] == NULL or $_POST['email'] == NULL or $_POST['dienthoai'] == NULL or $_POST['diachi'] == NULL)
          {
              echo '<script language="javascript">';
              echo 'alert("Vui lòng điền đầy đủ thông tin"); ';
			  echo '$("#form_popup").modal("show")';
              echo '</script>';
          }
          else
          {		$id = "";
		  		$sql = "SELECT * FROM customer";
		  		$result = mysqli_query($con,$sql);
              	$number=mysqli_num_rows($result)+1;
				if($number<10) $id="KH000".$number;
				else if($number<100) $id="KH00".$number;
				else if($number<1000) $id="KH0".$number;
				else if($number<10000) $id="KH".$number;
                 $ho = $_POST['ho'];
                 $ten = $_POST['ten'];
                 $user = $_POST['taikhoan'];
                 $pass = $_POST['matkhau'];
                 $email = $_POST['email'];
                 $dt = $_POST['dienthoai'];
                 $dchi =$_POST['diachi'];
				 $kt=1;
                 if(isset($_POST['chophep']))$clock ='0';
                 else $clock ='1';
				 while($row = mysqli_fetch_array($result))
				 {
				 	if($user == $row['username']){
					$kt=0;}
				 }
				 if($kt==1){
                 $insert = "INSERT INTO customer (id_cus, lastname, firstname, username, password, email, phone, address, clocked) 
                    VALUES ('$id', '$ho', '$ten', '$user', '$pass', '$email', '$dt', '$dchi', '$clock')";
					if (mysqli_query($con, $insert))
                 	{
                     echo '<script language="javascript">';
                     echo 'alert("Thêm dữ liệu thành công")';
                     echo '</script>';
                 	}
                 else echo "Error: " . $sql . "<br>" . mysqli_error($con);
				 }
				 else
				 {
				 	 echo '<script language="javascript">';
                     echo 'alert("Tên tài khoản đã tồn tại!")';
                     echo '</script>';
				 }
                 
          }
       }
    ?>
  
<div class="wrapper ">
   	<?php include("include/slidebar.php");?>
   	<?php include("include/mainpanel.php"); ?>
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
                  			<h4 class="card-title ">Danh sách khách hàng</h4>
                		</div>
                		<div class="card-body">
                  			<div class="table-responsive" id="pagination_customer">    <!--tiêu đề bảng-->
				  			</div>     
                		</div>
            		</div>	
					 <?php   
        if($_SESSION['ad_role']=='admin')
			     echo '<button mat-raised-button class="btn btn-primary" data-toggle="modal" data-target="#form_popup">Thêm</button>';
        ?>	
        		</div>
			</div>
		</div>
	</div>
     <?php include("include/footer.php"); ?>
	   <!--FORM THÊM KHÁCH HÀNG-->
	<div id="form_popup" class="modal" role="dialog" >
		<div class="modal-dialog" role="document">
			<form class="modal-content animate" method="POST">
        		<div class="imgcontainer">
            		<button type="button" class="close" data-dismiss="modal">&times;</button>
            		<p class="card-category"style="text-align:center;color:purple;">Thêm Khách Hàng</p>
        		</div>
        		<div class="content_form_popup">
            		<div class="form-group">
                		<label >ID</label>
                		<input type="id" class="form-control" name="id" disabled="disabled" >
            		</div>
            		<div class="form-group">
                		<label >Họ</label>
               			<input type="ho" class="form-control" name="ho" >
            		</div>
            		<div class="form-group">
                		<label >Tên</label>
                		<input type="ten" class="form-control" name="ten" >
            		</div>
            		<div class="form-group">
                		<label>Tài khoản</label>
                		<input type="taikhoan" class="form-control" name="taikhoan" >
            		</div>
            		<div class="form-group">
                		<label>Mật khẩu</label>
               			<input type="password" style="margin:0;" class="form-control" name="matkhau" >
            		</div>
            		<div class="form-group">
                		<label for="email">Email</label>
                		<input type="email" class="form-control" name="email" >
            		</div>
            		<div class="form-group">
                		<label >Điện thoại</label>
                		<input type="dienthoai" class="form-control" name="dienthoai" >
            		</div>
            		<div class="form-group">
                		<label>Địa chỉ</label>
                		<input type="diachi" class="form-control" name="diachi" >
            		</div>
            		<div class="form-group">
                		<label>Tình trạng</label>
                		<div class="form-check">
                    		<label class="form-check-label" style="padding-right:50px">
                        	<input class="form-check-input" type="checkbox" name="chophep" value="0"/>
                        		Cho phép
                        	<span class="form-check-sign">
                        		<span class="check"></span>
                    		</span>
                   	 		</label>
                    		<label class="form-check-label">
                        		<input class="form-check-input" type="checkbox" name="khoa" value="1" />
                        		Khóa
                        	<span class="form-check-sign">
                       			<span class="check"></span>
							</span>
							</label>
                		</div>
					</div>
            		<button type="submit" id="btn" class="btn btn-primary">Submit</button>
        		</div>
     		</form>
		</div>
	</div>
	 <!--FORM SỬA-->
            <!-- Trigger the modal with a button -->
            <!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" >
    <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
	   			<p class="card-category"style="text-align:center;color:purple;">Sửa Khách Hàng</p>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>  
      		</div>
      		<div class="modal-body" id="id_customer">
      		</div>
      		<div class="modal-body" id="lname_customer" >
      		</div>
        	<div class="modal-body" id="fname_customer"> 
        	</div>
        	<div class="modal-body" id="user_customer">
        	</div>
        	<div class="modal-body" id="pass_customer"> 
          	</div>
        	<div class="modal-body" id="email_customer">
        	</div>
        	<div class="modal-body" id="phone_customer">
        	</div>
        	<div class="modal-body" id="address_customer">
        	</div>
        	<div class="modal-body">
        		<label>Tình trạng: <span id="status"></span></label>
            	<div class="form-check">
					<label style="cursor:pointer">
                  		<input type="radio" name="status" checked="checked" value="0"/>
                  		Cho phép
					</label>
					<label style="cursor:pointer">
                  		<input  type="radio" name="status" value="1" />
                  		Khóa
					</label>
            	</div>
        	</div>
        	<button type="submit" id="btn" class="btn btn-primary edit">Sửa</button>
    	</div>
  	</div>
</div>
</div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/form_popup.js"></script>
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

function fetch_customer(a)
	{
		var cus_id = a.id;
		$.ajax({
			url:"action/fetch_customer.php",
			method:"GET",
			data:{"cus_id":cus_id},
			success:function(data){
				var customer = JSON.parse(data);
				if(customer.clocked == 0)
				{
					$("#status").text("Cho phép");
				}
				else
				{
					$("#status").text("Khóa");
				}
				$('#id_customer').html('<label>ID:</label><input type="hidden" class="form-control" id="cus_id" value="'+customer.id_cus+'"><span style="margin-left:10px">'+customer.id_cus+'</span>');
				$("#lname_customer").html('<label >Họ</label><input type="ho" class="form-control"  id="cus_lname"  value="'+customer.lastname+'" title="Sai định dạng tên!" required> <span class="z-txlname" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>');
				$("#fname_customer").html('<label >Tên</label><input type="ten" class="form-control" id="cus_fname" value="'+customer.firstname+'" title="Sai định dạng tên!" required><span class="z-txfiname" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>');
				$("#user_customer").html('<label>Tài khoản</label><input type="taikhoan" class="form-control" id="cus_username" value="'+customer.username+'" disabled />');
				$("#pass_customer").html(' <label>Mật khẩu</label><input type="matkhau" class="form-control" id="cus_pass" value="'+customer.password+'" title="Ít nhất 5 ký tự" required><span class="z-txpass" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>');
				$("#email_customer").html(' <label for="email">Email</label><input type="email" class="form-control" id="cus_email" value="'+customer.email+'" title="Chưa đúng định dạng Email(phải có @ và .)" required ><span class="z-txemail" style="color: white; background-color: red; border:1px;border-radius: 6px;"> </span>');
				$("#phone_customer").html(' <label >Điện thoại</label><input type="dienthoai" class="form-control" id="cus_phone" value="'+customer.phone+'" required title="10 hoặc 11 chữ số!"><span class="z-txphname" style="color:white;background-color:red;border:1px;border-radius:6px;"></span>');
				$("#address_customer").html(' <label>Địa chỉ</label><input type="diachi" class="form-control" id="cus_address" value="'+customer.address+'">');
			},
			error:function(){alert("failed");}
		});
	}
$(document).ready(function(){
pagination_customer(1);
function pagination_customer(page,value)
{
	var value;
	$.ajax({
		url:"include/pagination_customer.php",
		method:"POST",
		data:{page:page,value:value},
		success:function(data){
			$("#pagination_customer").html(data);
			
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
		pagination_customer(page,value);
	});
	$(document).on('keyup','.search',function(){
		var value = $(".search").val();
		var page;
		$.ajax({
			url:"include/pagination_customer.php",
			method:"POST",
			data:{page:page,value:value},
			success:function(data)
			{
				$("#pagination_customer").html(data);
				$("#"+page+"").removeClass("btn-link");
				$("#"+page+"").addClass("btn-primary");
			}
		});
	});	
		$('.xoa').click(function()
            {
                var cus_id = $(this).attr("id");
                var check= confirm("Bạn có chắc muốn xóa?");
                if(check==true)
                {
                    $.ajax
                    ({
                        url: "xoa_kh.php",
                        method:"GET",
                        data: {cus_id:cus_id},
                        success: function(){
                            window.location.reload();
                                           },
                        error: function () {
                            alert("xoa k thanh cong");
                        }
                    });
                }
            });
	
	$(document).on('click','.edit',function(){
		var cus_id = $('#cus_id').val();
		var cus_lname = $('#cus_lname').val();
		var cus_fname = $('#cus_fname').val();
		var cus_user = $('#cus_username').val();
		var cus_pass = $('#cus_pass').val();
		var cus_email = $('#cus_email').val();
		var cus_add = $('#cus_address ').val();
		var cus_phone = $('#cus_phone').val();
		var status = $('input[name="status"]:checked').val();
		var kt=1;
		var action= "edit"; 
			var em=removeTone(cus_lname);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txlname").text("" ); $("#cus_lname").css("border","2px solid green");}
			else {$(".z-txlname").text($("#cus_lname").attr("title")); $("#cus_lname").css("border","2px solid red");kt=0;}

			var em=removeTone(cus_fname);var pattern= /^([A-Z][a-z]*\s*)+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txfiname").text("" ); $("#cus_fname").css("border","2px solid green");}
			else {$(".z-txfiname").text($("#cus_fname").attr("title")); $("#cus_fname").css("border","2px solid red");kt=0;}
	
			var em=cus_email;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;var out=pattern.test(em);
			if(out==true){ $(".z-txemail").text(""); $("#cus_email").css("border","2px solid green");}
			else {$(".z-txemail").text($("#cus_email").attr("title")); $("#cus_email").css("border","2px solid red");kt=0;}

			var em=cus_pass;var pattern= /^[a-zA-Z0-9]{5,}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txpass").text( ""); $("#cus_pass").css("border","2px solid green");}
			else {$(".z-txpass").text($("#cus_pass").attr("title")); $("#cus_pass").css("border","2px solid red");kt=0;}

			var em=cus_phone;var pattern=/^0\d{9,10}$/;var out=pattern.test(em);
			if(out==true){ $(".z-txphname").text("" ); $(this).css("border","2px solid green");}
			else {$(".z-txphname").text($(this).attr("title")); $(this).css("border","2px solid red");kt=0;}	
			if(kt==1){
				$.ajax({
					url:"action/xuly_customer.php",
					method:"POST",
					data:{cus_id:cus_id,cus_lname:cus_lname,cus_fname:cus_fname,cus_pass:cus_pass,cus_email:cus_email,cus_phone:cus_phone,cus_add:cus_add,action:action,status:status},
					success:function(data)
					{
							alert("Sửa thành công");
							window.location.reload();
					}
					});
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