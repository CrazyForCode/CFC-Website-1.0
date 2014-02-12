<?php
require_once WEBROOT.'/application/model/ADMIN_DAL.php';
class ADMIN_BLL {
	private $DAL;
	public function __construct(){
		$this->DAL=new ADMIN_DAL();
	}
	public function login($name,$passwd){
		if($name=="") return false;
		if($passwd=="") return false;
		$table=$this->DAL->get($name);
		if($table->count>0){
			if($table->Rows[0]["adName"]==$name && $table->Rows[0]["adPassword"]==$passwd) return true;
		}
		return false;
	}
}

?>