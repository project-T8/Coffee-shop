<?php

session_start();

$total_price = 0;
$total_item = 0;
$output='';
if(!empty($_SESSION["gio_hang"]))
{
	foreach($_SESSION["gio_hang"] as $keys => $values)
	{ 
		$output.='
		<div class="uk-grid-small uk-padding-remove-bottom uk-grid">
			<div class="tch-text-bold uk-text-center uk-width-auto uk-first-column" >
				<button id="'.$values["product_id"].'" class="tru" style="border:none;background:none;padding-right:20px">-</button>
					<span class="uk-label uk-label-warning" id="quantity">'.$values["so_luong"].'</span>
				<button id="'.$values["product_id"].'" class="cong" style="border:none;background:none;padding-left:20px">+</button>
			</div>
			<div class="uk-description-list uk-width-expand">
				<p class="tch-text-bold">'.$values["product_name"].'</p>
			</div>
			<div class="uk-width-auto">'.number_format((float)$values["product_price"]*$values["so_luong"]*1000,0,".",",").' ';
			$output.='</div>
			</div>';
	(float)$total_price = (float)$total_price + (float)$values["product_price"]*$values["so_luong"];
	$total_item++;
	}
}
$data = array(
	'payment_detail'  => $output,
	'total_price' 	  => number_format($total_price*1000,0,".",","),
	'total_item' 	  => $total_item,0,".",","
);
echo json_encode($data);
?>