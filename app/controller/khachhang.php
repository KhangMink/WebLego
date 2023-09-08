<?php 

	class khachhang extends DController{

		function __construct(){
			$data = array();
			parent:: __construct();
			}

			public function index(){
				$this->dangnhap();	
			}

			public function login_customer(){
				 $username = $_POST['username'];	
				 $password = $_POST['password'];	
				 $tbl_customer='tbl_customer';
				 $customermodel=$this->load->model('customermodel');

				 $count=$customermodel->login($tbl_customer,$username,$password);

				 if($count==0){
				 	$message['msg']="Tài khoản hoặc mật khẩu không chính xác";
					header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
				 }else{
				 	$message['msg']="Đăng nhập thành công";
					header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
				 	$result=$customermodel->getlogin($tbl_customer,$username,$password);
				 	Session::init();
				 	// Session::set('customer',true);
				 	$_SESSION['customer']=true;
				 	$_SESSION['customer_id']=$result[0]['customer_id'];
				 	$_SESSION['customer_name']=$result[0]['customer_name'];
				 	$_SESSION['customer_phone']=$result[0]['customer_phone'];
				 	$_SESSION['customer_email']=$result[0]['customer_email'];
				 	$_SESSION['customer_address']=$result[0]['customer_address'];
				 	header('Location:'.BASE_URL);
				 }
			}
			public function dangnhap(){
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
				$this->load->view('customer_login');		
				$this->load->view('footer');	
			}
			public function dangxuat(){
				Session::init();
				Session::destroy();
				header("Location:".BASE_URL);
			}

			public function insert_dangky(){
				
				$tbl_customer='tbl_customer';
				$name=$_POST['txtHoTen'];
				$email=$_POST['txtEmail'];
				$phone=$_POST['txtDienThoai'];
				$address=$_POST['txtDiaChi'];
				$password=$_POST['txtPass'];
				$customermodel = $this->load->model('customermodel');
				$i=0;
				$data_email=$customermodel->email($tbl_customer,$email);
				foreach($data_email as $key => $value){
					if($email==$value['customer_email']){
						$i=1;
					}else{
						$i=0;
					}
				}
				if(!preg_match('/^[\p{L}]+$/u', $name)){
					$message['msg']='Họ tên không đúng định dạng!';
				header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));		
				}else if(!preg_match('/^0\d*$/', $phone) || strlen($phone) != 10){
					$message['msg']='Số điện thoại không đúng định dạng!';
				header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
				}
				else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$message['msg']='Email không đúng định dạng!';
				header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
				}
				else if($i==1){		
				$message['msg']='Email đã tồn tại';
				header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
				}
				else{
					$data = array(
					'customer_name'=>$name,
					'customer_email'=>$email,
					'customer_password'=>$password,
					'customer_phone'=>$phone,
					'customer_address'=>$address						
					);
					$result = $customermodel->insert_customer($tbl_customer,$data);
					$message['msg']="Đăng ký thành công";
						header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));	
					}				
					// if($result==1){				
					// 	$message['msg']="Đăng ký thành công";
					// 	header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
					// }else{
					// 	$message['msg']="Đăng ký thất bại";
					// 	header('Location:'.BASE_URL."khachhang/dangnhap?msg=".urldecode(serialize($message)));
					// }
				
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