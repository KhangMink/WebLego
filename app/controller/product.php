<?php 

	class product extends DController{
		function __construct(){
			parent:: __construct();
			}

		public function index(){
			$this->add_category();
		}
		public function add_category(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/add_category');
			$this->load->view('cpanel/footer');
		}
		public function add_product(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_product='tbl_category_product';
			$data['category']=$categorymodel->category($tbl_category_product);
			$this->load->view('cpanel/product/add_product',$data);
			$this->load->view('cpanel/footer');
		}

		public function insert_product(){

			$categorymodel = $this->load->model('categorymodel');
			$tbl_product='tbl_product';
			$title=$_POST['title_product'];
			$desc=$_POST['desc_product'];
			$price=$_POST['price_product'];
			$hot=$_POST['product_hot'];
			$quantity=$_POST['quantity_product'];
			$image=$_FILES['image_product']['name'];
			$tmp_image=$_FILES['image_product']['tmp_name'];
			$div = explode('.', $image);
			$file_ext=strtolower(end($div));
			$unique_image =  $div[0].time().'.'.$file_ext;
			$path_uploads ="public/uploads/product/".$unique_image;
			$category=$_POST['category_product'];
			$i=0;
			$data_title=$categorymodel->title($tbl_product,$title);
			foreach($data_title as $key => $value){
				if($title==$value['title_product']){
						$i=1;
					}else{
						$i=0;
					}
			}
			if($i==1){
				$message['msg']="Sản phẩm đã tồn tại";
				header('Location:'.BASE_URL."product/add_product?msg=".urldecode(serialize($message)));
			}
			else{
				$data = array(
				'title_product'=>$title,
				'desc_product'=>$desc,
				'price_product'=>$price,
				'quantity_product'=>$quantity,
				'image_product'=>$unique_image,
				'id_category_product'=>$category,
				'product_hot'=>$hot				
			);
				$result = $categorymodel->insertproduct($tbl_product,$data);	
				move_uploaded_file($tmp_image, $path_uploads);
				$message['msg']="Thêm sản phẩm thành công";
				header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			}	
			// if($result==1){
			// 	move_uploaded_file($tmp_image, $path_uploads);
			// 	$message['msg']="Thêm sản phẩm thành công";
			// 	header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			// }else{
			// 	$message['msg']="Thêm sản phẩm thất bại";
			// 	header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			// }
		}

		public function insert_category(){

			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_product='tbl_category_product';
			$title=$_POST['title_category_product'];
			$desc=$_POST['desc_category_product'];
			$data = array(
				'title_category_product'=>$title,
				'desc_category_product'=>$desc
			);
			$result = $categorymodel->insertcategory($tbl_category_product,$data);	
			if($result==1){
				$message['msg']="Thêm danh mục sản phẩm thành công";
				header('Location:'.BASE_URL."product/list_category?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Thêm danh mục sản phẩm thất bại";
				header('Location:'.BASE_URL."product/list_category?msg=".urldecode(serialize($message)));
			}
		}

		public function list_product(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$categorymodel = $this->load->model('categorymodel');
			$tbl_product='tbl_product';
			$tbl_category_product='tbl_category_product';
			$data['product']=$categorymodel->product($tbl_product,$tbl_category_product);	
			$this->load->view('cpanel/product/list_product',$data);
			$this->load->view('cpanel/footer');
		}

		public function list_category(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_product='tbl_category_product';
			$data['category']=$categorymodel->category($tbl_category_product);	
			$this->load->view('cpanel/product/list_category',$data);
			$this->load->view('cpanel/footer');
		}

		public function delete_category($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_product='tbl_category_product';
			$cond="id_category_product='$id'";
				
			$result = $categorymodel->deletecategory($tbl_category_product,$cond);	
			if($result==1){
				$message['msg']="Xóa danh mục sản phẩm thành công";
				header('Location:'.BASE_URL."product/list_category?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Xóa danh mục sản phẩm thất bại";
				header('Location:'.BASE_URL."product/list_category?msg=".urldecode(serialize($message)));
			}
		}
		public function delete_product($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_product='tbl_product';
			$cond="id_product='$id'";
				
			$result = $categorymodel->delete_product($tbl_product,$cond);	
			if($result==1){
				$message['msg']="Xóa sản phẩm thành công";
				header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Xóa sản phẩm thất bại";
				header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			}
		}

		public function edit_category($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_product='tbl_category_product';
			$cond="id_category_product='$id'";
			$data['categorybyid']=$categorymodel->categorybyid($tbl_category_product,$cond);	
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/edit_category',$data);
			$this->load->view('cpanel/footer');
		}
		public function edit_product($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_product='tbl_product';
			$tbl_category_product='tbl_category_product';
			$cond="id_product='$id'";
			$data['productbyid']=$categorymodel->productbyid($tbl_product,$cond);
			$data['category']=$categorymodel->category($tbl_category_product);
		
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/edit_product',$data);
			$this->load->view('cpanel/footer');
		}

		public function update_category($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_product='tbl_category_product';
			$cond="id_category_product='$id'";
			$title=$_POST['title_category_product'];
			$desc=$_POST['desc_category_product'];
			$data = array(
				'title_category_product'=>$title,
				'desc_category_product'=>$desc
			);
			$result=$categorymodel->updatecategory($tbl_category_product,$data,$cond);	
			if($result==1){
				$message['msg']="Cập nhật danh mục sản phẩm thành công";
				header('Location:'.BASE_URL."product/list_category?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Cập nhật danh mục sản phẩm thất bại";
				header('Location:'.BASE_URL."product/list_category?msg=".urldecode(serialize($message)));
			}
		}
		public function update_product($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_product='tbl_product';
			$cond="id_product='$id'";
			$title=$_POST['title_product'];
			$image=$_FILES['image_product']['name'];
			$tmp_image=$_FILES['image_product']['tmp_name'];
			$div = explode('.', $image);
			$file_ext=strtolower(end($div));
			$unique_image =  $div[0].time().'.'.$file_ext;
			$path_uploads ="public/uploads/product/".$unique_image;
			$category_product=$_POST['category_product'];
			$price=$_POST['price_product'];
			$hot=$_POST['product_hot'];
			$quantity=$_POST['quantity_product'];
			$desc=$_POST['desc_product'];
			if($image==true){
				$data['productbyid']=$categorymodel->productbyid($tbl_product,$cond);
				foreach ($data['productbyid'] as $key => $value) {				
						$path_unlink="public/uploads/product";
						unlink($path_unlink.$value['image_product']);		
				}	
				$data = array(
				'title_product'=>$title,
				'image_product'=>$unique_image,
				'id_category_product'=>$category_product,
				'price_product'=>$price,
				'quantity_product'=>$quantity,
				'desc_product'=>$desc,
				'product_hot'=>$hot
				);
				move_uploaded_file($tmp_image, $path_uploads);
			}else{

				$data = array(
				'title_product'=>$title,
				'id_category_product'=>$category_product,
				'price_product'=>$price,
				'quantity_product'=>$quantity,
				'desc_product'=>$desc,
				'product_hot'=>$hot
			);
			}		
			$result=$categorymodel->update_product($tbl_product,$data,$cond);	
			if($result==1){				
				$message['msg']="Cập nhật sản phẩm thành công";
				header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Cập nhật sản phẩm thất bại";
				header('Location:'.BASE_URL."product/list_product?msg=".urldecode(serialize($message)));
			}
		}

		public function search_product(){
			$table_product='tbl_product';
			$table_category_product='tbl_category_product';
			$title=$_GET['search'];
			$categorymodel=$this->load->model('categorymodel');
			$data['product']=$categorymodel->search_product_cpanel($table_product,$table_category_product,$title);
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/product/list_product',$data);
			$this->load->view('cpanel/footer');		
		}
	}

 ?>