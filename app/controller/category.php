<?php 

	class category extends DController{

		function __construct(){
			$data = array();
			$message= array();
			parent:: __construct();
			}
			public function list_category(){

				$this->load->view('header');	
				$categorymodel = $this->load->model('categorymodel');
				$tbl_category_product='tbl_category_product';
				$data['category']=$categorymodel->category($tbl_category_product);	
				$this->load->view('category',$data);		
				$this->load->view('footer');	

			}

				public function catebyid(){

				$this->load->view('header');	
				$categorymodel = $this->load->model('categorymodel');
				$id=2;
				$tbl_category_product='tbl_category_product';
				$data['categorybyid']=$categorymodel->categorybyid($tbl_category_product,$id);	
				$this->load->view('categorybyid',$data);		
				$this->load->view('footer');	

			}

			public function insertcategory(){

			
				$categorymodel = $this->load->model('categorymodel');
				$tbl_category_product='tbl_category_product';
				$title=$_POST['title'];
				$desc=$_POST['desc'];
				$data = array(
					'title_category_product'=>$title,
					'desc_category_product'=>$desc
				);
				$result = $categorymodel->insertcategory($tbl_category_product,$data);	
				
				if($result=1){
					$message['msg']="Thêm dữ liệu thành công";
				}else{
					$message['msg']="Thêm dữ liệu thất bại";
					
				}

				$this->load->view('addcategory',$message);

			}
			 public function addcategory(){
			 	$this->load->view('addcategory');
			 }

			 public function updatecategory(){
			
				$categorymodel = $this->load->model('categorymodel');
				$tbl_category_product='tbl_category_product';
				// $title=$_POST['title'];
				// $desc=$_POST['desc'];
				$cond="tbl_category_product.id_category_product=3";
				$data = array(
					'title_category_product'=>"ABC",
					'desc_category_product'=>"Tot"
				);
				$result = $categorymodel->updatecategory($tbl_category_product,$data,$cond);	
				
				if($result=1){
					echo "cap nhat dữ liệu thành công";
				}else{
					echo "cap nhat dữ liệu thất bại";
					
				}


			}

			 public function deletecategory(){
			
				$categorymodel = $this->load->model('categorymodel');
				$tbl_category_product='tbl_category_product';
				// $title=$_POST['title'];
				// $desc=$_POST['desc'];
				$cond="id_category_product=8";
				
				$result = $categorymodel->deletecategory($tbl_category_product,$cond);	
				
				if($result=1){
					echo "Xoa dữ liệu thành công";
				}else{
					echo "Xoa dữ liệu thất bại";
					
				}


			}

	}

 ?>