<?php 
session_start();
if(isset($_SESSION["username"])){
require("include/dbconnect.php");
$myname=$_SESSION["username"];
if($_SESSION['role']=='customer')	
	$sql = "SELECT * FROM customer WHERE username='$myname' ";
//else $sql = "SELECT * FROM employee WHERE username='$myname' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)){
	$id="";$table="";
	if($_SESSION['role']=='customer'){ $id=$row['id_cus']; $table='customer';}
	//else{ $id=$row['id_em'];$table='employee';}
	$lname=$row['lastname'];
	$fname=$row['firstname'];
	$user=$row['username'];
	$pass=$row['password'];
	$email=$row['email'];
	$phone=$row['phone'];
	$address=$row['address'];
}
$sql= "SELECT id_bill FROM order_bill where cus_id='$id' ORDER BY  id_bill DESC";
$result = mysqli_query($con,$sql);
$i=0;
while($row = mysqli_fetch_assoc($result)){
	$bill[$i]=$row['id_bill'];
	$i++;
}
$rowOrder=$i;
// mysqli_close($con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		
		<!-- Meta Keyword -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coffee Shop</title>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">				
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/tch.min.css" />
			<link rel="stylesheet" href="css/styles_product.css" />
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/main.js"></script>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script type="text/javascript">
function removeTone(str) {
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "a");
    str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "e");
    str = str.replace(/??|??|???|???|??/g, "i");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "o");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "u");
    str = str.replace(/???|??|???|???|???/g, "y");
    str = str.replace(/??/g, "d");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "A");
    str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "E");
    str = str.replace(/??|??|???|???|??/g, "I");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "O");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "U");
    str = str.replace(/???|??|???|???|???/g, "Y");
    str = str.replace(/??/g, "D");
    return str;
}
$(document).ready(function(){
  $("#profile").click(function(){
  	$("#order").removeClass("active");
  	$(this).addClass("active");
  	$("#profile_form").css("display","block");
  	$("#order_form").css("display","none");
  });
  $("#order").click(function(){ 
  	$("#profile").removeClass("active");
  	$(this).addClass("active");
  	$("#profile_form").css("display","none");
  	$("#order_form").css("display","block");
  });
  $("#change").change(function() {
    if($(this).is(':checked')) {
      $("#divoldpass").css("display","block");
      $("#divnewpass").css("display","block");
      $("#divnewpass2").css("display","block");
    }
    else {
      $("#divoldpass").css("display","none");
      $("#divnewpass").css("display","none");
      $("#divnewpass2").css("display","none");
    }
  });
  $(document).on('click', '#acupdate', function(){
  		var error="";
		var lastname = $("#aclastname").val();
		var firstname = $("#acfirstname").val();
		var email = $("#acemail").val();
		var phone = $("#acphone").val();
		var address = $("#acaddress").val();
		var id=<?php echo $id; ?>;
		var table="<?php echo $table; ?>";
		var newpass="<?php echo $pass; ?>";
		var oldpass=newpass2="";
		if($("#change").is(':checked')) {
			oldpass=$("#acoldpass").val();
			newpass=$("#acnewpass").val();
			newpass2=$("#acnewpass2").val();
			var pattern= /^[a-zA-Z0-9]{5,}$/;
			if(oldpass!="<?php echo $pass; ?>"){error+="M???t kh???u c?? b??? sai.\n"; }
			else if(pattern.test(newpass)==false){error+="M???t kh???u m???i b??? sai.\n";}
			else if(newpass!=newpass2){error+="M???t kh???u nh???p l???i b??? sai.\n"; }
		}
		var update = "update";
		var em=removeTone(lastname);var pattern= /^([A-Z][a-z]*\s*)+$/;
		if(pattern.test(em)==false) error+="H??? v?? t??n l??t b??? sai.\n"; 
		var em=removeTone(firstname);var pattern= /^([A-Z][a-z]*\s*)+$/;
		if(pattern.test(em)==false) error+="T??n b??? sai.\n";
		var em=email;var pattern= /^[a-zA-Z0-9\.\-\_](\w+(\.|\-|\_)?){2,}@\w{3,}(.\w{2,3})+$/;
		if(pattern.test(em)==false) error+="Email b??? sai.\n";
		var em=phone;var pattern= /^0\d{9,10}$/;
		if(pattern.test(em)==false) error+="S??? ??i???n tho???i b??? sai.\n";

		if(error.length>5){ $("#errorhelp").text(error);}
		else{ $("#errorhelp").text("");
		var pass=newpass;
		if (confirm("B???n ch???c l?? mu???n thay ?????i th??ng tin c?? nh??n!"))
		$.ajax({
			url:"solvelogin.php",
			method:"POST",
			data:{update:update,pass:pass,lastname:lastname,firstname:firstname,
			email:email,address:address,phone:phone,table:table,id:id},
			success:function(data)
			{
				if($.trim(data) == "yes") 
				{
					alert("C???p nh???t th??nh c??ng");
					location.reload();	
				}
			}
		});
		}
	});
});
</script>

