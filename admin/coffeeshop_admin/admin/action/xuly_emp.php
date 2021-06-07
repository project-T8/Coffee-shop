<?php
if(isset($_POST['action']))
{
	if($_POST['action'] == "add_emp")
	{
		require("../connect.php");
		$lname_emp = $_POST['lastname_emp'];
		$fname_emp = $_POST['firstname_emp'];
		$user_emp = $_POST['user_emp'];
		$pass_emp = $_POST['pass_emp'];
		$phone_emp = $_POST['phone_emp'];
		$email_emp = $_POST['email_emp'];
		$role_emp = $_POST['role_emp'];
		$img_emp = $_POST['img_emp'];
		
		$sql = "INSERT INTO employee (lastname,firstname,username,password,email,phone,id_role,img)
				VALUES ('$lname_emp','$fname_emp','$user_emp','$pass_emp','$email_emp','$phone_emp','$role_emp','$img_emp')";
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
	}
	if($_POST['action'] == "edit_emp")
	{
		require("../connect.php");
		$id_emp = $_POST['id_emp'];
		$lname_emp = $_POST['lastname_emp'];
		$fname_emp = $_POST['firstname_emp'];
		$user_emp = $_POST['user_emp'];
		$pass_emp = $_POST['pass_emp'];
		$phone_emp = $_POST['phone_emp'];
		$email_emp = $_POST['email_emp'];
		$role_emp = $_POST['role_emp'];
		$img_emp = $_POST['img_emp'];
		
		$sql = "UPDATE employee SET lastname = '$lname_emp',firstname = '$fname_emp',username = '$user_emp',password= '$pass_emp',email='$email_emp',phone='$phone_emp',id_role='$role_emp',img='$img_emp' WHERE id_em = '$id_emp'";
		$result= mysqli_query($con,$sql);
		mysqli_close($con);
	}
	if($_POST['action'] == "del_emp")
	{
		require("../connect.php");
		$id_emp = $_POST['id_emp'];
		$sql = "DELETE FROM employee  WHERE id_em = '$id_emp'";
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
	}
}
?>