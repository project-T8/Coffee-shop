<style>
.active{
	background-color:purple;
	color:purple;
	}
</style>
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
			if($searchValue == "ca phe")
			{
				$searchValue ="CF";
				$searchQuery = "AND (id_type = '$searchValue')";
			}
			else if($searchValue == "tra")
			{
				$searchValue ="TM";
				$searchQuery = "AND (id_type = '$searchValue')";
			}
			else if($searchValue == "da xay")
			{
				$searchValue ="IC";
				$searchQuery = "AND (id_type = '$searchValue')";
			}
			else if($searchValue == "trai")
			{
				$searchValue ="FF";
				$searchQuery = "AND (id_type = '$searchValue')";
			}
			else{
			$searchQuery = " AND (id_pro like '%$searchValue%'or 
        	name like '%$searchValue%' or 
        	info like '%$searchValue%' or
			price  like '%$searchValue%' or
			id_type = '$searchValue' ) ";}
			
		}
	}
	$start_from = ($page -1) * $record_per_page;
	$sql = "SELECT * FROM product WHERE 1 ".$searchQuery." LIMIT $start_from,$record_per_page";
	$result = mysqli_query($con,$sql);
	$output .= '
	<table class="table">
                          <thead class=" text-primary">
                          <th style="text-align:center"> Ảnh </th>
                          <th style="text-align:center"> Mã </th>
                          <th style="text-align:center"> Tên sản phẩm</th>
                          <th style="text-align:center"> Chi tiết</th> 
                          <th style="text-align:right"> Giá</th>
						  <th style="text-align:center"> Loại </th>';
	if($_SESSION['ad_role']=='manager')	
		$output.='<th style="text-align:center">Thao tác</th>';
    $output.='</thead><tbody>';
	while($row =mysqli_fetch_array($result))
	{
		$sql2 = "SELECT name FROM type AS t WHERE t.id_type like '%".$row['id_type']."%'";
		$result2 = mysqli_query($con,$sql2);
		
		$row2 = mysqli_fetch_assoc($result2);
		$output.='<tr>
							  	<td width="20%" style="padding-left:40px" ><img width="100%" height="150px" style="position:relative" src="../../../img/product/'.$row['image'].'"/></td>
								<td width="10%" style="text-align:center"><span style="font-weight:500">'.$row['id_pro'] .'</span></td>
								<td width="15%" align="center"><span style="font-weight:500">'.$row['name'].'</span></td>
								<td width="30%" style="font-weight:500">'.  $row['info'].'</td>
								<td width="15%" align="right"><span style="font-weight:500">'.  number_format((int)$row['price'],0,".",",") .' đ</span></td>
								<td width="10%" align="center" style="font-weight:500">'.$row2['name'].'</td>';
		if($_SESSION['ad_role']=='manager')	$output.='<td width="20%" align="center">
									<a href=".edit-product" data-toggle="modal" class="edit_pro" id="'.$row['id_pro'].'" onclick="fetch_product(this)">
                        				<i class="material-icons">create</i>
                      				</a>
                      				<!--BUTTON XÓA-->
                       				<a style="cursor:pointer" class="del_pro" id="'.$row['id_pro'].'">
                         				<i class="material-icons">clear</i>
                      				</a>
								</td>';
							 $output.='</tr>';
	}
	$output.='</tbody>
                      </table>';
	$page_query = "SELECT * FROM product WHERE 1 ".$searchQuery."";
	$page_result = mysqli_query($con,$page_query);
	$total_record = mysqli_num_rows($page_result);
	$total_pages = ceil($total_record/$record_per_page);
	if($page>1)
	{
		$output.='<span class="pagination_link btn  btn-link e" id="1"><i class="material-icons">fast_rewind</i></span>
		<span class="pagination_link btn  btn-link " id="'.($page-1).'"><i class="material-icons">keyboard_arrow_left</i></span>';
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
		<span class="pagination_link btn  btn-link " id="'.($page+1).'"><i class="material-icons">keyboard_arrow_right</i></span>
		<span class="pagination_link btn  btn-link " id="'.$total_pages.'"><i class="material-icons">fast_forward</i></span>';
	}
	$output.='</div>';
	mysqli_close($con);
	echo $output;
?>