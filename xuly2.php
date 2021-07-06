<?php

//action.php

session_start();

function vn_to_str ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','_',$str);
 
return $str;
 
}
if(isset($_POST["action"]))
{
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
	if($_POST["action"] == 'order')
	{
		$check_cart = "true";
		$check_name = "true";
		$name = $_POST['order_name'];
		
		$check_address = "true";
		$check_phone = "true";
		if(empty($_SESSION['gio_hang']))
		{
			$check_cart = "false";
		}
		if(!preg_match("/([A-Za-z]*\s*)+$/",vn_to_str($name)))
		{
			$check_name = "false";
		}
		if(!preg_match("/^0\d{9,10}$/",$_POST['order_phone']))
		{
			$check_phone = "false";
		}
		$data = array(
			'check_cart'	=> $check_cart,
			'check_name'	=> $check_name,
			'check_address'	=> $check_address,
			'check_phone'	=> $check_phone
		);
		if($check_cart == "true" && $check_name == "true" && $check_address == "true" && $check_phone == "true")
		{
			$total_price = (int)$_POST['total_price']*1000;
			$method = $_POST['method'];
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date = date('Y-m-d H:i:s',time());
			$note = $_POST['order_note'];
			$order_name = $_POST['order_name'];
			$order_address = $_POST['order_address'];
			$order_phone = $_POST['order_phone'];
			$cus_id = $_POST['id_cus'];
			require("include/dbconnect.php");
			
			$sql="INSERT INTO order_bill(cus_id,now,total_price,payment,note,user_name,user_phone,user_address)
				  VALUES('$cus_id','$date','$total_price','$method','$note','$order_name','$order_phone','$order_address');";
			mysqli_query($con,$sql);
			$sql1="SELECT MAX(id_bill) AS new_id FROM order_bill";
			$result=mysqli_query($con,$sql1);
			$row = mysqli_fetch_array($result);
			$id_bill = $row['new_id'];
			foreach($_SESSION["gio_hang"] as $keys => $values)
			{
				
				$pro_id = $values['product_id'];
				$qty = $values['so_luong'];
				$price = (int)$values['product_price']*1000;
				$sql2="INSERT INTO detail_order(id_bill,pro_id,qty,price)
				VALUES('$id_bill','$pro_id','$qty','$price');";
				mysqli_query($con,$sql2);
				
			}
			mysqli_close($con);
			unset($_SESSION["gio_hang"]);
		}
		echo json_encode($data);
	}
}

?>