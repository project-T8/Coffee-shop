<?php
	require("../connect.php");
	$id_pro = $_GET['id_pro'];
	$sql= "SELECT * FROM product WHERE id_pro = $id_pro";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
	mysqli_close($con);
	
?>