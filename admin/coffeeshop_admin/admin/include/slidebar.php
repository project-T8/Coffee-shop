    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
	<?php $url=$_SERVER['PHP_SELF']; 
		$index = strpos($url,"index.php");
		$customer = strpos($url,"quanlykhachhang.php");
		$product = strpos($url,"quanlysanpham.php");
		$bill = strpos($url,"quanlydonhang.php");
		$employee = strpos($url,"quanlynhanvien.php");?>
      <div class="logo">
          <a href="./quanlykhachhang.php" class="simple-text logo-normal">
              <img src="../assets/img/logocafe.png" height="80px" width="100px"><br/>
              THE COFFEE SHOP ADMIN
          </a>
      </div>
      <div class="sidebar-wrapper">
          <ul class="nav">
              <!----admin-->
			   <li class="nav-item <?php if($index>0) echo "active"; ?>">
                  <a class="nav-link" href="./index.php">
                      <i class="material-icons">home</i>
                      <p>Trang chủ admin</p>
                  </a>
              </li>
              <li class="nav-item <?php if($customer>0) echo "active"; ?>">
                  <a class="nav-link" href="./quanlykhachhang.php">
                      <i class="material-icons">person</i>
                      <p>Quản lý khách hàng</p>
                  </a>
              </li>
              <li class="nav-item <?php if($product>0) echo "active"; ?> ">
                  <a class="nav-link" href="./quanlysanpham.php">
                      <i class="material-icons">content_paste</i>
                      <p>Quản lý sản phẩm</p>
                  </a>
              </li>
              <li class="nav-item <?php if($id_pro>0) echo "active"; ?> ">
                  <a class="nav-link" href="./quanlytintuc.php">
                  <i class="material-icons">library_books</i>
                      <p>Quản lý Tin Tức</p>
                  </a>
              </li>
              <li class="nav-item <?php if($bill>0) echo "active"; ?>">
                  <a class="nav-link" href="./quanlydonhang.php">
                      <i class="material-icons">library_books</i>
                      <p>Quản lý đơn hàng</p>
                  </a>
              </li>
			  <li class="nav-item <?php if($employee>0) echo "active"; ?>">
                  <a class="nav-link" href="./quanlynhanvien.php">
                      <i class="material-icons">work</i>
                      <p>Quản lý nhân viên</p>
                  </a>
              </li>
          </ul>
      </div>
    </div>