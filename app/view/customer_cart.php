      <section>
         <div class="bg_in">
            <div class="content_page cart_page">
               <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                        <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                        <strong itemprop="name">
                        Giỏ hàng
                        </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                     </li>
                  </ol>
               </div>
               <div class="box-title">
                  <div class="title-bar">
                     <h1>Giỏ hàng của bạn</h1>
                  </div>
               </div>
                <?php 
                  if(!empty($_GET['msg'])){
                     $msg=unserialize(urldecode($_GET['msg']));
                     foreach ($msg as $key => $value) {
                        echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
                     }
                  }
                ?>
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                              <th>STT</th>
                              <th >Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th >Giá</th>
                              <th style="width:100px;"></th>
                              <th></th>
                              <th style="width:50px; text-align:center;"></th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=0;
                           foreach($cart as $key  =>$value ){
                            $i++;
                        ?>
                        <form action='<?php echo BASE_URL ?>giohang/themgiohang' method="POST">
                        <input type="hidden" value="<?php echo $value['id_cart'] ?>" name="cart_id">
                        <input type="hidden" value="<?php echo $value['id_product'] ?>" name="product_id">
                        <input type="hidden" value="<?php echo $value['title_product'] ?>" name="product_title">
                        <input type="hidden" value="<?php echo $value['image_product'] ?>" name="product_image">
                        <input type="hidden" value="<?php echo $value['price_product'] ?>" name="product_price">
                        <input type="hidden" value="1" name="product_quantity">
                       
                              <tr class="tr">
                                 <td><?php echo $i ?></td>
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs"><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['image_product']  ?>" alt="<?php echo $value['title_product'] ?>" class="img-responsive"/></div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['title_product'] ?></h4>
                                    </div>
                                 </td>                             
                                 <td data-th="Giá"><span class="color_red font_money"> <?php echo number_format($value['price_product'],0,',','.').'vnđ' ?></span></td>
                                 <td data-th="">
                                    <input type="submit" class="btn btn-danger" name="dathang" value="Đặt hàng">
                                 </td>
                                 <td data-th="">
                                    
                                 </td>
                              
                                  </form> 
                                     <td class="actions aligncenter" data-th="">
                                    <a style="box-shadow: none; color: white;"
                                  href="<?php echo BASE_URL?>hang/xoagiohang/<?php echo  $value['id_cart']  ?>"class="btn btn-sm btn-warning" id="">Xóa</a>                          
                                 </td>
                              </tr>                       
                           
                                <?php                  
                              }
                               ?>               
                        </tbody>
                        <tfoot>
                           <tr class="tr_last">
                              <td colspan="7">
                                 <a href="<?php echo BASE_URL ?>" class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                                 <div class="clear"></div>
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
        <div class="clear"></div>