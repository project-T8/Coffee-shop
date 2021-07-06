<?php
require("include/dbconnect.php");
$productID = $_GET['productID'];
$sql = "SELECT * FROM new WHERE id_pro=$productID";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
echo json_encode($row);
?>