<?php 
	if(!empty($_GET['msg'])){
		$msg=unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
		}
	}
 ?>
<h3 style="text-align: center">Cập nhật bài viết</h3>
<div class="col-md-6">
	<?php 

		foreach ($postbyid as $key => $value) {

	 ?>
	<form action="<?php echo BASE_URL ?>post/update_post/<?php echo $value['id_post'] ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên bài viết</label>
    <input type="text" value=" <?php echo $value['title_post'] ?> " name="title_post" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">Hình ảnh</label>
    <input type="file" value=" <?php echo $value['image_post'] ?> " name="image_post" class="form-control" id="email">
    <p><img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $value['image_post'] ?>" height="100" width="100" ></p>
  </div>
  <div class="form-group">
    <label for="pwd">Danh mục</label>
    <select class="form-control" name="category_post">
      <?php 
        foreach($category as $key => $valueCate){
       ?>
        <option <?php if($valueCate['id_category_post']==$value['id_category_post']){echo 'selected';}else echo ''; ?> value="<?php echo $valueCate['id_category_post'] ?>"><?php echo $valueCate['title_category_post'] ?></option>
      <?php 
      }
       ?>
    </select>
  </div> 
  <div class="form-group">
    <label for="pwd">Chi tiết bài viết</label>
    <textarea id="editor" style="resize: none;"rows="10" class="form-control" name="content_post" ><?php echo $value['content_post'] ?> </textarea>
  </div>
  
  <button type="submit" class="btn btn-default">Cập nhật bài viết</button>
</form>
	<?php 
	}
	 ?>
</div>