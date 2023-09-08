<?php 
	if(!empty($_GET['msg'])){
		$msg=unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo '<span style="color:blue; font-weight:bold ">'.$value.'</span>';
		}
	}
 ?>
<h3 style="text-align: center">Cập nhật sản phẩm</h3>
<div class="col-md-6">
	<?php 

		foreach ($productbyid as $key => $value) {

	 ?>
	<form action="<?php echo BASE_URL ?>product/update_product/<?php echo $value['id_product'] ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên sản phẩm</label>
    <input type="text" value=" <?php echo $value['title_product'] ?> " name="title_product" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">Hình ảnh sản phẩm</label>
    <input type="file" value=" <?php echo $value['image_product'] ?> " name="image_product" class="form-control" id="email">
    <p><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['image_product'] ?>" height="100" width="100" ></p>
  </div>
  <div class="form-group">
    <label for="pwd">Danh mục sản phẩm</label>
    <select class="form-control" name="category_product">
      <?php 
        foreach($category as $key => $valueCate){
       ?>
        <option <?php if($valueCate['id_category_product']==$value['id_category_product']){echo 'selected';}else echo ''; ?> value="<?php echo $valueCate['id_category_product'] ?>"><?php echo $valueCate['title_category_product'] ?></option>
      <?php 
      }
       ?>
    </select>
  </div> 
  <div class="form-group">
    <label for="email">Giá sản phẩm</label>
    <input type="text" value=" <?php echo $value['price_product'] ?> " name="price_product" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">Số lượng</label>
    <input type="text" value=" <?php echo $value['quantity_product'] ?> " name="quantity_product" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Mô tả sản phẩm</label>
    <textarea id="editor" style="resize: none;"rows="5" class="form-control" name="desc_product" ><?php echo $value['desc_product'] ?> </textarea>
  </div>
   <label for="pwd">Sản phẩm hot</label>
    <select class="form-control" name="product_hot">
      <?php 
        if($value['product_hot']==0){
       ?>
      <option selected value="0">Không</option>
      <option value="1">Có</option>
     <?php 
      }else{
         ?>
       <option value="0">Không</option>
      <option selected value="1">Có</option>
      <?php 
      } ?>
    </select>
  
  <button type="submit" class="btn btn-default">Cập nhật sản phẩm</button>
</form>
	<?php 
	}
	 ?>
</div>