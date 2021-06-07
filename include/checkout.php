<?php 
	if(isset($_SESSION["myname"])){
		$myname=$_SESSION["username"];
		require("include/dbconnect.php");	
		$result="";
		if($_SESSION['role']=='customer'){
			$sql = "SELECT * FROM customer WHERE username='$myname' ";
			$result = mysqli_query($con,$sql);
			while($row = mysqli_fetch_assoc($result)){
				$id_cus = $row['id_cus'];
				$lname=$row['lastname'];
				$fname=$row['firstname'];
				$phone=$row['phone'];
				$address=$row['address'];
			}
			mysqli_close($con);	
		}
 ?>
<section class="payment" style=" padding-top:100px">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="text-center">
					<h2>Thanh toán</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="uk-container">
		<div class="uk-grid-small uk-grid">
			<div class="uk-width-2-3@l uk-width-1-1@m uk-first-column">
				<div class="uk-card uk-card-default uk-card-small uk-card-body uk-padding-remove-left uk-padding-remove-right uk-padding-remove-top">
					<div class="uk-card-header">
						<p class="uk-card-title">1.Xác nhận thông tin đơn hàng</p>
					</div>
					<div class="uk-card-body ">
						<div class="uk-grid-small uk-grid">
							<div class="uk-width-1-1 uk-margin-top uk-grid-margin uk-first-column">
								<div class="uk-inline uk-width-1-1 uk-visible@l">
									<div class="logaddress">
										<span class="uk-form-icon" style="color: rgb(112, 112, 112);">
											<img src="img/location.png" />
										</span>
										<input type="hidden" id="id_cus" value="<?php echo $id_cus ?>" />
										<input placeholder="Nhập địa chỉ giao hàng" class="uk-input" value="<?php echo $address; ?>" id="address"/>
									</div>
								</div>
							</div>
							<div class="uk-width-1-2@l uk-width-1-2@m uk-margin-top uk-grid-margin uk-first-column">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" style="color: rgb(112, 112, 112);">
										<img src="img/user.png" />
									</span>
									<input placeholder="Người nhận" class="uk-input" value="<?php echo $lname.' '.$fname ; ?>" id="name"/>
								</div>
							</div>
							<div class="uk-width-1-2@l uk-width-1-2@m uk-margin-top uk-grid-margin">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" style="color: rgb(112, 112, 112);">
										<img src="img/phone.png" />
									</span>
									<input placeholder="Số điện thoại" class="uk-input" value="<?php echo $phone; ?>" id="phone"/>
								</div>
							</div>
							<div class="uk-width-1-1@l uk-width-1-1@m uk-margin-top uk-grid-margin uk-first-column">
								<div class="uk-inline uk-width-1-1">
									<input placeholder="Ghi chú thêm" class="uk-input" id="note"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-card uk-card-default uk-card-small uk-card-body uk-padding-remove-left uk-padding-remove-right uk-padding-remove-top" style="margin-top:50px">
					<div class="uk-card-header">
						<p class="uk-card-title">2.Hình thức thanh toán</p>
					</div>
					<div class="uk-card-body ">
						<div class="uk-grid-small k-grid-collapse uk-grid">
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-first-column">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" value="Thanh toán khi giao hàng" id="method" class="uk-radio tch-radio"  checked="checked"/>
									<span class="tch-text-checked">
										<img src="img/cash.png"  width="25"/>
											Thanh toán khi giao hàng
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" value="Visa/Master/JCB" id="method" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/visa.png"  width="25"/>
										Visa/Master/JCB
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin uk-first-column">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" value="Thẻ ATM nội địa" id="method" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/atm.png"  width="25"/>
										Thẻ ATM nội địa
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" value="MoMo" id="method" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/momo.png"  width="25"/>
										MoMo
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin uk-first-column">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" value="ZaloPay" id="method" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/zalo.png"  width="25"/>
										ZaloPay
									</span>
								</label>
							</div>
							<div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l tch-checkbox-payment-order uk-grid-margin">
								<label class="tch-cursor-pointer">
									<input name="method" type="radio" value="AirPay" id="method" class="uk-radio tch-radio" />
									<span class="tch-text-checked">
										<img src="img/airpay.png"  width="25"/>
										AirPay
									</span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-3@l uk-width-1-1@m">
				<div id="detail_checkout">
					<div>
						<div id="container_sticky" class="uk-card uk-card-default uk-card-body uk-card-small uk-padding-remove" style="z-index: 0;">
							<div class="uk-card-header uk-grid-small uk-grid">
								<button class="tch-text-bold uk-button uk-button-primary uk-width-1-1 uk-padding-remove-left uk-padding-remove-right order" id="order">
									Đặt hàng
								</button>
							</div>
							<div>
								<div>
									<div class="uk-card-body" id="paymentDetail">
									</div>
								</div>
							</div>
							<div class="uk-card-footer">
								<div class="uk-grid-small uk-padding-remove-bottom uk-grid">
									<div class="uk-width-expand uk-first-column">
										Cộng(<span id="total_item"></span> món) 	
									</div>
									<div class="uk-width-auto">
										<span id="total_price"> đ</span>
									</div>
								</div>
							</div>
							<div class="uk-card-footer">
								<div class="uk-grid-small uk-grid">
									<div class="uk-width-expand uk-first-column">
									<input type="hidden" id="tong_tien"  />
										Tổng cộng
									</div>
									<div class="uk-width-auto uk-text-large tch-text-bold">
										<span id="total_price2"> đ</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="stop-uk-sticky" style="position: relative; bottom: 0px;"></div>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready(function(){
	load_payment_data()
	function load_payment_data()
	{
		$.ajax({
		url:"fetch_payment.php",
		method:"POST",
		success:function(data)
		{	
		var cart = JSON.parse(data);
		$("#paymentDetail").html(cart.payment_detail);
		$("#total_item").text(cart.total_item);
		$("#total_price").text(cart.total_price+ " đ");
		$("#total_price2").text(cart.total_price+ " đ");
		$("#tong_tien").val(cart.total_price);
		},
		error:function()
			{alert("Tạo giỏ hàng không thành công");}
		});
	}
	$(document).on('click','.tru',function(){
		var action = "min";
		var product_id = $(this).attr("id");
		$.ajax({
			url:"xuly2.php",
			method:"POST",
			data:{action:action,product_id:product_id},
			success:function()
			{
				load_payment_data();
			},
			error:function(){alert("Không thể trừ");}
		});
	});
	$(document).on('click', '.cong', function(){
	var action = 'plus';
	var product_id = $(this).attr("id");
	$.ajax({
		url:"xuly2.php",
		method:"POST",
		data:{product_id:product_id,action:action},
		success:function()
		{
			load_payment_data();
		}
		});
	});
	$(document).on('click', '.order', function(){
		var method = $('input[name="method"]:checked').val();
		var order_address=$("#address").val();
		var order_phone=$("#phone").val();
		var order_note=$("#note").val();
		var order_name=$("#name").val();
		var id_cus = $("#id_cus").val();
		var total_price = $("#tong_tien").val();
		var action = "order";
		if(order_address == "")
		{
			alert("Địa chỉ không được trống!!");
		}
		else
		{
			if(order_name == "")
			{
				alert("Tên người nhận không được trống!!");
			}
			else{
				if(order_phone == "")
				{
					alert("Số điện thoại không được trống");
				}
				else
				{
					$.ajax({
						url:"xuly2.php",
						method:"POST",
						data:{action:action,order_address:order_address,order_phone:order_phone,order_note:order_note,order_name:order_name,id_cus:id_cus,total_price:total_price,method:method},
						success:function(data)
						{
							var check = JSON.parse(data);
							if($.trim(check.check_cart) == "false")
							{
								alert("Giỏ hàng đang trống!");
							}
							else
							{
								if($.trim(check.check_name) == "false")
								{
									alert("Tên người nhập chưa đúng!");
								}
								else
								{
									if($.trim(check.check_phone) == "false")
									{
										alert("Số điện thoại chưa đúng!");	
									}
									else
									{
										alert("Đặt hàng thành công");
										window.location.reload();
									}
								}
								
							}
						},
						error:function(){alert("Đặt hàng thất bại")}
					});
				}
			}
			
		}
	});
});
</script>
<?php }
else
{
?>
		<div class="container">
				<div class="row">
					<div style="font-weight:bold; position:relative; padding-left:45px"><h3>Bạn cần đăng nhập để thực hiện thanh toán</h3></div>
				</div>
			</div>
<?php }?>