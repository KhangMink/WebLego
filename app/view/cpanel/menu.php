	<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		    	<a  class="navbar-brand" href="<?php echo BASE_URL ?>">Trang chủ</a>
		     
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="<?php echo BASE_URL ?>customer/list_customer">Khách hàng</a></li>
		        <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục bài viết
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo BASE_URL ?>post">Thêm</a></li>
		          <li><a href="<?php echo BASE_URL ?>post/list_category">Liệt kê</a></li>     
		        </ul>
		      </li>
		       <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bài viết
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo BASE_URL ?>post/add_post">Thêm</a></li>
		          <li><a href="<?php echo BASE_URL ?>post/list_post">Liệt kê</a></li>     
		        </ul>
		      </li>
		        <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục sản phẩm
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo BASE_URL ?>product">Thêm</a></li>
		          <li><a href="<?php echo BASE_URL ?>product/list_category">Liệt kê</a></li>     
		        </ul>
		      </li>
		       <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		           <li><a href="<?php echo BASE_URL ?>product/add_product">Thêm</a></li>
		          <li><a href="<?php echo BASE_URL ?>product/list_product">Liệt kê</a></li>
		        </ul>
		      </li>
		       <li class="">
		        <a href="<?php echo BASE_URL ?>order">Đơn hàng</a>
		      </li>
		        <li class="">
		        <a href="<?php echo BASE_URL ?>thongke">Thống kê</a>
		      </li>
		      <li class=""><a href="<?php echo BASE_URL ?>login/logout">Đăng xuất</a></li>	      
		    </ul>
		  </div>
		</nav>