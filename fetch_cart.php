<?php 

session_start();

$total_price=0;
$total_item = 0;
$so_luong = 1;
//khai báo biến output biểu diễn html
$output ='
	<div class="table-reponsive" id="oder_table">
		<table class="table table-striped">
				<tr>
					<th width="30%" style=" text-align:center">Tên sản phẩm</th>
					<th width="20%" style=" text-align:center">Số lượng</th>
					<th width="15%" style=" text-align:center">Giá</th>
					<th width="20%" style=" text-align:center">Tổng cộng</th>
					<th witdh="5%" style=" text-align:center">Thao tác</th>
				</tr>
';
if(!empty($_SESSION["gio_hang"]))
{
	foreach($_SESSION["gio_hang"] as $keys => $values)
	{
		$output .='
		<tr>
			<td align="center">'.$values["product_name"].'</td>
			<td align="center"><button id="'.$values["product_id"].'" class="min" style="border:none;background:none;padding-right:20px">-</button><span id="quantity">'.$values["so_luong"].'</span><button id="'.$values["product_id"].'" class="plus" style="border:none;background:none;padding-left:20px">+</button></td>
			<td align="right">'.number_format((float)$values["product_price"]*1000,0,".",",").'</td>
			<td align="right">'.number_format((int)$values["product_price"]*$values["so_luong"]*1000,0,".",",").'</td>
			<td align="center"><button name="delete" class="btn btn-danger btn-xs	delete" id="'.$values["product_id"].'">Xóa</button></td>
		</tr>
		';
		(int)$total_price = (int)$total_price + (int)$values["product_price"]*$values["so_luong"];
		$total_item++;
	}
$output .='
	<tr>
			<td colspan="3" align="right">Tổng cộng</td>
			<td align="right">'.number_format((int)$total_price*1000,0,".",",").'</td>
			<td></td>
	</tr>
';
}
else
{
	$output .='
		<tr>
			<td colspan="5" align="center">
				Giỏ hàng trống!
			</td>
		</tr>
	';
}
$output .= '</table></div>';
$data = array(
	'cart_detail' 	=> $output,
	'total_price' 	=> $total_price,
	'total_item' 	=> $total_item
);
echo json_encode($data);
?>
