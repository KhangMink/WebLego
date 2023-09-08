<?php 
	class DModel {
		protected $db = array();
		function __construct(){
			$connect='mysql:dbname=quanlysanpham; host=localhost;charset=utf8';
			$user = 'root';
			$pass ='';
			$this->db = new Database($connect,$user,$pass);
		}
	}

 ?>