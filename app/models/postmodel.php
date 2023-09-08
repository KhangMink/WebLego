<?php 
	
	class postmodel extends DModel{
		public function __construct(){
			parent:: __construct();
		}

		public function category_post($table){
			 $sql="SELECT * FROM $table ORDER BY id_category_post DESC";
			return $this->db->select($sql);		
		}
		public function categorybyid($tbl_category_product,$cond){
			 $sql="SELECT * FROM $tbl_category_product where $cond";
			return $this->db->select($sql);
		}

		public function insertpost($tbl_post,$data){
			return $this->db->insert($tbl_post,$data);			
		}


		public function updatecategory($tbl_category_product,$data,$cond){
			return $this->db->update($tbl_category_product,$data,$cond);			
		}


		public function deletecategory($tbl_category_product,$cond){
			return $this->db->delete($tbl_category_product,$cond);			
		}
		public function post($tbl_post,$tbl_category_post){
			$sql="SELECT * FROM $tbl_post,$tbl_category_post WHERE $tbl_post.id_category_post = $tbl_category_post.id_category_post ORDER BY $tbl_post.id_post DESC";
			return $this->db->select($sql);
		}
		public function delete_post($tbl_post,$cond){
			return $this->db->delete($tbl_post,$cond);
		}
		public function postbyid($tbl_post,$cond){
			 $sql="SELECT * FROM $tbl_post where $cond";
			return $this->db->select($sql);
		}
		public function update_post($tbl_post,$data,$cond){
			return $this->db->update($tbl_post,$data,$cond);			
		}
	}

 ?>