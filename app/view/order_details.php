<?php 
   if(!empty($_GET['msg'])){
      $msg=unserialize(urldecode($_GET['msg']));
      foreach ($msg as $key =>
$value) { echo '<span style="color: blue; font-weight: bold;">'.$value.'</span>'; } } ?>
  <style>
 td {
  height: 100px;
  font-size:16px ;
}
</style>
<section>
    <div class="bg_in">
        <div class="content_page cart_page">
            <div class="breadcrumbs">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="."> <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                            <strong itemprop="name">
                                Đơn hàng của bạn
                            </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
            <div class="box-title">
                <div class="title-bar">
                    <h1>Sản phẩm đã đặt</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
          <table class="table table-hover table-condensed">
                        <thead>
                            <tr class="tr tr_first">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th style="width: 100px;">Số lượng</th>
                                <th>Ngày đặt hàng</th>
                                <th style="width: 120px; text-align: center;"></th>
                            </tr>
                        </thead>
                        <?php 
                        $total=0;
                            foreach ($order_details as $key =>$value) {
                            $subtotal=$value['product_quantity']*$value['price_product'];
                                       $total+=$subtotal;
                         ?>

                        <tr class="tr">
                            <td data-th="Hình ảnh">
                                <div class="col_table_image col_table_hidden-xs"><img src="<?php echo BASE_URL?>public/uploads/product/<?php echo $value['image_product'] ?>" alt="Máy in laser Canon LBP251DW" class="img-responsive" /></div>
                            </td>
                            <td data-th="Sản phẩm">
                                <div class="col_table_name">
                                    <h4 class="nomargin"><?php echo $value['title_product'] ?></h4>
                                </div>
                            </td>

                            <td data-th="Giá">
                                <span class="color_red font_money"><?php echo number_format($value['price_product'],0,',','.').'vnđ' ?></span>
                            </td>
                            <?php if($value['order_status']==2){
                                    ?>
                            <form action="<?php echo BASE_URL?>donhang/capnhatdonhang/<?php echo $value['product_id'] ?>" method="POST">
                                <td data-th="Số lượng">
                                    <div class="clear margintop5">
                                        <div class="floatleft">
                                            <input type="number" min="1" max="20" class="inputsoluong" value="<?php echo $value['product_quantity'] ?>" name="quantity" />
                                        </div>

                                        <div class="floatleft width50">
                                            <button style="box-shadow: none;" class="btn btn-sm btn-danger">
                                                Gửi lại
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </td>
                            </form>
                            <?php 
                                 }else{                                  
                                 ?>
                            <td data-th="Số lượng">
                                <h4 class="nomargin"><?php echo $value['product_quantity'] ?></h4>
                            </td>
                            <?php }
                                 ?>
                            <td data-th="Ngày đặt">
                                <div class="col_table_name">
                                    <h4 class="nomargin"><?php echo $value['order_date'] ?></h4>
                                </div>
                            </td>
                            <?php if($value['order_status']==2){
                                    ?>
                            <td class="actions aligncenter" data-th="">
                                <a style="box-shadow: none; color: white;" href="<?php echo BASE_URL?>donhang/xoadonhang/<?php echo  $value['order_details_id']?>" class="btn btn-sm btn-warning" id="">Hủy</a>
                            </td>
                            <?php } 
                                 ?>
                            <?php if($value['order_status']==1){
                                    ?>
                            <td class="actions aligncenter" data-th="">
                                <label style="color: #0033ff;">Đang giao hàng</label>
                            </td>
                            <?php } 
                                 ?>
                            <?php if($value['order_status']==0){
                                    ?>
                            <td class="actions aligncenter" data-th="">
                                <label>Đã thanh toán</label>
                            </td>
                            <?php } 
                                 ?>
                        </tr>
                    <?php } ?>
            
                              <tr>
                              <td colspan="7" class="textright_text">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thanh toán</span>: 
                                    <span class="text_price color_red"><?php echo number_format($total,0,',','.').'vnđ' ?></span>
                                 </div>
                              </td>
                           </tr>
                    
                    </table> 
                </div>
            </div>
        </div>
    </div>
</section>
