<?php 
	if(!empty($_GET['msg'])){
		$msg=unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
		}
	}
 ?>
<h3 style="text-align: center">Cập nhật danh mục bài viết</h3>
<div class="col-md-6">
	<?php 

		foreach ($categorybyid as $key => $value) {

	 ?>
	<form action="<?php echo BASE_URL ?>post/update_category_post/<?php echo $value['id_category_post'] ?>" method="POST">
  <div class="form-group">
    <label for="email">Tên danh mục</label>
    <input type="text" value=" <?php echo $value['title_category_post'] ?> " name="title_category_post" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Mô tả danh mục</label>
    <textarea style="resize: none;"rows="5" class="form-control" name="desc_category_post" ><?php echo $value['desc_category_post'] ?> </textarea>
  </div>
  <button type="submit" class="btn btn-default">Cập nhật danh mục</button>
</form>
	<?php 
	}
	 ?>
</div>