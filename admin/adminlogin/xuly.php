<?php
session_start();
require("../../include/dbconnect.php");
if(isset($_POST["action"])){
	$ad_id = $_POST["ad_id"];
	$ad_pass =$_POST["ad_pass"];
	$sql = "SELECT * FROM employee where username = '$ad_id' AND password = '$ad_pass'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while( $row = mysqli_fetch_assoc($result)){
			if($row['id_role'] ==1)
				$_SESSION['ad_role']='admin';
			else $_SESSION['ad_role']='manager';
			$_SESSION['ad_name']=$row['firstname'];
			$_SESSION['ad_user']=$row['username'];
		}
		echo "yes";
	}
	else{
	echo "no";
	}
}
mysqli_close($con);
?>