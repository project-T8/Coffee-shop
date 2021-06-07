<?php
	require("../connect.php");
	$day_begin = $_POST['day_begin'];
	$day_end = $_POST['day_end'];
	$total_price = 0;
	$total_item=0;
	$purchase = 0;
	$sql = "SELECT * FROM order_bill";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result))
	{	
		$date1 =  new DateTime($row['now']);
		$date_now = $date1->format("Y-m-d");
		if($day_begin <= $date_now && $date_now <= $day_end)
		{
			$sql2 = "SELECT do.id_bill,SUM(qty) as quantity FROM `detail_order` AS do,`order_bill` AS ob WHERE do.id_bill =ob.id_bill AND ob.status = 1 AND ob.id_bill = ".$row['id_bill']." GROUP BY do.id_bill
";
			$result2 = mysqli_query($con,$sql2);
			$row2 = mysqli_fetch_assoc($result2);
			$total_item += $row2['quantity'];
			$total_price += $row['total_price'];
			$purchase+=1;
		}
		
	}
	$data = array(
		'total_item'	=>		$total_item,
		'total_price'	=>		number_format((int)$total_price,0,".",","),
		'purchase'		=>		$purchase
	);
	echo json_encode($data);
	mysqli_close($con);
?>