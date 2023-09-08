<?php 

	class customer extends DController{
		function __construct(){
			parent:: __construct();
			}

		public function index(){
			$this->list_customer();
		}
	

		public function list_customer(){
			$this->load->view('cpanel/header');
			$this->load->view('cpanel/menu');
			$customermodel = $this->load->model('customermodel');
			$tbl_customer='tbl_customer';
			$data['cus']=$customermodel->list($tbl_customer);	
			$this->load->view('cpanel/customer/list_customer',$data);
			$this->load->view('cpanel/footer');
		}

		
	}

 ?>