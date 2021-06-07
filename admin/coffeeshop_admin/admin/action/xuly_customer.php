<?php
require("../connect.php");
if(isset($_POST['action'])){
	if($_POST['action']== "edit"){
		$id = $_POST['cus_id'];
		$pass = $_POST['cus_pass'];
		$lname = $_POST['cus_lname'];
		$fname = $_POST['cus_fname'];
		$email = $_POST['cus_email'];
		$phone = $_POST['cus_phone'];
		$address = $_POST['cus_add'];
		$status = $_POST['status'];
		$sql = "UPDATE customer SET lastname='$lname', firstname='$fname',
	email='$email', phone='$phone', address='$address', password='$pass',clocked='$status' WHERE id_cus='$id'; ";
			mysqli_query($con, $sql);
	}
}
mysqli_close($con);
?>