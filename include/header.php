	<style>
	#nav-menu-container ul li a:hover{
	color: #FF9933;
	text-decoration:none}
	#nav-menu-container ul li a:focus{
	text-decoration:none;
	}
	.dangnhap a{color:#FFFFFF;}
	.dangnhap a:hover{
	color: #FF9933;
	text-decoration:none;
	}
	.dropdown a{color:#FFFFFF}
	.dropdown{position:relative;}
	.dropdown .dropdown-menu
	{
		display:absolute;
		min-width:150px;
		display:none;
	}
	.dropdown ul .dropdown-menu li{
		display:block !important;
		white-space:nowrap;
		color:#FFFFFF;
	}
	.dropdown ul{
	background-color: #FFFFFF;
	color:black;
	}
	.dropdown a:hover{text-decoration:none;}
	.dropdown a:focus{text-decoration:none;}
	.dropdown ul li{
		padding-left:10px;
		
		font-size:14px;
		color:#FFFFFF;
	}
	.dropdown .dropdown-menu li button{
		position: relative;
		height:35px;
		width:100%;
		color:black;
		background-color:#FFFFFF;
		border:none;
		text-align:center;
	}
	.dropdown .dropdown-menu li:hover{
		background-color:#FF8C55;
	}
	.dropdown .dropdown-menu li {
	text-align:center;
	height:35px;
	width:150px;
	}
	.dropdown .dropdown-menu li button:hover{
	background-color:#FF8C55;
	color:#FFFFFF;	
	}
	.dropdown .dropdown-menu li button:focus{
	border:none;
	}
	@media (max-width:768px){
		.cart{margin-right:30px;}
	}
</style>
<div id="header">			  	
	<div class="container">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<!-- <a href="index.php"><img src="img/logo.png"  alt="" title="" /></a> -->
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<?php
						$url=$_SERVER['PHP_SELF'];
						$index=strpos($url,"index.php");
						$payment=strpos($url,"payment.php");
						$menu=strpos($url,"menu.php");
						$account =strpos($url,"account.php");
				    if($index>0){
				    	// neu la trang index
				    ?>
				    <li class="menu-active"><a href="#header">Trang chủ</a></li>
				    <li><a href="#about">Chuyện cà phê</a></li>
				    <li><a href="#coffee">Coffee</a></li>
				    <li><a href="#review">Đánh giá</a></li>
				    <?php
						}else{ //neu khong phai trang index
				    ?>
				    <li class="menu-active"><a href="<?php echo "./index.php";?>">Trang chủ</a></li>
				    <li><a href="<?php echo "./index.php";?>">Chuyện cà phê</a></li>
				    <li><a href="<?php echo "./menu.php";?>">Coffee</a></li>	
				    <li><a href="<?php echo "./index.php";?>">Đánh giá</a></li>
				    <?php
						}
				    ?>
				</ul>
			</nav><!-- #nav-menu-container -->
			<?php if($index>0 || $menu>0 || $account>0){?>
			<div>
				<a href="#cart_popup" data-toggle="modal">
					<img src="img/cart.png" style="width:20%" />
					<span style="color:#FFFFFF;" id="total-item"></span>
				</a>
			</div>  
			<?php } ?>	
			<?php 
				if(isset($_SESSION['username']))
				{
			?>
					<div class="dropdown">
						<a href="#" id="dropdown"><img src="img/profile.png" width="9%" height="9%"/><span style="padding-left:5px;"><?php echo $_SESSION['myname'] ?></span></a>
							<ul class="dropdown-menu" id="dropdown-menu">
								<li><button id="account">Thông tin cá nhân</button></li>
								
						<!-- trang admin hoac manager -->

						<!-- het trang admin manager -->
							<li><button id="logout">Thoát</button></li>
						</ul>
					</div>
					<script>
					$(document).ready(function(){
						$(document).on('click','#dropdown',function(event){
							event.preventDefault()
							$(this).parent().find('#dropdown-menu').first().toggle(300);
							$(this).parent().siblings().find('#dropdown-menu').hide(300);
							
							$(this).parent().find('#dropdown-menu').mouseleave(function(){
								var thisUI = $(this);
								$('html').click(function(){
									thisUI.hide();
									$('html').unbind('click');
								});
							});
						});
					});
				</script>
			<?php }
				else
				{
			?>
				<div class="dangnhap" style="margin-right:35px">
					<a href="#myloginForm" data-toggle="modal">Đăng nhập</a>
				</div>
				
			<?php
				}
			?>
						
		</div>
	</div>
</div><!-- #header -->
<!-- start banner Area -->
<section class="banner-area" id="home">	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-start">
			<div class="banner-content col-lg-7">
				<h1>
					Bắt đầu ngày mới <br>
					với một ly cà phê				
				</h1>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->	
<!--Cart -->
<div id="cart_popup" class="modal fade"  tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg modal-dialog-centered " role="document"> 
		<div class="modal-content">
				<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
				</div>
                <div class="modal-header">
                    <h4 class="modal-title" style=" font-weight:bold">Giỏ hàng</h4>
                </div>
                <div class="modal-body">
					<span id="cartDetails"></span>
					<div align="right">
             			<a href="#" class="btn btn-primary" id="check_out_cart">Thanh toán</a>
			 			<a href="#" class="btn btn-default" id="clear_cart">Hủy</a>
					</div>
				</div>
					
			</div>
	</div>
</div>
<?php include("register.php") ?>
<script>
$(document).ready(function(){
load_cart_data()
//Load giỏ hàng
function load_cart_data()
{
	$.ajax({
		url:"fetch_cart.php",
		method:"POST",
		dataType:"json",
		success:function(data)
		{
		$("#cartDetails").html(data.cart_detail);
		$("#total-item").text("( "+data.total_item+" món)");
		},
		error:function()
			{alert("Tạo giỏ hàng không thành công");}
		});
}
//thêm sản phẩm vào giỏ hàng
$(document).on('click','.them',function(){
		var product_id = $(this).attr("id");
		var product_name =$("#name"+product_id+"").val();
		var product_price =$("#price"+product_id+"").val();
		var action ="add";
		$.ajax({
			url:"xuly.php",
			method:"POST",
			data:{product_id:product_id,product_name:product_name,product_price:product_price,action:action},
			success:function(data)
			{
				load_cart_data();
				alert("Đã thêm sản phẩm!");
			},
			error:function(){alert("Thêm không thành công");}
		});
	});
//Xóa sản phẩm riêng theo từng dòng
$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Bạn có chắc muốn xóa sản phẩm?"))
		{
			$.ajax({
				url:"xuly.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					
				}
			});
		}
		else
		{
			return false;
		}
	});
//Xóa hết sản phẩm trong giỏ hàng
$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"xuly.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
			}
		});
	});
//Cộng số lượng 
$(document).on('click', '.plus', function(){
	var action = 'plus';
	var product_id = $(this).attr("id");
	$.ajax({
		url:"xuly.php",
		method:"POST",
		data:{product_id:product_id,action:action},
		success:function()
		{
			load_cart_data();
		}
	});
});
//Trừ số lượng
$(document).on('click', '.min', function(){
	var action = 'min';
	var product_id = $(this).attr("id");
	$.ajax({
		url:"xuly.php",
		method:"POST",
		data:{product_id:product_id,action:action},
		success:function()
		{
			load_cart_data();
		}
	});
});
//Chuyển sang trang thanh toán có kiểm tra đăng nhập
$(document).on('click','#check_out_cart', function(){
	var action = 'checkout';
	$.ajax({
		url:"xuly.php",
		method:"POST",
		data:{action:action},
		success:function(data)
		{
			if($.trim(data) == "no")
			{
				alert("Bạn chưa đăng nhập!");
			}
			else
			{
				window.location.href = "./payment.php";
			}
		}
	});
});
});

</script>