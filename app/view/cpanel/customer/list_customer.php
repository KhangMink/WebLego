 <style>
table, th, td {
  border: 1px solid;
  text-align: center;
  height: 100px;
  font-size:16px ;
}
</style>
<h3 style="text-align: center;">Khách hàng</h3>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên khách hàng </th>
        <th>Số điện thoại</th>
         <th>Địa chỉ</th>
        <th>Email</th>
        <th>Mật khẩu</th>
      </tr>
    </thead>
    <tbody> 
    	<?php 
    	$i=0;
		foreach ($cus as $key => $value) {
			$i++;
	 ?>
      <tr>
        <td><?php echo $i  ?></td>
        <td><?php echo $value['customer_name'] ?></td>
        <td><?php echo $value['customer_phone'] ?></td>
        <td><?php echo $value['customer_address'] ?></td>
        <td><?php echo $value['customer_email'] ?></td>
        <td><?php echo $value['customer_password'] ?></td>
  	<?php 
  	}
  	 ?>
    </tbody>
  </table>