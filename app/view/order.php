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
                    <h1>Đơn hàng đã đặt</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
                       <table class="table table-hover table-condensed">
                        <thead>
                            <tr class="tr tr_first">
                                <th>Đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th></th>
                                <th style="width: 120px; text-align: center;"></th>
                            </tr>
                        </thead>
                        <?php 
                            foreach ($order as $key =>$value) { 
                                ?>
                        <tr class="tr">
                            <td data-th="Đơn hàng">
                                   <div class="col_table_name">
                                    <h4 class="nomargin"><?php echo $value['order_code'] ?></h4>
                                </div>     
                            </td>
                            <td data-th="Ngày đặt">
                                <div class="col_table_name">
                                    <h4 class="nomargin"><?php echo $value['order_date'] ?></h4>
                                </div>
                            </td>
                            <td><a href="<?php echo BASE_URL ?>donhang/chitietdonhang/<?php echo $value['order_code'] ?>">Xem chi tiết đơn</a></td>
                            <?php if($value['order_status']==2){
                                    ?>
                            <td class="actions aligncenter" data-th="">
                                <a style="box-shadow: none; color: white;" href="<?php echo BASE_URL?>donhang/delete/<?php echo  $value['order_code']?>" class="btn btn-sm btn-warning" id="">Hủy đơn</a>
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
                    </table>
 
                </div>
            </div>
        </div>
    </div>
</section>
