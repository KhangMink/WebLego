<?php 

	class thongke extends DController{
		function __construct(){
			Session::checkSession();
			parent:: __construct();
		
			}

		public function index(){
			$this->thongke();
		}
		public function thongke(){
				$table_order_details='tbl_order_details';
				$table_product='tbl_product';
				$table_order='tbl_order';
				$thongkemodel=$this->load->model('thongkemodel');
				$cond="$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code=$table_order.order_code AND $table_order.order_status='0'";
				$data['thongke']=$thongkemodel->list($table_product,$table_order_details,$table_order,$cond);

				$this->load->view('cpanel/header');
				$this->load->view('cpanel/menu');
				$this->load->view('cpanel/thongke/thongke',$data);
				$this->load->view('cpanel/footer');
		}	

		public function search(){
				$table_order_details='tbl_order_details';
				$table_product='tbl_product';
				$table_order='tbl_order';
				$date=$_GET['search'];
				$thongkemodel=$this->load->model('thongkemodel');
				$cond="$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code=$table_order.order_code AND $table_order.order_status='0' AND $table_order.order_date like '%$date%'";
				$data['thongke']=$thongkemodel->list($table_product,$table_order_details,$table_order,$cond);
				$this->load->view('cpanel/header');
				$this->load->view('cpanel/menu');
				$this->load->view('cpanel/thongke/thongke',$data);
				$this->load->view('cpanel/footer');
		}
	}

 ?>