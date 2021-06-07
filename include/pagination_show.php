<style>
.modal-3 a {
  margin-left: 3px;
  padding: 0;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align:center;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.modal-3 li:hover{
	color:#FFFFFF;
}
.modal-3 li a:hover {
  background-color: #EA8025;
  color:#FFFFFF;
}
.modal-3 a.active, .modal-3 a:active {
  color:#FFFFFF;
  background-color: #EA8025;
}
</style>
<?php
	session_start();
	require("dbconnect.php");
	
	$record_per_page = 3;
	$page = '';
	$output= ''; 
	if(isset($_POST["page"]))
	{
		$page=$_POST["page"];
	}
	else
	{
		$page = 1;
	}
	
	$start_from = ($page -1) * $record_per_page;
	$sql = "SELECT * FROM product WHERE id_status = 1 OR id_status = 2 LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result))
	{
		$output.='
	<div class="menu_item">
		<div class="menu_item_image">
			<a href="#PRODUCT_DETAILS" data-toggle="modal" id="'.$row['id_pro'].'" onclick="showDetails(this)"><img src="img/product/'. $row['image'].'" /></a>';
			if($row['id_status']==2){
				$output.='<div class="new">
					<img class="svg-new" src="img/svg/orion_sheriff-star.svg" /><span>MỚI</span>
				</div>';
				}
			else{
				$output.='<div class="best_seller">
					<img class="svg-best-seller" src="img/svg/orion_diploma.svg" /><span>BÁN CHẠY NHẤT</span>
				</div>';}
		$output.='</div>
		<div class="menu_item_info bg_white">
			<h3>'. $row['name'].'</h3>
			<div class="price_product_item">'. number_format($row['price'],0,".",",").' Đ</div>
			<input type="hidden"  id="name'. $row['id_pro'].'" value="'.$row['name'].'"/>
			<input type="hidden" id="price'. $row['id_pro'].'" value="'.number_format($row['price'],0,".",",").'"/>
			<button class="menu_item_action animate_btn them" id="'.$row['id_pro'] .'">Mua ngay</button>
		</div>				
	</div>	
	';
	}
	$output.='<div style="width:100%">
	<ul class="modal-3 pagination" style="margin-left:500px">';
	$page_query = "SELECT * FROM product WHERE id_status = 1 OR id_status = 2";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<li><a class="pagination_link " style="cursor:pointer" id="1">&laquo</a></li>
		<li><a class="pagination_link" style="cursor:pointer" id="'.($page-1).'">&lt</a></li>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==1){
		$output.='<li><a class="pagination_link page_first" style="cursor:pointer" id="'.$i.'">'.$i.'</a></li>';
		}
		else{
		$output.='<li><a class="pagination_link " style="cursor:pointer" id="'.$i.'">'.$i.'</a></li>';
		}
	}
	if($page<$total_pages)
	{
		$output.='
		<li><a class="pagination_link " style="cursor:pointer" id="'.($page+1).'">&gt;</a></li>
		<li><a class="pagination_link " style="cursor:pointer" id="'.$total_pages.'">&raquo</a></li>';
	}
	$output.='</ul></div>';
	mysqli_close($con);
	echo $output;
?>