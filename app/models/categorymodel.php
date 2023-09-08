<?php 
	
	class categorymodel extends DModel{
		public function __construct(){
			parent:: __construct();
		}

		public function category($tbl_category_product){
			 $sql="SELECT * FROM $tbl_category_product ORDER BY id_category_product DESC";
			return $this->db->select($sql);
	
		}
		public function category_home($tbl_category_product){
			 $sql="SELECT * FROM $tbl_category_product ORDER BY id_category_product DESC ";
			return $this->db->select($sql);
	
		}
		public function categorybyid($tbl_category_product,$cond){
			 $sql="SELECT * FROM $tbl_category_product where $cond";
			return $this->db->select($sql);
		}
		public function categorybyid_home($table,$table_product,$id){
			$sql="SELECT * FROM $table,$table_product WHERE $table.id_category_product = $table_product.id_category_product and $table_product.id_category_product =$id ORDER BY $table_product.id_category_product DESC";
			return $this->db->select($sql);
		}
		public function postbyid_home($table_cate_post,$table_post,$id){
			$sql="SELECT * FROM $table_cate_post,$table_post WHERE $table_cate_post.id_category_post = $table_post.id_category_post and $table_post.id_category_post =$id ORDER BY $table_post.id_category_post DESC";
			return $this->db->select($sql);
		}
		public function insertcategory($tbl_category_product,$data){
			return $this->db->insert($tbl_category_product,$data);			
		}


		public function updatecategory($tbl_category_product,$data,$cond){
			return $this->db->update($tbl_category_product,$data,$cond);			
		}


		public function deletecategory($tbl_category_product,$cond){
			return $this->db->delete($tbl_category_product,$cond);			
		}
		public function search_product_home($table_product,$title){
			$sql="SELECT * FROM $table_product where title_product like '%$title%'";
			return $this->db->select($sql);
		}
		public function search_product_cpanel($table_product,$table_category_product,$title){
			$sql="SELECT * FROM $table_product,$table_category_product where $table_product.id_category_product=$table_category_product.id_category_product AND $table_product.title_product like '%$title%'";
			return $this->db->select($sql);
		}
		public function title($tbl_product,$title){
			$sql="SELECT * FROM $tbl_product where title_product = '$title'";
			return $this->db->select($sql);
		}
		// post
		
		public function insertcategory_post($tbl_category_post,$data){
			return $this->db->insert($tbl_category_post,$data);			
		}
		public function category_post($tbl_category_post){
			$sql="SELECT * FROM $tbl_category_post ORDER BY id_category_post DESC";
			return $this->db->select($sql);
		}
		public function categorypost_home($tbl_category_post){
			$sql="SELECT * FROM $tbl_category_post ORDER BY id_category_post DESC";
			return $this->db->select($sql);
		}
		public function deletecategory_post($tbl_category_post,$cond){
			return $this->db->delete($tbl_category_post,$cond);			
		}

		public function categorybyid_post($tbl_category_post,$cond){
			 $sql="SELECT * FROM $tbl_category_post where $cond";
			return $this->db->select($sql);
		}

		public function updatecategory_post($tbl_category_post,$data,$cond){
			return $this->db->update($tbl_category_post,$data,$cond);			
		}
		public function list_post_home($tbl_post){
			$sql="SELECT * FROM $tbl_post ORDER BY id_post DESC";
			return $this->db->select($sql);
		}
		public function details_post_home($table_cate_post,$table_post,$cond){
			$sql="SELECT * FROM $table_cate_post,$table_post  WHERE $cond ORDER BY $table_post.id_post DESC";
			return $this->db->select($sql);
		}
		public function related_post_home($table_cate_post,$table_post,$cond_related){
			$sql="SELECT * FROM $table_cate_post,$table_post where $cond_related";
			return $this->db->select($sql);
		}
		public function post_index($tbl_post){
			$sql="SELECT * FROM $tbl_post ORDER BY id_post DESC LIMIT 5";
			return $this->db->select($sql);
		}
		public function search_post_cpanel($table_post,$table_category_post,$title){
			$sql="SELECT * FROM $table_post,$table_category_post where $table_post.id_category_post=$table_category_post.id_category_post AND $table_post.title_post like '%$title%'";
			return $this->db->select($sql);
		}

		// product
		
		public function list_product_home($tbl_product){
			$sql="SELECT * FROM $tbl_product ORDER BY id_product DESC";
			return $this->db->select($sql);
		}
		public function product_hot($tbl_product){
			$sql="SELECT * FROM $tbl_product WHERE product_hot=1 ORDER BY id_product DESC";
			return $this->db->select($sql);
		}
		public function list_product_index($tbl_product){
			$sql="SELECT * FROM $tbl_product ORDER BY id_product DESC";
			return $this->db->select($sql);
		}

		public function insertproduct($tbl_product,$data){
			return $this->db->insert($tbl_product,$data);			
		}

		public function product($tbl_product,$tbl_category_product){
			$sql="SELECT * FROM $tbl_product,$tbl_category_product WHERE $tbl_product.id_category_product = $tbl_category_product.id_category_product ORDER BY $tbl_product.id_product DESC";
			return $this->db->select($sql);
		}
		public function delete_product($tbl_product,$cond){
			return $this->db->delete($tbl_product,$cond);
		}
		public function update_product($tbl_product,$data,$cond){
			return $this->db->update($tbl_product,$data,$cond);			
		}
		public function productbyid($tbl_product,$cond){
			 $sql="SELECT * FROM $tbl_product where $cond";
			return $this->db->select($sql);
		}
		public function details_product_home($table,$table_product,$cond){
			 $sql="SELECT * FROM $table_product,$table where $cond";
			return $this->db->select($sql);
		}
		public function	related_product_home($table,$table_product,$cond_related){
			$sql="SELECT * FROM $table,$table_product where $cond_related";
			return $this->db->select($sql); 
		}
	}

 ?>