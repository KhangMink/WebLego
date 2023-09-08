<?php 

	class hang extends DController{

		function __construct(){
			$data = array();
			parent:: __construct();
			}

			public function index(){
				$this->hang();	
			}

			public function hang(){
				Session::init();
				$table='tbl_category_product';
				$table_post='tbl_category_post';
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$table_cart='tbl_cart';
				$table_customer='tbl_customer';		
				$cus=$_SESSION['customer_id'];
				$cond="$table_cart.customer_id = $table_customer.customer_id AND  $table_customer.customer_id='$cus'";
				$cartmodel=$this->load->model('cartmodel');
				$data['cart']=$cartmodel->list_cart($table_cart,$table_customer,$cond);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('customer_cart',$data);		
				$this->load->view('footer');
			}


			public function themgiohang(){
				Session::init();
				$table_cart='tbl_cart';
				$cartmodel=$this->load->model('cartmodel');
				$product_id=$_POST['product_id'];
				$product_title=$_POST['product_title'];
				$product_image=$_POST['product_image'];
				$product_price=$_POST['product_price'];
				$product_quantity=$_POST['product_quantity'];			
				if(isset($_SESSION["customer"])){
					$data_cart=array(
					'id_product'=>$product_id,
					'title_product'=>$product_title,
					'image_product'=>$product_image,
					'price_product'=>$product_price,
					'product_quantity'=>$product_quantity,
					'customer_id'=>$_SESSION["customer_id"]
					);
					$result=$cartmodel->insert_cart($table_cart,$data_cart);
				}
				header("Location:".BASE_URL.'hang');

			}
			public function xoagiohang($id){
			$cartmodel = $this->load->model('cartmodel');
			$table_cart='tbl_cart';
			$cond="id_cart='$id'";	
			$result = $cartmodel->delete_cart($table_cart,$cond);
			header("Location:".BASE_URL.'hang');
			}
			public function dathang($id){
				$cartmodel = $this->load->model('cartmodel');
				$table_cart='tbl_cart';
				$cond="id_cart='$id'";	
				$result = $cartmodel->delete_cart($table_cart,$cond);
				header("Location:".BASE_URL.'giohang');
			}
			public function notfound(){
				$this->load->view('header');	
				$this->load->view('404');		
				$this->load->view('footer');	
			}
			

			
	}

 ?>