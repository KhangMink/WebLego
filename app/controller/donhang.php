<?php 

	class donhang extends DController{

		function __construct(){
			$data = array();
			parent:: __construct();
			}

			public function index(){
				$this->donhang();	
			}

			public function donhang(){
				Session::init();
				$cus=$_SESSION['customer_id'];
				$table='tbl_category_product';
				$table_post='tbl_category_post';
				$table_order_details='tbl_order_details';
				$table_customer='tbl_customer';
				$table_order='tbl_order';
				$table_product='tbl_product';
				$ordermodel=$this->load->model('ordermodel');
				$cond="$table_product.id_product=$table_order_details.product_id AND $table_order_details.customer_id=$table_customer.customer_id AND $table_order_details.order_code=$table_order.order_code AND $table_customer.customer_id = '$cus'";		
				$data['order_details']=$ordermodel->list_order_customer($table_product,$table_order_details,$table_customer,$table_order,$cond);
	
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('order',$data);		
				$this->load->view('footer');	
			}
			public function capnhatdonhang($id){
				$ordermodel = $this->load->model('ordermodel');
				$table_order_details='tbl_order_details';
				$cond="product_id='$id'";		
				$quantity=$_POST['quantity'];
				$data = array(
					'product_quantity'=>$quantity
				);
				$result=$ordermodel->update_order($table_order_details,$data,$cond);	
				if($result==1){
					$message['msg']="Gửi lại đơn hàng thành công";
					header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
				}else{
					$message['msg']="Gửi lại đơn hàng thất bại";
					header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
				}
			}
			public function xoadonhang($id){
				$ordermodel = $this->load->model('ordermodel');
				$table_order_details='tbl_order_details';
				$cond="order_details_id='$id'";				
				$result = $ordermodel->delete_order_details($table_order_details,$cond);
				if($result==1){
					$message['msg']="Hủy đơn hàng thành công";
					header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
				}else{
					$message['msg']="Hủy đơn hàng thất bại";
					header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
				}
			}
			public function notfound(){
				$this->load->view('header');	
				$this->load->view('404');		
				$this->load->view('footer');	
			}
			
			

			
	}

 ?>