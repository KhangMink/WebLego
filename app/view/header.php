 <!DOCTYPE html>
<html lang="en-CA">
<head>
    <title>quanlybanhang</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="icon" href="template/Default/img/favicon.ico" type="image/x-icon" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <!--rieng-->
    <meta property='og:title' name="title" content='' />
    <meta property='og:url' content='' />
    <meta property='og:image' content='' />
    <meta property='og:description' itemprop='description' name="description" content='' />
    <!--rieng-->
    <!--tkw-->
    <meta property="og:type" content="article" />
    <meta property="article:section" content="" />
    <meta property="og:site_name" content='' />
    <meta property="article:publisher" content="" />
    <meta property="article:author" content="" />
    <meta property="fb:app_id" content="1639622432921466" />
    <meta vary="User-Agent" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Ho Chi Minh City" />
    <meta name="geo.position" content="10.823099;106.629664" />
    <meta name="ICBM" content="10.823099, 106.629664" />
    <link rel="icon" type="image/png" href="template/Default/img/favicon.png">
    <!--tkw-->
      <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/owl.theme.default.min.css">
            <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/product.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/style.css">
 
</head>

<body>  
  <header>
        <div class="info_top">
            <div class="bg_in">
                <p class="p_infor">
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: legoworld@gmail.com</span>
                    <span><i class="fa fa-phone" aria-hidden="true"></i> Hotline: 0338-402-416</span>
                </p>
            </div>
        </div>
        <div class="header_top_menu">
            <div class="header_top_menu_all">
                <div class="header_top">
                    <div class="bg_in">
                        <div class="logo">
                            <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL ?>public/image/R.jpg" width="250" height="100" alt="logohere.jpeg" /></a>
                        </div>
                        <nav class="menu_top">
                            <form class="search_form" method="GET" action="<?php echo BASE_URL ?>index/timkiem">
                                <input class="searchTerm" name="search" placeholder="Nhập sản phẩm cần tìm..." />
                                <button class="searchButton" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </nav>
                        <div class="cart_wrapper">
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span><b>Trụ sở chính</b></span>
                                    <br/>
                                    <span class="red">Nguyễn Văn Mười</span>
                                </div>
                            </div>
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span><b>Văn phòng chi nhánh</b></span>
                                    <br/>
                                    <span class="red">Nguyễn Văn Mười</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>  

            </div>
                
            <div class="btn_menu_search">
                <div class="bg_in">
                    <div class="table_row_search">
                        <div class="menu_top_cate">
                            <div class="">
                                <div class="menu" id="menu_cate">
                                    <div class="menu_left">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                    </div>
                                    <div class="cate_pro">
                                        <div id='cssmenu_flyout' class="display_destop_menu">
                                            <ul>
                                                <?php  

                                                    foreach($category as$key =>$value){       
                                                   ?>
                                                <li class='active has-sub'>
                                                    
                                                       <a href='<?php echo BASE_URL ?>sanpham/danhmuc/<?php echo $value['id_category_product'] ?>'><span><?php echo $value['title_category_product'] ?></span></a>
                                                        <?php 
                                                    }
                                                     ?>
                                                </li>
                                 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search_top">
                            <div id='cssmenu'>
                                <ul style="margin-top: 5px;" >
                                    <li class='active'><a href='<?php echo BASE_URL ?>'>Trang chủ</a></li>
                                
                                    <li class=''>

                                        <a href='<?php echo BASE_URL ?>sanpham/tatca'>Sản phẩm</a>

                                        <ul>
                                              <?php  

                                                    foreach($category as $key =>$value){       
                                                   ?>
                                            <li>
                                                <a href='<?php echo BASE_URL ?>sanpham/danhmuc/<?php echo $value['id_category_product'] ?>'><span><?php echo $value['title_category_product'] ?></span></a>          
                                               
                                            </li>

                                                       <?php 
                                                    }
                                                     ?>
                                        </ul>
                                    </li>
                                   
                                    <li class=''><a href='<?php echo BASE_URL ?>tintuc/tatca'>Tin tức</a>
                                        <ul>
                                             <?php  
                                                    foreach($category_post as $key =>$valuepost){       
                                                   ?>
                                                   <li><a href="<?php echo BASE_URL ?>tintuc/danhmuc/<?php echo $valuepost['id_category_post'] ?>"><span><?php echo $valuepost['title_category_post'] ?></span></a></li>
                                                   <?php 
                                                    }
                                                     ?>
                                        </ul>

                                    </li>
                                          
                                       <li class=''><a href='<?php echo BASE_URL ?>giohang'>Mua hàng</a></li>   

                                       <?php 
                                        if(isset($_SESSION['customer'])){
                                        ?>
                                        <li class=''><a href='<?php echo BASE_URL ?>hang'>Giỏ hàng</a></li>   
                                          <li class=''><a href='<?php echo BASE_URL ?>donhang'>Đơn hàng</a></li>   
                                         <li class=''><a href='<?php echo BASE_URL ?>khachhang/dangxuat'>Đăng xuất</a></li>
                                        <?php 
                                        }else{
                                         ?> 
                                          <li class=''><a href='<?php echo BASE_URL ?>khachhang/dangnhap'>Khách hàng</a></li>                                         
                                     <?php 
                                        } 
                                        ?>
                                    <li> <a style="color:#fffff; float: right;" href='<?php echo BASE_URL ?>login'>ADMIN</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>
    <div class="clear"></div>