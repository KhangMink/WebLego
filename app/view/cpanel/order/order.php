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
  <form class="search_form" method="GET" action="<?php echo BASE_URL ?>order/search">
    <input style="font-size:25px" placeholder="Nhập code đơn hàng" name="search"/>
    <button style="font-size:25px" type="submit">Tìm kiếm</button>
      </form>
 <h3 style="text-align: center;">Liệt kê danh mục đơn hàng</h3>
 <table style="margin-top: 10px;" class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Code đơn hàng</th>
        <th>Ngày đặt</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody> 
    	<?php 
    	$i=0;
		foreach ($order as $key => $ord) {
			$i++;
	 ?>
      <tr>
        <td><?php echo $i  ?></td>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_date'] ?></td>
        <td><?php if($ord['order_status']==0){
        					echo 'Đơn hàng mới';
        				}else if($ord['order_status']==1){
        					echo 'Đã xử lý';
                }else if($ord['order_status']==2){
                  echo 'Đã thanh toán';
    					 }
              ?></td>
        <td><a href="<?php echo BASE_URL ?>order/order_details/<?php echo $ord['order_code']  ?>">Xem đơn hàng</a>|| <a href="<?php echo BASE_URL ?>order/delete_order/<?php echo $ord['order_code']  ?>">Hủy đơn hàng</a></td></td>

      </tr>
  	<?php 
  	}
  	 ?>
    </tbody>
  </table>