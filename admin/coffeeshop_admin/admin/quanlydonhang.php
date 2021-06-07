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
    Admin-Quản lý đơn hàng
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="../assets/css/bootstrap.css" />
  <!-- CSS Just for demo purpose, don't include it in your project -->

    <!--<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>-->
    <script src="./jquery-3.4.0.min.js"></script>
	<style>
		.header span{
			margin-right:50px;
		}
		table thead th{font-weight:500!important;}
		table tbody tr td{font-weight:500}
	</style>
</head>

<body>
  <div class="wrapper ">
    <?php include("include/slidebar.php") ?>
    <?php include("include/mainpanel.php") ?>
	     <div class="navbar-form">
              <div class="input-group no-border">
                <input type="text" id="data" size="50px" class="form-control search" placeholder="Tìm kiếm...">
              </div>
       </div>
	<?php include("include/account.php") ?>
	<div class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="card">
    					<div class="card-header card-header-primary">
    						<h4 class="card-title ">Danh sách đơn hàng</h4>
    					</div>
                		<div class="card-body">
                			<div class="table-responsive" id="pagination_data">
							</div>
            			</div>
         			</div>
			  <!--them xoa sua-->
			  					
      			</div>
    		</div>
 		</div>
 	</div>
</div>                 
   <?php include("include/footer.php"); ?>
 <!-- The Modal -->
  <div class="modal fade" id="bill_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" >
          <h4 class="modal-title"  style="font-weight:bold; text-align:center; width:100%;color:purple;" >Chi tiết đơn hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="header" style="margin-top:15px" id="first">
		    </div>
			<div style="margin-top:20px" id="second">
		   </div>
		   <div style="margin-top:10px" class="method" id="third">
		   		
		   </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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
  <!--  Google Maps Plugin    -->  <!-- Chartist JS -->
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
function fetch_bill(a)
{
	bill_id = a.id;
	$.ajax({
		url:"action/fetch_bill.php",
		method:"GET",
		data:{"bill_id":bill_id},
		success:function(data)
		{
			var bill = JSON.parse(data);
			$("#first").html(bill.first);
			$("#second").html(bill.second);
			$("#third").html(bill.third);
		}
	});
}
$(document).ready(function(){
	pagination_bill(1);
	function pagination_bill(page,value)
	{
		$.ajax({
			url:"include/pagination_bill.php",
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
		pagination_bill(page,value);
	});
	$(document).on('click', '.check', function()
	{
		var bill_id = $(this).attr("id");
		var action = "check";
		if(confirm("Xác nhận đơn hàng?")){
		$.ajax({
			url:"action/xuly_bill.php",
			method:"POST",
			data:{action:action,bill_id:bill_id},
			success:function()
			{
				alert("Đã xác nhận đơn hàng!");
				pagination_bill();
			}
		});
		}
	}); 
	$(document).on('keyup','.search',function(){
		var value = $(".search").val();
		var page;
		$.ajax({
			url:"include/pagination_bill.php",
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
<?php }  ?>
