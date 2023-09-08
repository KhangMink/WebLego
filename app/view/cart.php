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
                        Mua hàng
                        </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                     </li>
                  </ol>
               </div>
               <div class="box-title">
                  <div class="title-bar">
                     <h1>Sản phẩm của bạn</h1>
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
                              <th >Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th >Giá</th>
                              <th style="width:100px;">Số lượng</th>
                              <th>Thành tiền</th>
                              <th style="width:50px; text-align:center;"></th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php 
                                 if(isset($_SESSION['shopping_cart'])){
                           ?>
                           <form action='<?php echo BASE_URL ?>giohang/updategiohang' method="POST">
                              <?php
                                    $total=0;
                                    foreach($_SESSION['shopping_cart'] as $key  =>$value ){
                                       $subtotal=$value['product_quantity']*$value['product_price'];
                                       $total+=$subtotal;
                               ?>
                              <tr class="tr">
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs"><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['product_image']  ?>" alt="<?php echo $value['product_title'] ?>" class="img-responsive"/></div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['product_title'] ?></h4>
                                    </div>
                                 </td>                             
                                 <td data-th="Giá"><span class="color_red font_money"> <?php echo number_format($value['product_price'],0,',','.').'vnđ' ?></span></td>
                                 <td data-th="Số lượng">
                                    <div class="clear margintop5">
                                       <div class="floatleft">
                                          <input type="number" min="1" max="20"class="inputsoluong" name="qty[<?php echo $value['product_id']  ?>]"  value="<?php echo $value['product_quantity'] ?>"></div>                                   
                                       <div class="floatleft width50">
                                          <button name="update_cart" class="btn_df btn_table_td_rf_del btn-sm">
                                          <i class="fa fa-refresh"></i></button>
                                       </div>
                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td data-th="Thành tiền" class="text_center"><span class="color_red font_money"><?php echo number_format($subtotal,0,',','.').'vnđ' ?></span></td>
                                 <td class="actions aligncenter" data-th="">
         
                                    <button style="box-shadow: none;"
                                  type="submit" value="<?php echo  $value['product_id'] ?>" name="delete_cart" class="btn btn-sm btn-warning" id="">Xóa</button>                          
                                 </td>
                              </tr>
                              <?php                  
                              }
                               ?>
                           </form>
                           <tr>
                              <td colspan="7" class="textright_text">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thành toán</span>: 
                                    <span class="text_price color_red"><?php echo number_format($total,0,',','.').'vnđ' ?></span>
                                 </div>
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
                  <div class="contact_form">
                     <div class="contact_left">
                        <div class="ch-contacts-details">
                           <ul class="contact-list">
                              <li class="addr">
                                 <strong class="title">Địa chỉ của chúng tôi</strong>
                                 <p><em><strong></strong></em><br />
                                 <p>Trung Tâm Bán Hàng:</p>
                                 <p>CN1: 333B Minh Phụng, Phường Tân Thành, TP.Thái Nguyên, Tỉnh Thái Nguyên</p>
                                 <p>CN2: 60 , Phường Tân Thịnh, TP.Thái Nguyên, Tỉnh Thái Nguyên</p>
                                 <p> Hotline: 0983 386 010 - 0338 402 416 (zalo)</p>
                                 </p>
                              </li>
                           </ul>
                           <div class="hiring-box">
                              <strong class="title">Chào bạn!</strong>
                              <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>legoworld@gmail.com</strong> 
                            </p>
                              <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                           </div>
                        </div>
                     </div>
                     <div class="contact_right">

                          
                       
                        <div class="form_contact_in">
                           

                            <?php 
                              if(isset($_SESSION['customer'])){
                           ?>                            
                              <div class="box_contact">                           
                              
                              <form autocomplete="off" name="FormDatHang" method="POST" action="<?php echo BASE_URL ?>giohang/dathang" >
                                 <div class="content-box_contact">
                                    <div class="row">
                                       <div class="input">
                                          <label>Họ và tên: <span style="color:red;">*</span></label>
                                          <input type="text" name="name" required class="clsip" value="<?php echo $_SESSION['customer_name'] ?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                              
                                    <div class="row">
                                       <div class="input">
                                          <label>Số điện thoại: <span style="color:red;">*</span></label>
                                          <input type="text" name="sodienthoai" required onkeydown="return checkIt(event)" class="clsip"value="<?php echo $_SESSION['customer_phone'] ?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                
                                    <div class="row">
                                       <div class="input">
                                          <label>Địa chỉ: <span style="color:red;">*</span></label>
                                          <input type="text" name="diachi" required class="clsip" value="<?php echo $_SESSION['customer_address'] ?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                
                                    <div class="row">
                                       <div class="input">
                                          <label>Email: <span style="color:red;">*</span></label>
                                          <input type="text" name="email" onchange="return KiemTraEmail(this);" required class="clsip"value="<?php echo $_SESSION['customer_email'] ?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                               
                                    <div class="row">
                                       <div class="input">
                                          <label>Nội dung: </label>
                                          <textarea type="text" name="noidung" class="clsipa"></textarea>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                              
                                    <div class="row btnclass">
                                       <div class="input ipmaxn ">
                                          <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Gửi đơn hàng">
                                          <input type="reset" class="btn-gui" value="Nhập lại">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                  
                                    <div class="clear"></div>
                                 </div>
                              </form>
                             
                           </div> 
                               
                           <?php 
                           }else{
                              ?> 
                               <form action="<?php echo BASE_URL?>khachhang/dangnhap">  
                                  <input style="float: right;" type="submit" class="btn-gui" value="Đặt hàng">   
                           <?php 
                              } 
                           ?>                        
                            </form> 
                       
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
        <div class="clear"></div>