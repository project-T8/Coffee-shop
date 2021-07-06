<?php
if(isset($_POST['action']))
{
	if($_POST['action'] == "add_product")
		{
			$name_pro = strtoupper($_POST['name_pro']);
			$img_pro = $_POST['img_pro'];
			$info_pro = $_POST['info_pro'];
			require("../connect.php");
			$sql = "INSERT INTO new (name,info,image)
			VALUES ('$name_pro','$info_pro','$img_pro')";
			$result = mysqli_query($con,$sql);
			mysqli_close($con);
		}
	if($_POST['action'] == "del_pro")
	{
		$id_pro = $_POST['id_pro'];
		require("../connect.php");
		$sql = "DELETE FROM new  WHERE id_pro = $id_pro";
		mysqli_query($con,$sql);
		mysqli_close($con);
	}
	if($_POST['action'] == "edit_product")
		{
			$id = $_POST['id_pro'];
			$name_pro = $_POST['name_pro'];
			$img_pro = $_POST['img_pro'];
			$info_pro = $_POST['info_pro'];
			require("../connect.php");
			$sql = "UPDATE new SET name='$name_pro',info ='$info_pro',image='$img_pro' 
			 WHERE id_pro='$id';";
			$result = mysqli_query($con,$sql);
			mysqli_close($con);
		}
}
?>