<?php 

	class post extends DController{
		function __construct(){
			parent:: __construct();
			}

			public function index(){
			$this->add_category();
		}
		public function add_category(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/post/add_category');
			$this->load->view('cpanel/footer');
		}
		public function insert_category(){

			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_post='tbl_category_post';
			$title=$_POST['title_category_post'];
			$desc=$_POST['desc_category_post'];
			$data = array(
				'title_category_post'=>$title,
				'desc_category_post'=>$desc
			);
			$result = $categorymodel->insertcategory_post($tbl_category_post,$data);	
			if($result==1){
				$message['msg']="Thêm danh mục bài viết thành công";
				header('Location:'.BASE_URL."post/list_category?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Thêm danh mục bài viết thất bại";
				header('Location:'.BASE_URL."post/list_category?msg=".urldecode(serialize($message)));
			}
		}
		public function list_category(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_post='tbl_category_post';
			$data['category']=$categorymodel->category_post($tbl_category_post);	
			$this->load->view('cpanel/post/list_category',$data);
			$this->load->view('cpanel/footer');
		}

		public function delete_category($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_post='tbl_category_post';
			$cond="id_category_post='$id'";
				
			$result = $categorymodel->deletecategory_post($tbl_category_post,$cond);	
			if($result==1){
				$message['msg']="Xóa danh mục bài viết thành công";
				header('Location:'.BASE_URL."post/list_category?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Xóa danh mục bài viết thất bại";
				header('Location:'.BASE_URL."post/list_category?msg=".urldecode(serialize($message)));
			}
		}

		public function edit_category($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_post='tbl_category_post';
			$cond="id_category_post='$id'";
			$data['categorybyid']=$categorymodel->categorybyid_post($tbl_category_post,$cond);	
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/post/edit_category',$data);
			$this->load->view('cpanel/footer');
		}

		public function update_category_post($id){
			$categorymodel = $this->load->model('categorymodel');
			$tbl_category_post='tbl_category_post';
			$cond="id_category_post='$id'";
			$title=$_POST['title_category_post'];
			$desc=$_POST['desc_category_post'];
			$data = array(
				'title_category_post'=>$title,
				'desc_category_post'=>$desc
			);
			$result=$categorymodel->updatecategory_post($tbl_category_post,$data,$cond);	
			if($result==1){
				$message['msg']="Cập nhật danh mục bài viết thành công";
				header('Location:'.BASE_URL."post/list_category?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Cập nhật danh mục bài viết thất bại";
				header('Location:'.BASE_URL."post/list_category?msg=".urldecode(serialize($message)));
			}
		}

		public function add_post(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$postmodel=$this->load->model('postmodel');
			$tbl_category_post="tbl_category_post";
			$data['category']=$postmodel->category_post($tbl_category_post);	
			$this->load->view('cpanel/post/add_post',$data);
			$this->load->view('cpanel/footer');
		}

			public function insert_post(){

			$postmodel = $this->load->model('postmodel');
			$tbl_post='tbl_post';
			$title=$_POST['title_post'];
			$content=$_POST['content_post'];
			$image=$_FILES['image_post']['name'];
			$tmp_image=$_FILES['image_post']['tmp_name'];
			$div = explode('.', $image);
			$file_ext=strtolower(end($div));
			$unique_image =  $div[0].time().'.'.$file_ext;
			$path_uploads ="public/uploads/post/".$unique_image;
			$category=$_POST['category_post'];
			$data = array(
				'title_post'=>$title,
				'content_post'=>$content,
				'image_post'=>$unique_image,
				'id_category_post'=>$category				
			);
			$result = $postmodel->insertpost($tbl_post,$data);	
			if($result==1){
				move_uploaded_file($tmp_image, $path_uploads);
				$message['msg']="Thêm bài viết thành công";
				header('Location:'.BASE_URL."post/list_post?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Thêm bài viết thất bại";
				header('Location:'.BASE_URL."post/list_post?msg=".urldecode(serialize($message)));
			}
		}

		public function list_post(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$postmodel = $this->load->model('postmodel');
			$tbl_post='tbl_post';
			$tbl_category_post='tbl_category_post';
			$data['post']=$postmodel->post($tbl_post,$tbl_category_post);	
			$this->load->view('cpanel/post/list_post',$data);
			$this->load->view('cpanel/footer');
		}
		public function delete_post($id){
			$postmodel = $this->load->model('postmodel');
			$tbl_post='tbl_post';
			$cond="id_post='$id'";
				
			$result = $postmodel->delete_post($tbl_post,$cond);	
			if($result==1){
				$message['msg']="Xóa bài viết thành công";
				header('Location:'.BASE_URL."post/list_post?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Xóa bài viết thất bại";
				header('Location:'.BASE_URL."post/list_post?msg=".urldecode(serialize($message)));
			}
		}
		public function edit_post($id){
			$postmodel = $this->load->model('postmodel');
			$tbl_post='tbl_post';
			$tbl_category_post='tbl_category_post';
			$cond="id_post='$id'";
			$data['postbyid']=$postmodel->postbyid($tbl_post,$cond);
			$data['category']=$postmodel->category_post($tbl_category_post);
		
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/post/edit_post',$data);
			$this->load->view('cpanel/footer');
		}
			public function update_post($id){
			$postmodel = $this->load->model('postmodel');
			$tbl_post='tbl_post';
			$cond="id_post='$id'";
			$title=$_POST['title_post'];
			$image=$_FILES['image_post']['name'];
			$tmp_image=$_FILES['image_post']['tmp_name'];
			$div = explode('.', $image);
			$file_ext=strtolower(end($div));
			$unique_image =  $div[0].time().'.'.$file_ext;
			$path_uploads ="public/uploads/post/".$unique_image;
			$category_post=$_POST['category_post'];
			$content=$_POST['content_post'];
			if($image==true){
				$data['postbyid']=$postmodel->postbyid($tbl_post,$cond);
				foreach ($data['postbyid'] as $key => $value) {				
						$path_unlink="public/uploads/post";
						unlink($path_unlink.$value['image_post']);		
				}	
				$data = array(
				'title_post'=>$title,
				'image_post'=>$unique_image,
				'id_category_post'=>$category_post,
				'content_post'=>$content
				);
				move_uploaded_file($tmp_image, $path_uploads);
			}else{

				$data = array(
				'title_post'=>$title,
				'id_category_post'=>$category_post,
				'content_post'=>$content
			);
			}		
			$result=$postmodel->update_post($tbl_post,$data,$cond);	
			if($result==1){				
				$message['msg']="Cập nhật bài viết thành công";
				header('Location:'.BASE_URL."post/list_post?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Cập nhật bài viết thất bại";
				header('Location:'.BASE_URL."post/list_post?msg=".urldecode(serialize($message)));
			}
		}

		public function search_post(){
			$table_post='tbl_post';
			$table_category_post='tbl_category_post';
			$title=$_GET['search'];
			$categorymodel=$this->load->model('categorymodel');
			$data['post']=$categorymodel->search_post_cpanel($table_post,$table_category_post,$title);
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$this->load->view('cpanel/post/list_post',$data);
			$this->load->view('cpanel/footer');		
		}
	}

 ?>