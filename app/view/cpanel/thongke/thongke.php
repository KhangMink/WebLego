 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <title>Document</title>
 </head>
 <body>
   <style>

table, td {
  border: 1px solid;
  text-align: center;
  height: 100px;
  font-size:16px ;
}
label{
  font-size: 20px;
}
th{
  position: sticky;
  top: 0px;
  background-color: teal;
  border: 1px solid;
  text-align: center;
  height: 60px;
  font-size:14px ;
  color: #000;
}

.table_scroll{
  max-height: 400px;
  overflow-y: scroll;
  margin-top: 10px;
  margin-bottom: 10px;

}
</style>
 <h3 style="text-align: center;">Thống kê</h3>
  <form class="search_form" method="GET" action="<?php echo BASE_URL ?>thongke/search">
    <input id="myID" style="font-size:25px" placeholder="Ngày đặt hàng" name="search"/>
    <button style="font-size:25px" type="submit">Thống kê</button>
      </form>
<div class="table_scroll"> 
 <table style="margin-top: 10px;" class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>Ngày đặt</th>
      </tr>
    </thead>  

    <tbody> 
      <?php 
      $i=0;
      $total=0;
      $quantity=0;
      $counts = array();
      $sanphamchaynhat = null; 
    foreach ($thongke as $key => $ord) {
      $i++;
      $total+=$ord['product_quantity']*$ord['price_product'];
      $quantity+=$ord['product_quantity'];
      if (isset($counts[$ord['title_product']])) {
        $counts[$ord['title_product']]++;
     } else {
        $counts[$ord['title_product']] = 1;
      }
      $maxCount = 0;
     
      foreach ($counts as $ord['title_product'] => $count) {
          if ($count > $maxCount) {
              $maxCount = $count;
              $sanphamchaynhat = $ord['title_product'];
          }
      }
   ?> 
      <tr>
        <td><?php echo $i  ?></td>
        <td><?php echo $ord['name'] ?></td>
        <td><?php echo $ord['sodienthoai'] ?></td>
        <td><?php echo $ord['diachi'] ?></td>
        <td><?php echo $ord['title_product'] ?></td>
        <td><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $ord['image_product'] ?>" height="100" width="100"></td>
        <td><?php echo $ord['product_quantity'] ?></td>
        <td><?php echo number_format($ord['price_product'],0,',','.').'vnđ' ?></td>
        <td><?php echo number_format($ord['product_quantity']*$ord['price_product'],0,',','.').'vnđ' ?></td>
        <td><?php echo $ord['order_date'] ?></td>
      </tr>
    <?php 
    }
     ?>     
    </tbody>
  </table>
  </div>
<!--   <table style="float: right; margin-top: 15px;">
    <tr>
    <th width="200px">Tổng số sản phẩm bán được</th>
    <th width="200px">Sản phẩm bán chạy nhất</th>
    <th width="200px">Tổng tiền</th>
    </tr>
    <tr>
      <td> <?php echo $quantity?></td>
      <td>Chuột mickey</td>
      <td> <?php echo number_format($total,0,',','.').'vnđ' ?></td>
    </tr>
  </table> -->
<div>
  <label>Tổng số sản phẩm bán được: <?php echo $quantity
    ?></label> 
</div>
<div><label>Sản phẩm bán chạy nhất:<?php echo $sanphamchaynhat ?></label>
  </div>
<label>Tổng tiền : <?php echo number_format($total,0,',','.').'vnđ' ?></label>
 
 </body>
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <script type="text/javascript">
   flatpickr("#myID", {
     dateFormat: "d/m/Y"
   });
 </script>
 </html>

