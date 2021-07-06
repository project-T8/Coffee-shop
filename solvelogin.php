<?php
session_start();

require("include/dbconnect.php");	
if(isset($_POST['login'])){	
	
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	$status = "success";
	$sql = "SELECT * FROM customer WHERE username='$user' AND password = '$pass'";
	$result = mysqli_query($con,$sql);
	//$sql2 = "SELECT * FROM employee WHERE username ='$user' AND password = '$pass'";
	//$result2= mysqli_query($con,$sql2);
	if(mysqli_num_rows($result)>0){
		$_SESSION["username"] = $user;
		while($row = mysqli_fetch_assoc($result)){
				$_SESSION['myname']=$row['firstname'];
			}
		$_SESSION['role']='customer';
		echo "yes";
	}
	else{
		echo "no";
	}
}

if(isset($_POST['action'])){
	if($_POST['action'] == 'logout'){
	unset($_SESSION["myname"]);
	unset($_SESSION['role']);
	unset($_SESSION['username']);
}
}

if(isset($_POST['signup'])){
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	$lname = $_POST['lastname'];
	$fname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$sql = "SELECT * FROM customer WHERE username='$user' ";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		echo 'no';
	}
	else {
		$id_cus="";
		$kt=1;
		$sql = "SELECT * FROM customer";
		$result = mysqli_query($con,$sql);
		$number=mysqli_num_rows($result)+1;
		if($number<10) $id_cus="KH000".$number;
		else if($number<100) $id_cus="KH00".$number;
		else if($number<1000) $id_cus="KH0".$number;
		else if($number<10000) $id_cus="KH".$number;
		else {$kt=0; echo 'no';}
		if($kt==1){
			$sql="INSERT INTO customer(id_cus,lastname,firstname,username,password,email,phone,address)
			VALUES('$id_cus','$lname','$fname','$user','$pass','$email','$phone','$address');";
			mysqli_query($con, $sql);
			$_SESSION["username"] = $user;
			$_SESSION["myname"] = $fname;
			$_SESSION['role']='customer';
			echo "yes";
		}
	}
}

if(isset($_POST['update'])){
	$table=$_POST['table'];
	$id=$_POST['id'];
	$pass = $_POST['pass'];
	$lname = $_POST['lastname'];
	$fname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$_SESSION['myname']=$fname;
	if($table=="customer")
	$sql = "UPDATE customer SET lastname='$lname', firstname='$fname',
	email='$email', phone='$phone', address='$address', password='$pass' WHERE id_cus=$id; ";
	//else
	//$sql = "UPDATE employee SET lastname='$lname', firstname='$fname',
	//email='$email', phone='$phone', address='$address', password='$pass' WHERE id_em=$id; ";
	//echo "yes";
	mysqli_query($con,$sql);

}
mysqli_close($con);
?>