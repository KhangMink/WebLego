<?php 
	
	class thongkemodel extends DModel{
		public function __construct(){
			parent:: __construct();
		}
		public function list($table_product,$table_order_details,$table_order,$cond){
			 $sql="SELECT * FROM $table_order_details,$table_product,$table_order WHERE $cond ";
			return $this->db->select($sql);	
		}
		public function khach($table_order_details){
			 $sql="SELECT name, COUNT(*) AS fre FROM $table_order_details group by name order by fre desc limit 1";
			return $this->db->select($sql);	
		}

	}

 ?>