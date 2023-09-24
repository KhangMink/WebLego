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
				$cond="$table_order.order_code=$table_order_details.order_code AND $table_product.id_product=$table_order_details.product_id AND $table_order_details.customer_id='$cus'";					
				$data['order']=$ordermodel->list_order_order($table_order,$table_order_details,$table_product,$cond);
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('order',$data);		
				$this->load->view('footer');	
			}
			public function chitietdonhang($order_code){
				Session::init();
				$table_order_details='tbl_order_details';
				$table_order='tbl_order';
				$table_product='tbl_product';
				$table_customer='tbl_customer';
				$table_post='tbl_category_post';
				$table='tbl_category_product';
				$ordermodel=$this->load->model('ordermodel');
				$cond="$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code=$table_order.order_code AND $table_order_details.order_code='$order_code'";
				$data['order_details']=$ordermodel->list_details($table_product,$table_order_details,$table_order,$cond);
				$categorymodel=$this->load->model('categorymodel');
				$data['category']=$categorymodel->category_home($table);
				$data['category_post']=$categorymodel->categorypost_home($table_post);
				$this->load->view('header',$data);
				// $this->load->view('slide');	
				$this->load->view('order_details',$data);		
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
					$message['msg']="Hủy sản phẩm thành công";
					header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
				}else{
					$message['msg']="Hủy sản phẩm thất bại";
					header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
				}
			}
			public function delete($code){
			$ordermodel = $this->load->model('ordermodel');
			$tbl_order='tbl_order';
			$cond="order_code='$code'";
				
			$result = $ordermodel->delete_order($tbl_order,$cond);	
			if($result==1){
				$message['msg']="Hủy đơn thành công";
				header('Location:'.BASE_URL."donhang/donhang?msg=".urldecode(serialize($message)));
			}else{
				$message['msg']="Hủy đơn thất bại";
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