<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "add")
	{
		if(isset($_SESSION["gio_hang"]))
		{
			$is_available = 0;
			foreach($_SESSION["gio_hang"] as $keys => $values)
			{
				if($_SESSION["gio_hang"][$keys]['product_id'] == $_POST["product_id"])
				{
					$is_available++;
					$_SESSION["gio_hang"][$keys]["so_luong"]++;
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $_POST["product_id"],  
					'product_name'             =>     $_POST["product_name"], 
					'so_luong'				   =>	  "1",
					'product_price'            =>     $_POST["product_price"]  
				);
				$_SESSION["gio_hang"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				'product_id'               =>     $_POST["product_id"],  
				'product_name'             =>     $_POST["product_name"],
				'so_luong'				   =>	  "1",  
				'product_price'            =>     $_POST["product_price"]  
			);
			$_SESSION["gio_hang"][] = $item_array;
		}
	}

	if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["gio_hang"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"])
			{
				unset($_SESSION["gio_hang"][$keys]);
			}
		}
	}
	if($_POST["action"] == 'empty')
	{
		unset($_SESSION["gio_hang"]);
	}
	if($_POST["action"] == 'plus')
	{
		foreach($_SESSION["gio_hang"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"])
				{
					$_SESSION["gio_hang"][$keys]["so_luong"]+=1;
				}
		}
	}
	if($_POST["action"] == 'min')
	{
		foreach($_SESSION["gio_hang"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"] && $values["so_luong"] > 1)
				{
					$_SESSION["gio_hang"][$keys]["so_luong"]--;
				}
		}
	}
	if($_POST["action"] == 'checkout')
	{
		if(isset($_SESSION['username']))
		{
			echo 'yes';
		}
		else
		{
			echo 'no';
		}
	}
}

?>