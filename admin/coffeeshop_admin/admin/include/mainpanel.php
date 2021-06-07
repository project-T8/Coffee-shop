<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo">
			  <?php 
			  	if($index>0)
			   		echo "Trang chủ admin";
				if($customer>0)
					echo "Quản lý khách hàng";
				if($product>0)
					echo "Quản lý sản phẩm";
				if($bill>0)
					echo "Quản lý đơn hàng";
				if($employee>0)
					echo "Quản lý nhân viên";		
			   ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

          