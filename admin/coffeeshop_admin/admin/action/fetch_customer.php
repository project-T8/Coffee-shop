<?php
	require("../connect.php");
	$cus_id = $_GET['cus_id'];
	$sql = "SELECT * FROM customer WHERE id_cus = '$cus_id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
	mysqli_close($con);
?>