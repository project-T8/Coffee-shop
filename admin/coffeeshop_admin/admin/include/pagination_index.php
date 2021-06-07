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
	$sql = "SELECT do.pro_id,SUM(qty) as quantity,price,do.id_bill FROM `detail_order` AS do,`order_bill` AS ob WHERE do.id_bill =ob.id_bill AND ob.status = 1 GROUP BY do.pro_id ORDER BY quantity DESC LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	<table class="table table-hover">
                          <thead class=" text-primary">
                          	<th style="text-align:center"> Tên sản phẩm </th>
                          	<th style="text-align:center"> Số lượng bán </th>
                          	<th style="text-align:right"> Tổng doanh thu</th>
                          </thead>
                          <tbody>';
	while($row =mysqli_fetch_array($result))
	{
		$sql2 = "SELECT name,price FROM product AS pd WHERE pd.id_pro = ".$row['pro_id']."";
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$output.='<tr>
							  	<td width="30%" align="center" style="font-weight:500;color:orange">'.$row2['name'].'</td>
								<td width="30%" align="center" style="font-weight:500;color:red">'.$row['quantity'].'</td>
								<td width="30%" align="right"  style="font-weight:500;color:green">'.number_format((int)$row2['price']*$row['quantity'],0,".",",").' VND</td>
							  </tr>
							  ';
	}
	$output.='</tbody>
                      </table>
					  <div style="width:100%;text-align:center;">';
	$page_query = "SELECT pro_id,COUNT(qty) as quantity,price FROM `detail_order` WHERE 1 GROUP BY pro_id";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link btn   btn-link  " id="1"><i class="material-icons">fast_rewind</i></span>
		<span class="pagination_link btn   btn-link  " id="'.($page-1).'"><i class="material-icons">keyboard_arrow_left</i></span>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==1){
		$output.='<span class="pagination_link btn   btn-link   page_first" "id="'.$i.'">'.$i.'</span>';
		}
		else{
		$output.='<span class="pagination_link btn   btn-link   " id="'.$i.'">'.$i.'</span>';
		}
	}
	if($page<$total_pages)
	{
		$output.='
		<span class="pagination_link btn   btn-link  " id="'.($page+1).'"><i class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link btn   btn-link  " id="'.$total_pages.'"><i class="material-icons">fast_forward</i></span>';
	}
	$output.='</div>';
	mysqli_close($con);
	echo $output;
?>