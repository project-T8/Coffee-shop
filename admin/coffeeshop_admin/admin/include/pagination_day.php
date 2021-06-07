<?php
	require("../connect.php");
	
	$record_per_page = 4;
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
	$sql = "SELECT CAST(now AS date) AS now,SUM(total_price) as total_price,id_bill FROM `order_bill` WHERE 1 GROUP BY now ORDER BY now DESC LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	<table class="table table-hover">
                          <thead class=" text-primary">
                          	<th style="text-align:center"> Ngày </th>
                          	<th style="text-align:center"> Số lượng sản phẩm </th>
                          	<th style="text-align:right"> Tổng doanh thu</th>
                          </thead>
                          <tbody>';
	while($row =mysqli_fetch_array($result))
	{
		$sql2 = "SELECT do.id_bill,COUNT(do.id_bill) AS quantity FROM detail_order AS do WHERE do.id_bill = ".$row['id_bill']." GROUP BY do.id_bill";
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$output.='<tr>
							  	<td width="30%" align="center" style="font-weight:500">'.$row['now'].'</td>
								<td width="40%" align="center" style="font-weight:500">'.$row2['quantity'].'</td>
								<td width="30%" align="right" style="font-weight:500">'.number_format((int)$row['total_price'],0,".",",").' đ</span></td>
							  </tr>';
	}
	$output.='</tbody>
                      </table>
					  <div style="width:100%;text-align:center;">';
	$page_query = "SELECT CAST(now AS date) AS now,SUM(total_price) as total_price FROM `order_bill` WHERE 1 GROUP BY now";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link_day btn btn-social btn-link btn-dribbble" id="1"><i class="material-icons">fast_rewind</i></span>
		<span class="pagination_link_day btn btn-social btn-link btn-dribbble" id="'.($page-1).'"><i class="material-icons">keyboard_arrow_left</i></span>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==1){
		$output.='<span class="pagination_link_day btn btn-social btn-link btn-dribbble active" "id="'.$i.'">'.$i.'</span>';
		}
		else{
		$output.='<span class="pagination_link_day btn btn-social btn-link btn-dribbble " id="'.$i.'">'.$i.'</span>';
		}
	}
	if($page<$total_pages)
	{
		$output.='
		<span class="pagination_link_day btn btn-social btn-link btn-dribbble" id="'.($page+1).'"><i class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link_day btn btn-social btn-link btn-dribbble" id="'.$total_pages.'"><i class="material-icons">fast_forward</i></span>';
	}
	$output.='</div>';
	mysqli_close($con);
	echo $output;
?>