  <section>
   <style type="text/css">
      .title_login{
         margin: 10px 0;
         padding: 0;
         font-size: 20px;
         text-align: center;
      }
   </style>
         <div class="bg_in">
            <?php 
   if(!empty($_GET['msg'])){
      $msg=unserialize(urldecode($_GET['msg']));
      foreach ($msg as $key => $value) {
         echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
      }
   }
 ?>
            <div class="contact_form">
               <div class="contact_left">
                  <h5 class="title_login">Đăng ký khách hàng</h5>
               <div class="form_contact_in">
                     <div class="box_contact">
                        <form autocomplete="off"  method="POST" action="<?php echo BASE_URL?>khachhang/insert_dangky">
                           <div class="content-box_contact">
                              <div class="row">
                                 <div class="input">
                                    <label>Họ và tên: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtHoTen" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Số điện thoại: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Địa chỉ: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtDiaChi" required class="clsip" >
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Email: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtEmail" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Mật khẩu: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtPass" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row btnclass">
                                 <div class="input ipmaxn ">
                                    <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng ký">
                                 
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="clear"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="contact_right">
                   <h5 class="title_login">Đăng nhập khách hàng</h5>
                  <div class="form_contact_in">
                     <div class="box_contact">
                        <form autocomplete="off"  method="post" action="<?php echo BASE_URL?>khachhang/login_customer" >
                           <div class="content-box_contact">
                             
                              <div class="row">
                                 <div class="input">
                                    <label>Email: <span style="color:red;">*</span></label>
                                    <input type="text" name="username" onchange="return KiemTraEmail(this);" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                               <div class="row">
                                 <div class="input">
                                    <label>Password: <span style="color:red;">*</span></label>
                                    <input type="password" name="password" onchange="return KiemTraEmail(this);" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row btnclass">
                                 <div class="input ipmaxn ">
                                    <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng nhập">
                                    
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="clear"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </section>