<?php 
	
	class cartmodel extends DModel{
		public function __construct(){
			parent:: __construct();
		}
		public function insert_cart($table_cart,$data_cart){
			return $this->db->insert($table_cart,$data_cart);
		}
		public	function list_cart($table_cart,$table_customer,$cond){
			 $sql="SELECT * FROM $table_cart,$table_customer WHERE $cond ORDER BY id_cart DESC";
			return $this->db->select($sql);	
		}
		public function delete_cart($table_cart,$cond){
			return $this->db->delete($table_cart,$cond);
		}
		
	}

 ?>