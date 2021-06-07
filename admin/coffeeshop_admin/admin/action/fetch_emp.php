<?php
	require("../connect.php");
	$id_emp = $_GET['id_emp'];
	$sql = "SELECT * FROM employee WHERE id_em = $id_emp";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
	mysqli_close($con);
?>