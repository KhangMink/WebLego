<?php 

	class tintuc extends DController{

		function __construct(){
			$data = array();
			parent:: __construct();
			}

			public function index(){
				$this->danhmuc();	
			}
			public function tatca(){
				Session::init();
				$table='tbl_category_product';
				$table_cate_post='tbl_category_post';
				$table_post='tbl_post';
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_cate_post);
				$data['list_post']=$categorymodel->list_post_home($table_post);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('list_post',$data);		
				$this->load->view('footer');	
			}
			public function danhmuc($id){
				Session::init();
				$table='tbl_category_product';
				$table_cate_post='tbl_category_post';
				$table_post='tbl_post';
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_cate_post);
				$data['postbyid']=$categorymodel->postbyid_home($table_cate_post,$table_post,$id);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('categorypost',$data);		
				$this->load->view('footer');	
			}
			public function chitiettintuc($id){
				Session::init();
				$table='tbl_category_product';
				$table_cate_post='tbl_category_post';
				$table_post='tbl_post';
				$categorymodel=$this->load->model('categorymodel');
				$cond="$table_cate_post.id_category_post=$table_post.id_category_post AND $table_post.id_post='$id'";
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_cate_post);
				$data['postbyid']=$categorymodel->postbyid_home($table_cate_post,$table_post,$id);
				$data['details_post']=$categorymodel->details_post_home($table_cate_post,$table_post,$cond);

				foreach($data['details_post'] as $key => $cate){ 
					$id_cate=$cate['id_category_post'];

				 }
				 $cond_related="$table_post.id_category_post = $table_cate_post.id_category_post AND $table_cate_post.id_category_post='$id_cate' AND $table_post.id_post NOT IN('$id') ";
				 $data['related']=$categorymodel->related_post_home($table_cate_post,$table_post,$cond_related);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('details_post',$data);		
				$this->load->view('footer');	
			}

			public function notfound(){
				$this->load->view('header');	
				$this->load->view('404');		
				$this->load->view('footer');	
			}
	}

 ?>