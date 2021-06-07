<?php

require("../connect.php");
$bill_id = $_GET['bill_id'];
$output1='';
$output2='<table class="table table-hover table-striped ">
					<thead class="thead-dark">
				      <tr>
				        <th width="30%" style="background-color:purple; text-align:center">Tên sản phẩm</th>
				        <th width="20%" style="background-color:purple; text-align:center">Số lượng</th>
				        <th width="15%" style="background-color:purple; text-align:right">Đơn giá</th>
				        <th width="20%" style="background-color:purple; text-align:right">Thành tiền</th>
				      </tr>
				    </thead>
					 <tbody>';
$output3='';
$sql="SELECT lastname as ln,firstname as fn FROM customer as ctm WHERE ctm.id_cus in(SELECT cus_id FROM order_bill AS od WHERE od.cus_id = ctm.id_cus AND od.id_bill = $bill_id)";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$sql2="SELECT * FROM detail_order WHERE id_bill = $bill_id";
$result2=mysqli_query($con,$sql2);
$total_items = mysqli_num_rows($result2);
$sql3 = "SELECT * FROM order_bill WHERE id_bill =$bill_id";
$result3=mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($result3);
$sql4=	"SELECT p.name as name,d.price as price, d.qty as amount  FROM detail_order as d join product as p on p.id_pro=d.pro_id where id_bill= $bill_id;";
$result4=mysqli_query($con,$sql4);
$output1='<span style="color:purple;">Tên khách hàng:</span><span>  '.$row['ln'].' '.$row['fn'].' </span>
				<span style="color:purple;">Số món: </span><span>    '.$total_items.' </span>
				<span style="color:purple;">Tổng tiền:</span><span>   '.number_format((int)$row3['total_price'],0,".",",").' đ</span>';
while($row4 =mysqli_fetch_array($result4))
{
	$output2.='<tr>
				        <td align="center">'.$row4['name'].'</td>
				        <td align="center">'.$row4['amount'].'</td>
				        <td align="right">'.number_format((int)$row4['price'],0,".",",").' đ</td>
				        <td align="right">'.number_format((int)$row4['price']*$row4['amount'],0,".",",").' đ</td>
				      </tr>
	';
}
$output2.='<tr>
						<td colspan="2" ></td>
						<td style=" font-weight: bold;color:purple;" align="right">Tổng cộng</td>
						<td align="right">'.number_format((int)$row3['total_price'],0,".",",").' đ</td>
					</tr>
					</tbody>
					</table>';
$output3.='<span style="font-weight:bold; color:purple">Người nhận: </span><span style="padding-left:10px;">'.$row3['user_name'].' </span><br>
				<span style="font-weight:bold; color:purple">Số điện thoại liên lạc:</span><span style="padding-left:10px;">'.$row3['user_phone'].' </span><br>
				<span style="font-weight:bold; color:purple">Địa chỉ giao hàng:</span> <span style="padding-left:10px;">'.$row3['user_address'].' </span><br>
				<span style="font-weight:bold; color:purple">Phương thức thanh toán:</span> <span style="padding-left:10px;">'.$row3['payment'].' </span><br>
				<span style="font-weight:bold; color:purple">Ghi chú thêm:</span> <span style="padding-left:10px;"> '.$row3['note'].'</span>';
$data =array(
	'first'		=>		$output1,
	'second'	=>		$output2,
	'third'		=>		$output3
);
echo json_encode($data);
?>