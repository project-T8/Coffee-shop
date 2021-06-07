<?php
	require("../connect.php");
	if(isset($_POST['action']))
	{
		if($_POST['action'] == "check")
		{
			$bill_id = $_POST['bill_id'];
			$sql = "UPDATE order_bill SET status = 1 WHERE id_bill = $bill_id";
			$result = mysqli_query($con,$sql);
		}
	}
	mysqli_close($con);
?>