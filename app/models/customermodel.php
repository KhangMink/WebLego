<?php 
	
	class customermodel extends DModel{
		public function __construct(){
			parent:: __construct();
		}

	
		public function insert_customer($tbl_customer,$data){
			return $this->db->insert($tbl_customer,$data);			
		}

		public function login($tbl_customer,$username,$password){
			$sql="SELECT * FROM $tbl_customer WHERE customer_email=? AND customer_password=?";
			return $this->db->affectedRows($sql,$username,$password);	
		}


		public function getlogin($tbl_customer,$username,$password){
			 $sql="SELECT * FROM $tbl_customer WHERE customer_email=? AND customer_password=?";
			return $this->db->selectUser($sql,$username,$password);	
		}

		public function list($tbl_customer){
			$sql="SELECT * FROM $tbl_customer ORDER BY customer_id DESC";
			return $this->db->select($sql);
		}
		public function email($tbl_customer,$email){
			$sql="SELECT * FROM $tbl_customer WHERE customer_email = '$email'";
			return $this->db->select($sql);
		}
	}

 ?>