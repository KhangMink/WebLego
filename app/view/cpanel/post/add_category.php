<?php 
	if(!empty($_GET['msg'])){
		$msg=unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
		}
	}
 ?>
<h3 style="text-align: center">Thêm danh mục bài viết</h3>
<div class="col-md-6">
	<form action="<?php echo BASE_URL ?>post/insert_category" method="POST">
  <div class="form-group">
    <label for="email">Tên danh mục</label>
    <input type="text" name="title_category_post" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Mô tả danh mục</label>
    <textarea style="resize: none;"rows="5" class="form-control" name="desc_category_post"></textarea>
    <!-- <input type="text" name="desc_category_product" class="form-control" id="pwd"> -->
  </div>
  <button type="submit" class="btn btn-default">Thêm danh mục</button>
</form>
</div>