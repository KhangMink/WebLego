<?php 

	class order extends DController{
		function __construct(){
			Session::checkSession();
			parent:: __construct();
		
			}

		public function index(){
			$this->order();
		}
		public function order(){
				$table_order='tbl_order';
				$ordermodel=$this->load->model('ordermodel');
				$data['order']=$ordermodel->list_order($table_order);
				$this->load->view('cpanel/header');
				$this->load->view('cpanel/menu');
				$this->load->view('cpanel/order/order',$data);
				$this->load->view('cpanel/footer');
		}
		public function order_details($order_code){
				$table_order_details='tbl_order_details';
				$table_product='tbl_product';
				$ordermodel=$this->load->model('ordermodel');
				$cond="$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code='$order_code'";
				$cond_infor="$table_order_details.order_code='$order_code'";
				$data['order_details']=$ordermodel->list_order_details($table_product,$table_order_details,$cond);
				$data['order_infor']=$ordermodel->list_infor($table_order_details,$cond_infor);
				$this->load->view('cpanel/header');
				$this->load->view('cpanel/menu');
				$this->load->view('cpanel/order/order_details',$data);
				$this->load->view('cpanel/footer');
		}
		public function order_confirm($order_code){
				$table_order='tbl_order';
				$ordermodel=$this->load->model('ordermodel');
				$cond="$table_order.order_code='$order_code'";
				if($_POST['xuly']==true){
					$data=array(
						'order_status'=>1
					);
				}
				else if($_POST['thanhtoan']==true){
					$data=array(
						'order_status'=>2
					);
				}
				$result=$ordermodel->order_confirm($table_order,$data,$cond);
			 	if($result==1){
			 	$message['msg']="Đã xử lý đơn hàng thành công";
				header('Location:'.BASE_URL."order?msg=".urldecode(serialize($message)));
			 }else{
			 	$message['msg']="Xử lý thất bại";
			 	header('Location:'.BASE_URL."order?msg=".urldecode(serialize($message)));
			 }
		}
		public function delete_order($code){
			$ordermodel = $this->load->model('ordermodel');
			$tbl_order='tbl_order';
			$cond="order_code='$code'";
				
			$result = $ordermodel->delete_order($tbl_order,$cond);	
			if($result==1){
				$message['msg']="Hủy đơn thành công";
				header('Location:'.BASE_URL."order/order?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Hủy đơn thất bại";
				header('Location:'.BASE_URL."order/order?msg=".urldecode(serialize($message)));
			}
		}
		public function search(){
				$table_order='tbl_order';
				$code=$_GET['search'];
				$ordermodel=$this->load->model('ordermodel');
				$data['order']=$ordermodel->list_order_search($table_order,$code);
				$this->load->view('cpanel/header');
				$this->load->view('cpanel/menu');
				$this->load->view('cpanel/order/order',$data);
				$this->load->view('cpanel/footer');
		}
	}

 ?>