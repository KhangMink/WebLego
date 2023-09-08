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
 <form class="search_form" method="GET" action="<?php echo BASE_URL ?>product/search_product">
    <input class="searchTerm" name="search" style="font-size:25px" placeholder="Nhập sản phẩm cần tìm.." />
    <button style="font-size:25px" type="submit">Tìm kiếm</button>
      </form>
 <h3 style="text-align: center;">Liệt kê sản phẩm </h3>
 <table class="table text-center w-100">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên sản phẩm </th>
        <th>Hình ảnh </th>
        <th>Danh mục </th>
        <th>Giá </th>
        <th>Số lượng </th>
        <th>Hot </th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody> 
    	<?php 
    	$i=0;
		foreach ($product as $key => $value) {
			$i++;
	 ?>
      <tr>
        <td><?php echo $i  ?></td>
        <td><?php echo $value['title_product'] ?></td>
        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['image_product'] ?>" height="100" width="100" ></td>
        <td><?php echo $value['title_category_product'] ?></td>
        <td><?php echo number_format($value['price_product'],0,',','.').'vnđ' ?></td>
        <td><?php echo $value['quantity_product'] ?></td>
        <td>
          <?php 
            if($value['product_hot']==0){
              echo "Không có";
            }else
              echo "Có";
           ?>
        </td>
        <td><a href="<?php echo BASE_URL ?>product/delete_product/<?php echo $value['id_product']  ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>product/edit_product/<?php echo $value['id_product']  ?>">Cập nhật</a></td>
      </tr>
  	<?php 
  	}
  	 ?>
    </tbody>
  </table>