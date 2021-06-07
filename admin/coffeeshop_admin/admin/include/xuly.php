<?php
	session_start();
	
	if(isset($_POST['action']))
	{
		if($_POST['action'] == "logout")
		{
			unset($_SESSION['ad_name']);
			unset($_SESSION['ad_user']);
			unset($_SESSION['ad_role']);
		}
		
	}
?>