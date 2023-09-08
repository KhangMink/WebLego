 <?php 
	if(!empty($_GET['msg'])){
		$msg=unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
		}
	}
 ?>
   <style>
table, th, td {
  border: 1px solid;
  text-align: center;
  height: 100px;
  font-size:16px ;
}
</style>
 <h3 style="text-align: center;">Liệt kê đơn hàng chi tiết</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tên người đặt hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Ghi chú</th>
      </tr>
    </thead>
    <tbody> 
      <?php 
      $i=0;

    foreach ($order_infor as $key => $ord) {
      $i++;
  
   ?>
      <tr>
        <td><?php echo $ord['name'] ?></td>
        <td><?php echo $ord['email'] ?></td>
        <td><?php echo $ord['sodienthoai'] ?></td>
        <td><?php echo $ord['diachi'] ?></td>
        <td><?php echo $ord['noidung'] ?></td>
      </tr>
    <?php 
    }
     ?>
    </tbody>
  </table>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
      </tr>
    </thead>
    <tbody> 
    	<?php 
    	$i=0;
      $total=0;
		foreach ($order_details as $key => $ord) {
			$i++;
      $total+=$ord['product_quantity']*$ord['price_product'];
	 ?>
      <tr>
        <td><?php echo $i  ?></td>
        <td><?php echo $ord['title_product'] ?></td>
        <td><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $ord['image_product'] ?>" height="100" width="100"></td>
        <td><?php echo $ord['product_quantity'] ?></td>
        <td><?php echo number_format($ord['price_product'],0,',','.').'vnđ' ?></td>
        <td><?php echo number_format($ord['product_quantity']*$ord['price_product'],0,',','.').'vnđ' ?></td>
       
      </tr>
  	<?php 
  	}
  	 ?>
     <form method="POST" action="<?php echo BASE_URL ?>order/order_confirm/<?php echo $ord['order_code'] ?>">
     <tr> 
        <td><input type="submit" name="xuly" value="Đã xử lý" class="btn btn-default "></td>
      
       <td align="right" colspan="4">Tổng tiền : <?php echo number_format($total,0,',','.').'vnđ' ?></td>
         <td><input type="submit" name="thanhtoan" value="Đã thanh toán" class="btn btn-default "></td>
     </tr>
     </form>
    </tbody>
  </table>