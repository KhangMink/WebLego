   <section>

         <div class="bg_in">
            <div class="breadcrumbs">

                     <ol itemscope itemtype="http://schema.org/BreadcrumbList">

                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

                           <a itemprop="item" href="">

                           <span itemprop="name">Trang chủ</span></a>

                           <meta itemprop="position" content="1" />

                        </li>

                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

                         
                           <span itemprop="name">Sản phẩm hot</span></a>

                           <meta itemprop="position" content="2" />

                        </li>

                       
                     </ol>

                  </div>
         <div class="module_pro_all">
            <div class="box-title">
               <div class="title-bar">
                  <h1>Tất cả sản phẩm hot</h1>
               </div>
            </div>
            <div class="pro_all_gird">
               <div class="girds_all list_all_other_page ">
                  <?php 
                      foreach($product_hot as$key =>$product){       
                   ?>
                  <div class="grids">
                     <div class="grids_in">
                        <div class="content">
                        <div class="img-right-pro">   
                           <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham/<?php echo $product['id_product'] ?>">
                           <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $product['image_product'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                           </a>

                           <div class="content-overlay"></div>
                           <div class="content-details fadeIn-top">
                             <ul class="details-product-overlay">
                                <a style="height:50px; box-shadow:none; padding-left: 45px;" class="btn btn-danger" href="<?php echo BASE_URL?>sanpham/chitietsanpham/<?php echo $product['id_product'] ?>">Đặt hàng</a>                           

                             </ul>
                            
                           </div>
                        </div>
                        <div class="name-pro-right">
                           <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham/<?php echo $product['id_product'] ?>">
                              <h3> <?php echo $product['title_product'] ?></h3>
                           </a>
                        </div>
                        <div class="add_card">
                                <?php if(isset($_SESSION['customer'])){
                             ?>
                             <input style="box-shadow: none;" type="submit" name="add_cart" class="btn btn-success" value="Thêm vào giỏ hàng">
                                 <?php 
                               }
                                 ?>
                        </div>
                        <div class="price_old_new">
                           <div class="price">
                              <span class="news_price"> <?php echo number_format($product['price_product'],0,',','.').'vnđ' ?> </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
                  <?php 

                  } ?>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         
         
      </section>