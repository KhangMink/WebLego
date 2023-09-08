<?php 

	class index extends DController{

		function __construct(){
			$data = array();
			parent:: __construct();
			}

			public function index(){
				$this->homepage();	
			}

			public function homepage(){
				Session::init();
				$table='tbl_category_product';
				$table_post='tbl_category_post';
				$table_product='tbl_product';
				$post='tbl_post';
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$data['product']=$categorymodel->list_product_index($table_product);
				$data['post_index']=$categorymodel->post_index($post);
				$this->load->view('header',$data);
				$this->load->view('slide',$data);	
				$this->load->view('home',$data);		
				$this->load->view('footer');	
			}
			public function danhmuc(){
				$this->load->view('header');
				// $this->load->view('slide');	
				$this->load->view('categoryproduct');		
				$this->load->view('footer');	
			}
			public function chitietsanpham(){
				$this->load->view('header');
				// $this->load->view('slide');	
				$this->load->view('details_product');		
				$this->load->view('footer');	
			}

			public function lienhe(){
				Session::init();
				$table='tbl_category_product';
				$table_post='tbl_category_post';
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$this->load->view('header',$data);	
				$this->load->view('contact');		
				$this->load->view('footer');	
			}
			public function timkiem(){
				Session::init();
				$table='tbl_category_product';
				$table_product='tbl_product';
				$table_post='tbl_category_post';
				$title=$_GET['search'];
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$data['list_product']=$categorymodel->search_product_home($table_product,$title);
				$this->load->view('header',$data);
				$this->load->view('list_product',$data);		
				$this->load->view('footer');	
			}
			public function notfound(){
				$table='tbl_category_product';
				$table_post='tbl_category_post';
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$this->load->view('header',$data);	
				$this->load->view('404');		
				$this->load->view('footer');	
			}
	}

 ?>