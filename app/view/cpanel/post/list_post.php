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
 <form class="search_form" method="GET" action="<?php echo BASE_URL ?>post/search_post">
    <input class="searchTerm" name="search" style="font-size:25px" placeholder="Nhập bài viết cần tìm.." />
    <button style="font-size:25px" type="submit">Tìm kiếm</button>
      </form>
 <h3 style="text-align: center;">Liệt kê bài viết </h3>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên bài viết</th>
        <th>Hình ảnh </th>
        <th>Danh mục </th>
        <!-- <th>Chi tiết bài viết </th> -->
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody> 
    	<?php 
    	$i=0;
		foreach ($post as $key => $value) {
			$i++;
	 ?>
      <tr>
        <td><?php echo $i  ?></td>
        <td><?php echo $value['title_post'] ?></td>
        <td><img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $value['image_post'] ?>" height="100" width="100" ></td>
        <td><?php echo $value['title_category_post'] ?></td>
        <!-- <td><textarea><?php echo $value['content_post'] ?></textarea> </td> -->
        <td><a href="<?php echo BASE_URL ?>post/delete_post/<?php echo $value['id_post']  ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>post/edit_post/<?php echo $value['id_post']  ?>">Cập nhật</a></td>
      </tr>
  	<?php 
  	}
  	 ?>
    </tbody>
  </table>