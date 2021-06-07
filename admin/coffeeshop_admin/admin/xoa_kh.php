<?php
   require("connect.php");
      $id = $_GET['cus_id'];
      $sql = "DELETE FROM customer WHERE id_cus='$id'";
      $query = mysqli_query($con, $sql);
?>
