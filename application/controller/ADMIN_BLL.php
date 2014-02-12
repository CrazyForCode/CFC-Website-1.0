<?php
require_once WEBROOT.'/application/model/ADMIN_DAL.php';
require_once WEBROOT.'/application/Entity/ADMINInfo.php';
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
	public function updatePasswd($oldps,$newps){
		if($oldps=="") return false;
		if($newps=="") return false;
		$table=$this->DAL->get("admin");
		if($table->count>0){
			if($table->Rows[0]["adPassword"]==$oldps){
				$adminInfo=new ADMINInfo();
				$adminInfo->adPassword=$newps;
				if($this->DAL->updatePasswd($adminInfo)) return true;
				return false;
			}
		}
		return false;
	}
}

?>