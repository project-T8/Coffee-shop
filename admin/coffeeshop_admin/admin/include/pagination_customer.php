<?php
	require("../connect.php");
	session_start();
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
	$searchValue="";
	$searchQuery="";
	if(isset($_POST["value"]))
	{
		$searchValue = $_POST["value"];

		if($searchValue !="")
		{
			if($searchValue == "cho")
			{
				$searchQuery = "AND (clocked = 0)";
			}
			else if($searchValue == "khoa") $searchQuery = "AND (clocked = 1)";
			else $searchQuery = " AND (id_cus like '%$searchValue%' or 
        	lastname like '%$searchValue%' or 
        	firstname like '%$searchValue%' or
			username  like '%$searchValue%' or
			email  like '%$searchValue%' or
			phone  like '%$searchValue%' or
			address  like '%$searchValue%' ) ";
		}
	}
	$start_from = ($page -1) * $record_per_page;
	$sql = "SELECT * FROM customer	WHERE 1 ".$searchQuery." LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	<table class="table table-hover">
                          <thead class="text-warning">
                         				<th>STT</th>
                        				<th>ID</th>
                        				<th>Họ</th>
                        				<th>Tên</th>
                        				<th>Tài khoản</th>
                        				<th>Email</th>
						            	<th>Điện thoại</th>
						            	<th>Địa chỉ</th>
						            	<th>Tình trạng</th>';
	if($_SESSION['ad_role']=='admin') $output.='<th>Thao tác</th>';
                          $output .='</thead>
                          <tbody>';
						  $stt=1;
	while($row =mysqli_fetch_array($result))
	{
		
		$output.='<tr>
									<td width="5%" data-target="id_cus">'.$stt.'</td>
									<td width="10%" data-target="lastname">'. $row['id_cus'] .' </td>
									<td width="15%" data-target="firstname">'.$row['lastname'].'</td>
									<td width="10%" data-target="lastname">'. $row['firstname'].'</td>
									<td width="10%" data-target="lastname">'.$row['username'].'</td>
									<td width="10%" data-target="lastname">'.$row['email'].'</td>
									<td width="10%" data-target="lastname">'.$row['phone'].'</td>
									<td width="10%" data-target="lastname">'.$row['address'].'</td>
									<td width="10%" data-target="clocked">';
									if($row['clocked'] == 1)
									{
										$output.='<span style="color:red;font-weight:400">Khóa</span>';
									}
									else
									{
										$output.='<span style="color:green;font-weight:400">Cho phép</span>';
									}
								$output.='</td>';
								if($_SESSION['ad_role']=='admin'){
								$output.='<td>
                      						<!--BUTTON SỬA-->
                      							<a href="#myModal" id="'.$row['id_cus'].'" data-toggle="modal" onClick="fetch_customer(this)" >
                        							<i class="material-icons">create</i>
                      							</a>
                      						<!--BUTTON XÓA-->
                       						<a href="#" class="xoa" id="'.$row['id_cus'].'">
                         						<i class="material-icons">clear</i>
                      						</a>
									  		</td>';
								}
								$output.='</tr>';
		$stt+=1;
	}
	$output.='</tbody>
                      </table>
					  <div style="width:100%;text-align:center;">';
	$page_query = "SELECT * FROM customer WHERE 1".$searchQuery."";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link btn btn-social btn-link btn-dribbble" id="1"><i  style="padding-top:7px" class="material-icons">fast_rewind</i></span>
		<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.($page-1).'"><i   style="padding-top:7px"class="material-icons">keyboard_arrow_left</i></span>';
	}
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==1){
		$output.='<span class="pagination_link btn  btn-link  page_first" id="1">'.$i.'</span>';
		}
		else{
		$output.='<span class="pagination_link btn  btn-link  " id="'.$i.'">'.$i.'</span>';
		}
	}
	if($page<$total_pages)
	{
		$output.='
		<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.($page+1).'"><i style="padding-top:7px" class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link btn btn-social btn-link btn-dribbble" id="'.$total_pages.'"><i  style="padding-top:7px" class="material-icons">fast_forward</i></span>';
	}
	$output.='</div>';
	mysqli_close($con);
	echo $output;
?>