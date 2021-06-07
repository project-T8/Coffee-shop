<?php
	session_start();
	require("../connect.php");
	
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
	$searchValue="";
	$searchQuery="";
	if(isset($_POST["value"]))
	{
		$searchValue = $_POST["value"];

		if($searchValue !="")
		{
			if($searchValue == "chua")
			{
				$searchValue = 0;
				$searchQuery = "AND (status = 0)";
			}
			else{
			$searchQuery = " AND (id_bill like '%$searchValue%' or 
        	cus_id like '%$searchValue%' or 
        	now like '%$searchValue%' or
			total_price  like '%$searchValue%' ) ";
			}
		}
	}
	$start_from = ($page -1) * $record_per_page;
	$sql ="SELECT * FROM order_bill WHERE 1 ".$searchQuery." LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	 <table class="table">
                          <thead class="text-primary">
                          <th style="text-align:center;font-weight:500"> Mã đơn hàng </th>
                          <th style="text-align:center;font-weight:500"> Mã khách hàng </th>
                          <th style="text-align:center;font-weight:500"> Ngày</th>
                          <th style="text-align:right;font-weight:500"> Tổng tiền</th>
						  <th style="text-align:center;font-weight:500">Trạng thái</th>
                          <th style="text-align:center;font-weight:500">Thao tác</th>
                          </thead>
                          <tbody>';
	while($row = mysqli_fetch_array($result))
	{
		$output.='<tr>
									<td width="15%" align="center" style="font-weight:500">'. $row['id_bill'].'</td>
									<td width="15%" align="center" style="font-weight:500">'. $row['cus_id'].'</td>
									<td width="15%" align="center" style="font-weight:500">'. $row['now'].'</td>
									<td width="15%" align="right" style="font-weight:500">'.number_format((int)$row['total_price'],0,".",",") .' đ</td>
									<td width="20%" align="center">';
		if($row['status']==0){
			if($_SESSION['ad_role']=='manager')
			$output.='<span style="color:red;cursor:pointer" class="check" id="'.$row['id_bill'].'">Chưa xác nhận</span>';
			else $output.='<span style="color:red;" id="'.$row['id_bill'].'">Chưa xác nhận</span>';
		}
		else{
			$output.='<span style="color:green">Đã xác nhận</span>';
			}
		$output.='</td>
									<td width="20%" align="center"> 
										<a href="#bill_modal" data-toggle="modal" onclick="fetch_bill(this)" id="'.$row['id_bill'].'">Xem chi tiết</a><br>
									</td>
								</tr>	';
	}
	$output.='			</tbody>
                     </table>
			

			<div style="padding:10px 0 0 35%">';
	$page_query = "SELECT * FROM order_bill WHERE 1 ".$searchQuery."";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link btn btn-link " id="1"><i class="material-icons">fast_rewind</i></span>
		<span class="pagination_link btn  btn-link " id="'.($page-1).'"><i class="material-icons">keyboard_arrow_left</i></span>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==1){
		$output.='<span class="pagination_link btn  btn-link page_first" id="1">'.$i.'</span>';
		}
		else{
		$output.='<span class="pagination_link btn  btn-link  " id="'.$i.'">'.$i.'</span>';
		}
	}
	if($page<$total_pages)
	{
		$output.='
		<span class="pagination_link btn  btn-link " id="'.($page+1).'"><i class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link btn  btn-link " id="'.$total_pages.'"><i class="material-icons">fast_forward</i></span>';
	}
	$output.='</div>';
	mysqli_close($con);
	echo $output;
?>