<?php 

	class login extends DController{

			public function __construct(){

			$message= array();
			$data = array();

			parent:: __construct();

			}

			public function index(){
				$this->login();	
			}

			public function login(){
				Session::init();
				if(isset($_SESSION['login']))	{
					header("Location:".BASE_URL."order");
				}
				$this->load->view('cpanel/login');		
	
			}
			public function dashboard(){
				Session::checkSession();
				$this->load->view('cpanel/header');
				$this->load->view('cpanel/menu');
				$this->load->view('cpanel/dashboard');
				$this->load->view('cpanel/footer');
			}
			public function authentication_login(){
				 $username = $_POST['username'];	
				 $password = $_POST['password'];	
				 $table_admin='tbl_admin';
				 $loginmodel=$this->load->model('loginmodel');

				 $count=$loginmodel->login($table_admin,$username,$password);

				 if($count==0){
				 	$message['msg']="Tài khoản hoặc mật khẩu không chính xác";
					header('Location:'.BASE_URL."login?msg=".urldecode(serialize($message)));
				 }else{

				 	$result=$loginmodel->getlogin($table_admin,$username,$password);
				 	Session::init();
				 	// Session::set('login',true);
				 	$_SESSION['login']=true;
				 	Session::set('username',$result[0]['username']);
				 	Session::set('userid',$result[0]['admin_id']);
				 	header("Location:".BASE_URL."order");
				 }
			}

			public function logout(){
				Session::init();
				Session::destroy();
				// unset($_SESSION['login']);
				header("Location:".BASE_URL);
			}


	}

 ?>