
<?php 
$con = mysqli_connect("localhost", "root", "", "CoffeeShop"); 
if (!$con) {
 die("Không tìm thấy cơ sở dữ liệu");
} mysqli_query($con,"SET NAMES utf8"); ?>