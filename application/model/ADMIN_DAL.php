<?php
require_once WEBROOT.'/application/database/MySql.php';
class ADMIN_DAL {
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	public function get($name){
		$sql="SELECT * FROM ADMIN WHERE adName='".$name."'";
		return $this->db->executeDataTable($sql);
	}
}

?>