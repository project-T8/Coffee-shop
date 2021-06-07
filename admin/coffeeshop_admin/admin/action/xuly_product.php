<?php
if(isset($_POST['action']))
{
	if($_POST['action'] == "add_product")
		{
			$name_pro = strtoupper($_POST['name_pro']);
			$price_pro = $_POST['price_pro'];
			$img_pro = $_POST['img_pro'];
			$info_pro = $_POST['info_pro'];
			$status_pro = $_POST['status_pro'];
			$type_pro = $_POST['type_pro'];
			require("../connect.php");
			$sql = "INSERT INTO product (name,info,price,image,id_status,id_type)
			VALUES ('$name_pro','$info_pro','$price_pro','$img_pro','$status_pro','$type_pro')";
			$result = mysqli_query($con,$sql);
			mysqli_close($con);
		}
	if($_POST['action'] == "del_pro")
	{
		$id_pro = $_POST['id_pro'];
		require("../connect.php");
		$sql = "DELETE FROM product  WHERE id_pro = $id_pro";
		mysqli_query($con,$sql);
		mysqli_close($con);
	}
	if($_POST['action'] == "edit_product")
		{
			$id = $_POST['id_pro'];
			$name_pro = $_POST['name_pro'];
			$price_pro = $_POST['price_pro'];
			$img_pro = $_POST['img_pro'];
			$info_pro = $_POST['info_pro'];
			$status_pro = $_POST['status_pro'];
			$type_pro = $_POST['type_pro'];
			require("../connect.php");
			$sql = "UPDATE product SET name='$name_pro',info ='$info_pro',price ='$price_pro',image='$img_pro' 
			,id_status='$status_pro',id_type ='$type_pro' WHERE id_pro='$id';";
			$result = mysqli_query($con,$sql);
			mysqli_close($con);
		}
}
?>