<body>
<?php 
include "include/header.php";
?>
<!-- content -->
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			 <div class="menu-left">
                <div class="profiles">
    				<p class="image"><img src="img/account.jpg" height="150" width="150" alt=""></p>
    				<h3 class="name">T??i kho???n c???a</h3>
   					<h4><?php echo $lname." ".$fname; ?></h4>
				</div>
				<ul class="list-group">
					<li id="profile" class="list-group-item list-group-item-action list-group-item-warning"> Th??ng tin t??i kho???n </li>
					 <li id="order"class="list-group-item list-group-item-action list-group-item-warning"> ????n h??ng c???a b???n</li>
				</ul>
			</div><br />
		</div>
		<div class="col-sm-5" id="profile_form" style="display:block">
			<form name="abcd" >
				<div class="input-wrap">
					<label class="control-label" for="full_name">H??? v?? t??n l??t: </label>
                    <input type="text" name="aclastname" class="form-control" id="aclastname" value="<?php echo $lname; ?>"placeholder="H??? v?? t??n l??t">
                    <span class="help-block"></span>
                </div>
                <div class="input-wrap">
					<label class="control-label" for="full_name">T??n: </label>
                    <input type="text" name="acfirstname" class="form-control" id="acfirstname" value="<?php echo $fname; ?>"placeholder="T??n">
                    <span class="help-block"></span>
                </div>
				<div class="form-group" >
                    <label class="control-label">Email:</label>
                    <input id="acemail" type="text" class="form-control login" name="acemail" placeholder="Email" value="<?php echo $email; ?>">            
                </div>
                <div class="form-group" >
                    <label class="control-label">S??? ??i???n tho???i:</label>
                    <input id="acphone" type="text" class="form-control login" name="acphone" placeholder="S??? ??i??n tho???i" value="<?php echo $phone; ?>">            
                </div>
                <div class="form-group" >
                    <label class="control-label">?????a ch???:</label>
                    <input id="acaddress" type="text" class="form-control login" name="acaddress" placeholder="?????a ch???" value="<?php echo $address; ?>">            
                </div>
				<div class="form-group" >
					<input type="checkbox" id="change" value="checked"><label class="control-label">Thay ?????i m???t kh???u</label>
				</div>
				<div class="form-group" style="display: none" id="divoldpass">
                    <label class="control-label">M???t kh???u c??:</label>
                    <input id="acoldpass" type="password" class="form-control login" name="acoldpass" placeholder="Nh???p m???t kh???u c??">
                </div>
                <div class="form-group" style="display: none" id="divnewpass">
                    <label class="control-label">M???t kh???u m???i:</label>
                    <input id="acnewpass" type="password"  class="form-control login" name="acnewpass" placeholder="Nh???p m???t kh???u m???i">
                </div> 
                <div class="form-group" style="display: none" id="divnewpass2">
                    <label class="control-label">Nh???p l???i:</label>
                    <input id="acnewpass2" type="password"  class="form-control login" name="acnewpass2" placeholder="Nh???p l???i m???t kh???u m???i">
                </div>  
				<div class="form-group">
					<button type="button" id="acupdate" class="btn btn-warning btn-block" tabindex="9" >C???p nh???t</button>
				</div>
				<div class="alert alert-warning alert-dismissible fade show" id="errorhelp">
 				</div>
			</form>
		</div>
		<div id="order_form" style="display: none; " class="col-sm-9" >
			<h3 style="display: flex; justify-content: center; border:solid 1px orange;border-radius: 5px;background-color:orange" >Danh s??ch ????n h??ng c???a b???n</h3>
			<div style="overflow: scroll; height: 600px;">
			<?php 
				for($i=0;$i<$rowOrder;$i++){
					$sql="SELECT * FROM order_bill where id_bill= $bill[$i];";
					$result = mysqli_query($con,$sql);
					while( $row=mysqli_fetch_assoc($result) ){
						$billphone=$row['user_phone'];
						$billaddress=$row['user_address'];
						$billname=$row['user_name'];
						$billpayment=$row['payment'];
						$billnote=$row['note'];
						$billstatus=$row['status'];
						$billtotal=$row['total_price'];
						$billtime=$row['now'];
					}
					echo '<div style="border:lightgray dotted 0.5px;padding:5px;border-radius: 5px;">
					<h4 style="display: flex"><strong>M?? ????n ?????t h??ng: </strong> '.$bill[$i].'</h4>';
					if($billstatus==0)
							echo '<div style=" float:right;font-size:18px;color:red"> ??ang ch??? x??? l?? </div>';
						else 
							echo '<div style="color:#8EFB31;float:right;font-size:18px"> ???? x??? l?? </div>';
					echo '<div ><strong>Gi??? ?????t:</strong>'.$billtime.'</div><br />'; 
					echo '<table class="table table-hover table-striped ">
				    <thead class="thead-dark">
				      <tr>
				        <th width="30%" style=" text-align:center">T??n s???n ph???m</th>
				        <th width="20%" style=" text-align:center">S??? l?????ng</th>
				        <th width="15%" style=" text-align:right">????n gi??</th>
				        <th width="20%" style=" text-align:right">Th??nh ti???n</th>
				      </tr>
				    </thead>
				    <tbody>';
					$sql="SELECT p.name as name,d.price as price, d.qty as amount  FROM detail_order as d join product as p on p.id_pro=d.pro_id where id_bill= $bill[$i];";
					$result = mysqli_query($con,$sql);
					while( $row=mysqli_fetch_assoc($result) ){
			?>	
				       <tr>
				        <td align="center"><?php echo $row['name'] ?></td>
				        <td align="center"><?php echo $row['amount'] ?></td>
				        <td align="right"><?php echo number_format((int)$row['price'],0,".",","); ?> ??</td>
				        <td align="right"><?php echo  number_format((int)$row['price']*$row['amount'],0,".",",");?> ??</td>
				      </tr>
			<?php 	
					}
			?>
					<tr>
						<td colspan="2" ></td>
						<td style=" font-weight: bold" align="right">T???ng c???ng</td>
						<td align="right"><?php echo number_format((int)$billtotal,0,".",",") ?> ??</td>
					</tr>
					</tbody>
					</table>
					<div ><strong>?????a ch???:</strong> <?php echo $billaddress ?> </div>
					<div ><strong>Ng?????i nh???n:</strong> <?php echo $billname ?> </div>
					<div ><strong>S??? ??i???n tho???i:</strong> <?php echo $billphone ?> </div>
					<div ><strong>Ph????ng th???c thanh to??n:</strong> <?php echo $billpayment ?> </div>
					<div ><strong>Ghi ch??:</strong> <?php echo $billnote ?> </div>
					</div>
					<br />
			<?php	
				}
			?> 
			</div>
		</div>
	</div>
</div>

<!-- end content -->
<?php 
	mysqli_close($con);
	include "include/footer.php";
?>
</body>
</html>
<?php 
	}
	else{?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		
		<!-- Meta Keyword -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coffee Shop</title>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">				
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/tch.min.css" />
			<link rel="stylesheet" href="css/styles_product.css" />
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/main.js"></script>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php	include("include/header.php");
?>
	<div class="container">
				<div class="row">
					<div style="font-weight:bold"><h3>B???n c???n ph???i ????ng nh???p ????? xem th??ng tin n??y</h3></div>
				</div>
			</div>
<?php include("include/footer.php");?>
</body>
</html>
<?php } ?>
