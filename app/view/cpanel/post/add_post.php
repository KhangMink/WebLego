<?php 
	if(!empty($_GET['msg'])){
		$msg=unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
		}
	}
 ?>
<h3 style="text-align: center">Thêm bài viết</h3>
<div class="col-md-6">
	<form action="<?php echo BASE_URL ?>post/insert_post" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên bài viết</label>
    <input type="text" name="title_post" class="form-control" id="email">
  </div>
     <div class="form-group">
    <label for="email">Hình ảnh</label>
    <input type="file" name="image_post" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label  for="pwd">Chi tiết bài viết</label>
    <textarea style="resize: none;"rows="10" id="editor" class="form-control" name="content_post"></textarea>
    <!-- <input type="text" name="desc_category_product" class="form-control" id="pwd"> -->
  </div>
   <div class="form-group">
    <label for="pwd">Danh mục bài viết</label>
    <select class="form-control" name="category_post">
      <?php 
        foreach($category as $key => $value){
       ?>
        <option value="<?php echo $value['id_category_post'] ?>"><?php echo $value['title_category_post'] ?></option>
      <?php 
      }
       ?>
    </select>
  </div> 
  <button type="submit" class="btn btn-default">Thêm bài viết</button>
</form>
</div>