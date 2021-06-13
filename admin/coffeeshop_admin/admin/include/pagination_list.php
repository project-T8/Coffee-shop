<?php
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
	$start_from = ($page -1) * $record_per_page;
	$sql = "SELECT * FROM employee LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	<table class="table table-hover">
                          <thead class="text-warning">
                         	<th style="text-align:center">Ảnh</th>
                      		<th style="text-align:center">Tên</th>
                      		<th style="text-align:center">Email</th>
							<th style="text-align:center">Số điện thoại</th>
                          </thead>
                          <tbody>';
	while($row =mysqli_fetch_array($result))
	{
		$sql2 = "SELECT * FROM role AS r WHERE r.id_role = $row[id_role]";
		$result2 = mysqli_query($con,$sql2);
		$row2=mysqli_fetch_array($result2);
		$output.='<tr>
									<td width="24%" align="center"><img width="100px" height="100px" style="position:relative" src="../../../img/employee/'.$row['img'].'"/></td>
									<td width="25%" align="center" style="font-weight:500">'.$row['lastname'] .' '. $row['firstname'].'</td>
									<td width="20%" align="center"  style="font-weight:500">'.$row['email'].'</td>
									<td width="25%" align="center" style="font-weight:500">'.$row['phone'].'</td>
								</tr>	';
	}
	$output.='</tbody>
                      </table>
					  <div style="width:100%;text-align:center;">';
	$page_query = "SELECT * FROM employee";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link_list btn   btn-link  " id="1"><i class="material-icons">fast_rewind</i></span>
		<span class="pagination_link_list btn   btn-link  " id="'.($page-1).'"><i class="material-icons">keyboard_arrow_left</i></span>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==1){
		$output.='<span class="pagination_link btn  btn-link  page_first" "id="'.$i.'">'.$i.'</span>';
		}
		else{
		$output.='<span class="pagination_link btn  btn-link  " id="'.$i.'">'.$i.'</span>';
		}
	}
	if($page<$total_pages)
	{
		$output.='
		<span class="pagination_link_list btn   btn-link  " id="'.($page+1).'"><i class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link_list btn   btn-link  " id="'.$total_pages.'"><i class="material-icons">fast_forward</i></span>';
	}
	$output.='</div>';
	mysqli_close($con);
	echo $output;
?>