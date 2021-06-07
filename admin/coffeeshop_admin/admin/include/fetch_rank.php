<?php
	require("../connect.php");
	$sql="SELECT cus_id,SUM(total_price) AS total_price ,cs.lastname,cs.firstname FROM order_bill AS ob,customer AS cs WHERE ob.cus_id = cs.id_cus GROUP BY cus_id ORDER BY `total_price` DESC LIMIT 3";
	$result = mysqli_query($con,$sql);
	
	$output = '<table class="table table-hover">
                          <thead class=" text-primary">
                          	<th style="text-align:center"> Xếp hạng </th>
                          	<th style="text-align:center"> Tên khách hàng </th>
                          	<th style="text-align:right"> Tổng số tiền</th>
                          </thead>
                          <tbody>';
	$i=1;
	while($row=mysqli_fetch_array($result))
	{
		$output.='<tr>
							  	<td width="30%" align="center" style="font-weight:500;color:orange">'.$i.'</td>
								<td width="30%" align="center" style="font-weight:500;">'.$row['lastname'].' '.$row['firstname'].'</td>
								<td width="30%" align="right"  style="font-weight:500;color:green">'.number_format((int)$row['total_price'],0,".",",").' VND</td>
							  </tr>
							  ';
							  $i+=1;
	}
	$output.='</tbody>
                      </table>';
	echo $output;
	mysqli_close($con);
?>