<?php 
session_start();
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
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">				
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/tch.min.css" />
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/styles_product.css" />
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
</head>

<body>
<?php
// include kết nối db
require("include/dbconnect.php");
// khỏi tạo biến trang
$pagenow=1;
$rowsPerPage = 6;
// kiểm tra page trên url
if( isset($_GET['page']) )
  $pagenow=(int)$_GET['page'];
// tinhs offset
$offset = ($pagenow - 1) * $rowsPerPage;

// khoi tao sql truy xuat
$sql = "SELECT * FROM new " ;
// neu search = yes thi them vao sql
$txsearch="";$txpricemin=0;$txpricemax=1000000;$txtype="";
$amountcon=0;
if(isset($_GET['search']) || isset($_GET['pricemin']) || isset($_GET['pricemax']) || isset($_GET['type'])) 
	$sql.=" WHERE ";
if( isset($_GET['search']) ){
	$txsearch=$_GET['search'];
	$amountcon++; 
	if($amountcon>1) $sql.=" and ";
	$sql.=" (name LIKE '%".$txsearch."%') ";
}
if( isset($_GET['pricemin']) || isset($_GET['pricemax'])  ){
	if( $_GET['pricemin'] !="") $txpricemin=(int)$_GET['pricemin']; 
	if( $_GET['pricemax'] !="") $txpricemax=(int)$_GET['pricemax']; 
	$amountcon++; 
	if($amountcon>1) $sql.=" and ";
	$sql.=" (price between ".$txpricemin." and ".$txpricemax." )" ;
}
if( isset($_GET['type']) ){
	$txtype=$_GET['type'];
	$amountcon++; 
	if($txtype!=""){
		if($amountcon>1) $sql.=" and ";
		$sql.=" (id_type LIKE  '%$txtype%') ";
	}
}
// lay numrows tinh max page
$rs = mysqli_query($con,$sql);
$numrows = mysqli_num_rows($rs);
$pagemax=ceil($numrows/$rowsPerPage);

// Luu gia tri phan trang len session
// $_SESSION["originalSQL"]=$sql;
// $_SESSION["numrows"]=$numrows;
// $_SESSION["pagemax"]=$pagemax;

// them limit de phan trang
$sql.=" LIMIT $offset, $rowsPerPage";
$rs = mysqli_query($con,$sql);

// include pagination phân trang
require("include/pagination.php");

if($txpricemin==0) $txpricemin="";
if($txpricemax==1000000) $txpricemax="";
include "include/heardermenu.php";
?><br> <br>

<!-- Start menu Area -->
<section class="menu_home" id="coffee">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h2 class="menu_home_title line_after_heading section_heading">Tin Tức</h2>
			</div>
		</div>
		<div class="row">
			<!-- tim kiem -->
			<div class="col-lg-12 col-md-12 col-xs-12" >
			<form class="form-horizontal" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
			</form>
			</div>
		</div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="menu_list_home flex_wrap display_flex">
			</div>
</div>
<div class="container">
<?php 
	while($row = mysqli_fetch_array($rs))
	{ ?>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-xs-4">
	<div class="menu_item">
		<div class="menu_item_image">
			<a href="#PRODUCT_DETAILS"  style="width:40px; height:40px;" data-toggle="modal" id="<?php echo $row['id_pro']; ?>" onclick="showDetails(this)"><img src="img/product/<?php echo $row['image'];  ?>" /></a>
		</div>
	</div>	
	</div>
	<div class="col-lg-8 col-md-8 col-xs-8">
	<div class="menu_item">
	<div class="menu_item_info bg_white">
			<h3><?php echo $row['name'];?></h3>
			<div><?php echo $row['info'];?></div>

			<div class="price_product_item"></div>
			<input type="hidden"  id="name<?php echo $row['id_pro']?>" value="<?php echo $row['name']?>"/>
			<input type="hidden" id="info<?php echo $row['id_pro']?>" value="<?php echo $row['info']?>"/>
			<button class="menu_item_action animate_btn"  id="<?php echo $row['id_pro'] ?>" onclick="showDetails(this)"> <a href="#" >Xem Thêm</a></button>
		</div>
	</div>
	</div>
	</div>
	<?php } ?>
		</div>
	</div>
	</div>
</section>
<?php
// include "include/show.php";
?>
<div id="PRODUCT_DETAILS" class="modal"  tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document">   	                
            <div class="modal-content">
				<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
				</div>
                <div class="modal-header">
                    <h4 class="modal-title" style=" font-weight:bold" id="nameTitle"></h4>
					
                </div>
                <div class="modal-body">
                    <div class="col-md-5 modal_body_left popup_img">
                        <span id="images"></span>
                    </div>
                    <div class="col-md-7 modal_body_right popup_info ">
                        <h3 id="names"></h3>
                        <p id="info"></p>
                        <p class="popup_price" id="prices"></i></p>                            
                    <span id="hide"></span>
					</div>
                
                    <div class="clearfix"> </div>                   
                </div>
            </div>
        </div>
</div>
<!--Cart -->

<?php 
echo "<center>". $pagination. "</center>";
mysqli_close($con);
?>
<?php include("include/footer.php") ?>
			
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
<script>
function number_format( number, decimals, dec_point, thousands_sep ) {                         
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
function showDetails(a)
{
	var productID = a.id;
	$.ajax({
		url:"fetch_new.php",
		method:"GET",
		data: {"productID":productID},
		success: function(reponse)
		{
			var product = JSON.parse(reponse);
			$("#nameTitle").text(product.name);
			$("#info").text(product.info);
			$("#images").html("<img src='img/product/"+product.image+"' witdh='50%' height='50%'/>");
			$("#button").html("<button class='btn btn-warning them' style='width:60%; margin-top:40px' id='" + product.id_pro +"'>Xem Thêm</button>");
		}
	});
}
</script>
<script language="javascript">
	function Open()
	{
		var a= document.getElementById('search_high');
		if(a.style.display == 'none')
		{a.style.display = 'block';}
		else 
		a.style.display = 'none';
	}
</script>


</body>
</html>
