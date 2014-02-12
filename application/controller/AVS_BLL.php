<?php
require_once WEBROOT.'/application/model/AVS_DAL.php';
require_once WEBROOT.'/application/model/BaseDAL.php';
require_once WEBROOT.'/application/Entity/AVSInfo.php';
class AVS_BLL {
	private $DAL;
	public function __construct(){
		$this->DAL=new AVS_DAL();
	}
	public function add(AVSInfo $avs){
		if($avs->avName=="" || $avs->avAge==""||$avs->avHight==""||$avs->avWeight==""||
			$avs->av3w==""||$avs->avContent=="") return false;
		BaseDAL::newCon();
		$avs->avContent=mysql_real_escape_string($avs->avContent);
		$avs->avHight=mysql_real_escape_string($avs->avHight);
		$avs->avWeight=mysql_real_escape_string($avs->avWeight);
		$avs->av3w=mysql_real_escape_string($avs->av3w);		
		$avs->avAge=mysql_real_escape_string($avs->avAge);
		$avs->avName=mysql_real_escape_string($avs->avName);
		$avs->avDate=date('Y-m-d H:i:s',time());
		BaseDAL::closeCon();
		return $this->DAL->add($avs);
	}
	
	public  function delete($id){
		if($this->DAL->delete($id)) return true;
		return  false;;
	}
	public  function deleteByName($name){
		if($this->DAL->deleteByName($name)) return true;
		return  false;;
	}
	public function update(AVSInfo $avs){
		if($avs->avName=="" || $avs->avAge==""||$avs->avHight==""||$avs->avWeight==""||
		$avs->av3w==""||$avs->avContent=="") return false;
		BaseDAL::newCon();
		$avs->avContent=mysql_real_escape_string($avs->avContent);
		$avs->avHight=mysql_real_escape_string($avs->avHight);
		$avs->avWeight=mysql_real_escape_string($avs->avWeight);
		$avs->av3w=mysql_real_escape_string($avs->av3w);
		$avs->avAge=mysql_real_escape_string($avs->avAge);
		$avs->avName=mysql_real_escape_string($avs->avName);
		$avs->avDate=date('Y-m-d H:i:s',time());
		BaseDAL::closeCon();
		return $this->DAL->update($avs);
	}
	public function get($id){
		return $this->DAL->get($id);
	}
	public function getByPage($start,$rows){
		return $this->DAL->getByPage($start, $rows);	
	}
	public function getByName($name){
		return $this->DAL->getByName($name);
	}
}

?>