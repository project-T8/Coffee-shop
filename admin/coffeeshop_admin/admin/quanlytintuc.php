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
    Admin-Quản lý tin tức
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
    margin-left: 55px;
    cursor: pointer;
	}
	.add-product .modal-title{color:purple;font-weight:400}
	.add-product .modal-body label {color:purple;font-weight:400}
	.edit-product .modal-title{color:purple;font-weight:400}
	.edit-product .modal-body label {color:purple;font-weight:400}
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
              </div>
       </form>
	<?php include("include/account.php") ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Danh sách tin tức</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="pagination_data">
                  </div>
                </div>
				</div>
				<!--them xoa sua-->
        <?php   
        if($_SESSION['ad_role']=='manager')
			     echo '<button mat-raised-button class="btn btn-primary" data-toggle="modal" data-target=".add-product"">Thêm</button>';
        ?>
              </div>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
      <?php include("include/footer.php"); ?>
	  <!--------Form thêm sản phẩm -------->
      <div class="modal fade add-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <h4 class="modal-title" style="padding-left: 320px">Thêm tin tức</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                  <div class="col-md-5" style="float: left">
                    <div style="border:1px solid black;height: 300px;width: 100%" id="image_product">
                      
                    </div>
                    <label class="custom-file-upload">
                    <input type="file" id="upload-file"/>
                      Tải ảnh lên
                    </label>
                  </div>
                  <div class="col-md-7" style="float: right">
                    	<div class="form-row">
    						<div class="form-group col-md-6 ">
      							<label>Tiêu đề:</label>
								<input style="margin-top:10px" id="name_pro" type="text" class="form-control" placeholder="Tiêu đề" required>
    						</div>
  						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
    							<label>Thông tin chi tiết</label>
    								<textarea class="form-control" id="info_pro" rows="6"></textarea>
  							</div>
						</div>
						<div class="row">
							<button  class="btn btn-primary" id="add_pro">Thêm</button>
						</div>
                  </div>
                </div>
            </div>
        </div>
      </div>
	  <!--------Kết thúc form thêm sản phẩm -------->
	  <!--------Form sửa sản phẩm -------->
	  <div class="modal fade edit-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <h4 class="modal-title" style="padding-left: 320px">Sửa tin tức</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                  <div class="col-md-5" style="float: left">
                    <div style="border:1px solid black;height: 300px;width: 100%" id="edit_image_product">
                      
                    </div>
                    <label class="custom-file-upload">
					<input type="hidden" id="edit_id_pro" />
					<input type="hidden" id="edit-img" />
                    <input type="file" id="edit-upload-file"/>
                      Tải ảnh lên
                    </label>
                  </div>
                  <div class="col-md-7" style="float: right">
                    	<div class="form-row">
    						<div class="form-group col-md-6">
      							<label>Tiêu đề:</label>
								<input style="margin-top:10px" id="edit_name_pro" type="text"  class="form-control" required placeholder="Tiêu đề">
    						</div>
  						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
    							<label>Thông tin chi tiết</label>
    								<textarea class="form-control" id="edit_info_pro" rows="6"></textarea>
  							</div>
						</div>
						<div class="row">
							<button  class="btn btn-primary" id="edit_pro">Sửa</button>
						</div>
                  </div>
                </div>
            </div>
        </div>
      </div>
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
</body>

</html>
<script>
function fetch_product(a)
{
	var id_pro = a.id;
	$.ajax({
		url:"action/fetch_new.php",
		method:"GET",
		data:{"id_pro":id_pro},
		success:function(data){
			var product = JSON.parse(data);
			$("#edit_image_product").html('<img width="100%" src="../../../img/product/'+ product.image +'" height="100%" >');
			$("#edit_id_pro").val(product.id_pro);
			$("#edit_name_pro").val(product.name);
			$("#edit-img").val(product.image);
			$("#edit_info_pro").val(product.info);
		}
	});
}
$(document).ready(function(){
	pagination_product(1);
	function pagination_product(page,value)
	{
		$.ajax({
			url:"include/pagination_tintuc.php",
			method:"POST",
			data:{page:page,value:value},
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
		pagination_product(page,value);
	});
	$(document).on('keyup','.search',function(){
		var value = $(".search").val();
		var page
		$.ajax({
			url:"include/pagination_tintuc.php",
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
				$("#edit_image_product").html('<img width="100%" src="../../../img/product/'+value+'" height="100%" >');
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
				$("#image_product").html("");
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
				$("#image_product").html('<img width="100%" src="../../../img/product/'+value+'" height="100%" >');
				
				}
		}
    });
	$(document).on('click','#edit_pro',function(){
		var action = "edit_product";
		var id_pro = $("#edit_id_pro").val();
		var name_pro = $("#edit_name_pro").val();
		var img_pro = $('#edit-img').val();
		var info_pro = $("#edit_info_pro").val();
		if(name_pro == "" || img_pro == "" || info_pro == "")
		{
			alert("Các dữ liệu không được trống!");
		}
		else{
				$.ajax({
					url:"action/xuly_product.php",
					method:"POST",
					data:{action:action,name_pro:name_pro,img_pro:img_pro,info_pro:info_pro},
					success:function(data)
					{
						alert("Sửa sản phẩm thành công!");
						$(".edit-product").modal('toggle');
						var page =$(".pagination_link").attr("id");
						var value_search = $(".search").val();
						pagination_product(page,value_search); 
					}
				});
			
		}
	});
	$(document).on('click','#add_pro',function(){
		var action = "add_product";
		var name_pro = $("#name_pro").val();
		var img_pro = $('#upload-file').val().substr(12,);
		var info_pro = $("#info_pro").val();
		if(name_pro == "" || img_pro == "" || info_pro == "")
		{
			alert("Các dữ liệu không được trống!");
		}
		else{
				$.ajax({
					url:"action/xuly_new.php",
					method:"POST",
					data:{action:action,name_pro:name_pro,img_pro:img_pro,info_pro:info_pro},
					success:function(data)
					{
						alert("Thêm sản phẩm thành công!");
						$(".add-product").modal('toggle');
						pagination_product();
					}
				});
			
		}
	});
	$(document).on('click','.del_pro',function(){
		var id_pro = $(this).attr("id");
		var check = confirm("Bạn có chắc muốn xóa?");
		if(check==true)
		{
			var action = "del_pro";
			$.ajax({
				url:"action/xuly_new.php",
				method:"POST",
				data:{action:action,id_pro:id_pro},
				success:function()
				{
					alert("Xóa thành công");
					var page =$(".pagination_link").attr("id");
					var value_search = $(".search").val();
					pagination_product(page,value_search); 
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