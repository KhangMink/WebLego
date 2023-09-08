<?php 
	
	class ordermodel extends DModel{
		public function __construct(){
			parent:: __construct();
		}
		public function insert_order($table_order,$data_order){
			return $this->db->insert($table_order,$data_order);
		}
		public function insert_order_details($table_order_details,$data_details){
			return $this->db->insert($table_order_details,$data_details);
		}
		public function list_order($table_order){
			 $sql="SELECT * FROM $table_order ORDER BY order_status=0 DESC";
			return $this->db->select($sql);	
		}
		public	function list_order_details($table_product,$table_order_details,$cond){
			 $sql="SELECT * FROM $table_order_details,$table_product WHERE $cond ";
			return $this->db->select($sql);	
		}
		public	function list_order_customer($table_product,$table_order_details,$table_customer,$table_order,$cond){
			 $sql="SELECT * FROM $table_order_details,$table_product,$table_order,$table_customer WHERE $cond ORDER BY order_details_id DESC";
			return $this->db->select($sql);	
		}
		public function list_infor($table_order_details,$cond_infor){
			 $sql="SELECT * FROM $table_order_details WHERE $cond_infor LIMIT 1";
			return $this->db->select($sql);	
		}
		public function list($table_order_details){
			$sql="SELECT * FROM $table_order_details";
			return $this->db->select($sql);
		}
		public function order_confirm($table_order,$data,$cond){
			return $this->db->update($table_order,$data,$cond);
		}
		public function delete_order($tbl_order,$cond){
			return $this->db->delete($tbl_order,$cond);
		}
		public function list_order_search($table_order,$code){
			$sql="SELECT * FROM $table_order WHERE order_code like '%$code%'";
			return $this->db->select($sql);
		}
		public function delete_order_details($table_order_details,$cond){
			return $this->db->delete($table_order_details,$cond);
		}
		public function update_order($table_order_details,$data,$cond){
			return $this->db->update($table_order_details,$data,$cond);
		}
	}

 ?>