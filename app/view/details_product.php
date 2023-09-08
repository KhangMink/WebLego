<?php 
               foreach($details_product as $key =>$value){   
                      $name_product=$value['title_product']; 
                      $name_category=$value['title_category_product'];
                  }   
         ?> 
  <section>
      <?php 
          foreach($details_product as $key =>$details){  
       ?>  <form action="<?php echo BASE_URL ?>giohang/themgiohang" method="POST">
                    <input type="hidden" value="<?php echo $details['id_product'] ?>" name="product_id">
                    <input type="hidden" value="<?php echo $details['title_product'] ?>" name="product_title">
                     <input type="hidden" value="<?php echo $details['image_product'] ?>" name="product_image">
                      <input type="hidden" value="<?php echo $details['price_product'] ?>" name="product_price">
                       <input type="hidden" value="1" name="product_quantity">
         <div class="bg_in">
            <div class="wrapper_all_main">
               <div class="wrapper_all_main_right no-padding-left" style="width:100%;">
                 
                  <div class="breadcrumbs">
                     <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href="<?php echo BASE_URL ?>">
                           <span itemprop="name">Trang chủ</span></a>
                           <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href="<?php echo BASE_URL ?>sanpham/danhmuc/<?php echo $value['id_category_product'] ?>">
                           <span itemprop="name"> <?php echo $name_category ?></span></a>
                           <meta itemprop="position" content="2" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                           <span itemprop="item">
                           <strong itemprop="name">
                           <?php echo $name_product ?>
                           </strong>
                           </span>
                           <meta itemprop="position" content="3" />
                        </li>
                     </ol>
                  </div>
                  <div class="content_page">
                     <div class="content-right-items margin0">
                        <div class="title-pro-des-ct">
                           <h1> <?php echo $name_product ?></h1>
                        </div>
                        <div class="slider-galery ">
                         <div id="sync1" class="owl-carousel owl-theme">
                                  <div class="item">
                                      <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                                  </div>
                                             
                                  </div>

                                  <div id="sync2" class="owl-carousel owl-theme">
                                     <div class="item">
                                      <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                                  </div>
                                   </div> 
                           
                        </div>
                        <div class="content-des-pro">
                           <div class="content-des-pro_in">
                              <div class="pro-des-sum">
                                 <div class="price">
                                   <!--  <p class="code_skin" style="margin-bottom:10px">
                                       <span>Mã hàng: <a href="chitietsp.php">CRW-W06</a> | Thương hiệu: <a href="">Comrack</a></span>
                                    </p> -->
                                    <div class="status_pro">
                                       <span><b>Trạng thái:</b>  Còn hàng</span>
                                    </div>
                                    <div class="status_pro"><span><b>Xuất xứ:</b>  Việt Nam</span></div>
                                 </div>
                                 <div class="color_price">
                                    <span class="title_price bg_green">Giá bán</span> <?php echo number_format($details['price_product'],0,',','.') ?> <span>vnđ</span>. (GIÁ CHƯA VAT)
                                    <div class="clear"></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="content-pro-des">
                              <div class="content_des">
                                 <?php echo $details['desc_product'] ?>
                              </div>
                           </div>
                           <div class="ct">
                              <div class="number_price">
                              
                                 <div class="clear"></div>
                              </div>
                              <div class="wp_a">
                                   <input style="box-shadow: none;" type="submit" name="add_cart" class="btn btn-success" value="Đặt hàng">  
                        </div>
                                
                                 <div class="clear"></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </form>
                           <div class="tags_products prodcut_detail">
                              <div class="tab_link">
                                 <h3 class="title_tab_link">TAGS: </h3>
                                 <div class="content_tab_link"> <a href="tag/"></a></div>
                              </div>
                           </div>
                        </div>
                        <div class="content-des-pro-suport">
                           <div class="box-setup">
                              <div class="title-setup">
                                 <i class="fa fa-tasks" aria-hidden="true"></i> Dịch vụ &amp; Chú ý
                              </div>
                              <div class="info-setup">
                                 <div class="row-setup">
                                    <p style="text-align:justify">Quý khách vui lòng liên hệ với nhân viên bán hàng theo số điện thoại Hotline sau :</p>
                                    <p><span style="color:#d50100">0338 402 416</span>&nbsp;để biết thêm chi tiết về sản phẩm.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="info-prod prod-price freeship">
                              <span class="title">
                                 <p>
                                    <!-- <img alt="chuyển hàng miễn phí tại thietbivanphong123.com" src="/data/upload/ship-hang-mien-phi.png" style="height:33px; width:60px" /> --> Bạn sẽ được giao hàng miễn phí trong khu vực Thành Phố Thái Nguyên khi mua sản phẩm này.
                                 </p>
                              </span>
                              <span class="row more"><a href="" title="">Xem thêm</a>
                              </span>
                           </div>
                           <div class="bx-contact">
                              <span class="title-cnt">Bạn cần hỗ trợ?</span> 
                              <p>Chat với chúng tôi :</p>
                              <p><img alt="icon skype " src="image/icon skype.png" style="height:24px; width:24px" />&nbsp;<a href="skype:quangtran.123corp?chat">thietbivanphong.com</a></p>
                              <p><img alt="icon skype " src="image/icon skype.png" style="height:24px; width:24px" />&nbsp;<a href="skype:quangtran.123corp?chat">thietbivanphong.com</a></p>
                              <p><img alt="icon skype " src="image/icon skype.png" style="height:24px; width:24px" />&nbsp;<a href="skype:quangtran.123corp?chat">thietbivanphong.com</a></p>
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
               <div class="wrapper_all_main_right">

                  <div class="clear"></div>
                  
                  <script type="text/javascript">
                     CloudZoom.quickStart();
                     
                     jQuery(function($) {
                     
                         var $userName = $('.name');
                     
                         if ($userName.length) {
                     
                             $userName.avatarMe({
                     
                                 className: 'avatar-me',
                     
                                 maxChar: 1
                     
                             });
                     
                         }
                     
                     });
                     
                  </script>
             
                  <div class="dmsub">
                     <div class="tags_products desktop">
                        <div class="tab_link">
                          
                        </div>
                     </div>
                  </div>
            <?php 
            }
          ?>
                  <div class="module_pro_all">
                     <div class="box-title">
                        <div class="title-bar">
                           <h3>Sản phẩm liên quan</h3>
                        </div>
                     </div>
                     <div class="pro_all_gird">
                        <div class="girds_all list_all_other_page ">
                           <?php 
                           foreach($related as $key =>$pro){  
                         ?>
                         <form action="<?php echo BASE_URL ?>hang/themgiohang" method="POST">
                    <input type="hidden" value="<?php echo $pro['id_product'] ?>" name="product_id">
                    <input type="hidden" value="<?php echo $pro['title_product'] ?>" name="product_title">
                     <input type="hidden" value="<?php echo $pro['image_product'] ?>" name="product_image">
                      <input type="hidden" value="<?php echo $pro['price_product'] ?>" name="product_price">
                       <input type="hidden" value="1" name="product_quantity">

                  <div class="grids">
                     <div class="grids_in">
                        <div class="content">
                        <div class="img-right-pro">   
                           <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham/<?php echo $pro['id_product'] ?>">
                           <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro['image_product'] ?>" data-original="image/iphone.png" alt=" <?php echo $pro['title_product'] ?>" />
                           </a>

                           <div class="content-overlay"></div>
                           <div class="content-details fadeIn-top">
                             <ul class="details-product-overlay">
                               <a style="height:50px; box-shadow:none; padding-left: 65px;" class="btn btn-danger" href="<?php echo BASE_URL?>sanpham/chitietsanpham/<?php echo $pro['id_product'] ?>">Đặt hàng</a>                           

                             </ul>
                            
                           </div>
                        </div>
                        <div class="name-pro-right">
                           <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham/<?php echo $pro['id_product'] ?>">
                              <h3> <?php echo $pro['title_product'] ?></h3>
                           </a>
                        </div>
                        <div >    
                            <?php if(isset($_SESSION['customer'])){
                            ?>
                          <input style="box-shadow: none;" type="submit" name="add_cart" class="btn btn-success" value="Thêm vào giỏ hàng">
                           <?php 
                               }
                         ?>  
                        </div>
                        <div class="price_old_new">
                           <div class="price">
                              <span class="news_price"> <?php echo number_format($pro['price_product'],0,',','.').'vnđ' ?> </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
                  </form>  
               <?php 
               } ?>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
              
               <!--end:left-->
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <script>
            jQuery(document).ready(function() {
            
            
            
                var div_fixed = jQuery('.product_detail_info').offset().top;
            
                jQuery(window).scroll(function() {
            
                    if (jQuery(window).scrollTop() > div_fixed) {
            
                        jQuery('.tabs-animation').addClass('fix_top');
            
                    } else {
            
                        jQuery('.tabs-animation').removeClass('fix_top');
            
                    }
            
                });
            
                jQuery(window).load(function() {
            
                    if (jQuery(window).scrollTop() > div_fixed) {
            
                        jQuery('.tabs-animation').addClass('fix_top');
            
                    }
            
                });
            
            });
            
         </script>
      </section>