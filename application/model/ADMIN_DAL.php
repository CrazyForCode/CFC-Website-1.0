<?php
require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/ADMINInfo.php';
class ADMIN_DAL {
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	public function get($name){
		$sql="SELECT * FROM ADMIN WHERE adName='".$name."'";
		return $this->db->executeDataTable($sql);
	}
	public function updatePasswd(ADMINInfo $ad){
		$sql="UPDATE ADMIN SET adPassword='".$ad->adPassword."'";
		return $this->db->executeNonQuery($sql);
	}
}

?>