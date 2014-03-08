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
	//	if($avs->avName=="" || $avs->avAge==""||$avs->avHight==""||$avs->avWeight==""||
	//		$avs->av3w==""||$avs->avContent=="") return false;
		BaseDAL::newCon();
		$avs->avOutIMG=mysql_real_escape_string($avs->avOutIMG);
		$avs->avInIMG=mysql_real_escape_string($avs->avInIMG);
		$avs->avName=mysql_real_escape_string($avs->avName);
		$avs->avSex=mysql_real_escape_string($avs->avSex);
		$avs->avBirth=mysql_real_escape_string($avs->avBirth);
		$avs->avNationality=mysql_real_escape_string($avs->avNationality);
		$avs->avNation=mysql_real_escape_string($avs->avNation);
		$avs->avProvince=mysql_real_escape_string($avs->avProvince);
		$avs->avIDcard=mysql_real_escape_string($avs->avIDcard);
		$avs->avAdrr=mysql_real_escape_string($avs->avAdrr);
		$avs->avPostCode=mysql_real_escape_string($avs->avPostCode);
		$avs->avWeiBo=mysql_real_escape_string($avs->avWeiBo);
		$avs->avQQEmail=mysql_real_escape_string($avs->avQQEmail);
		$avs->avMobile=mysql_real_escape_string($avs->avMobile);
		$avs->avPhone=mysql_real_escape_string($avs->avPhone);
		$avs->avHight=mysql_real_escape_string($avs->avHight);
		$avs->avWeight=mysql_real_escape_string($avs->avWeight);
		$avs->avColor=mysql_real_escape_string($avs->avColor);
		$avs->avEyeColor=mysql_real_escape_string($avs->avEyeColor);
		$avs->avShoeSize=mysql_real_escape_string($avs->avShoeSize);
		$avs->avSH=mysql_real_escape_string($avs->avSH);
		$avs->avButs=mysql_real_escape_string($avs->avButs);
		$avs->avWaist=mysql_real_escape_string($avs->avWaist);
		$avs->avHips=mysql_real_escape_string($avs->avHips);
		$avs->avCup=mysql_real_escape_string($avs->avCup);
		$avs->avWorkTime=mysql_real_escape_string($avs->avWorkTime);
		$avs->avContent=mysql_real_escape_string($avs->avContent);
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
		//if($avs->avName=="" || $avs->avAge==""||$avs->avHight==""||$avs->avWeight==""||
		//$avs->av3w==""||$avs->avContent=="") return false;
		BaseDAL::newCon();

		$avs->avName=mysql_real_escape_string($avs->avName);
		$avs->avSex=mysql_real_escape_string($avs->avSex);
		$avs->avWeiBo=mysql_real_escape_string($avs->avWeiBo);
		$avs->avHight=mysql_real_escape_string($avs->avHight);
		$avs->avWeight=mysql_real_escape_string($avs->avWeight);
		$avs->avButs=mysql_real_escape_string($avs->avButs);
		$avs->avWaist=mysql_real_escape_string($avs->avWaist);
		$avs->avHips=mysql_real_escape_string($avs->avHips);
		$avs->avContent=mysql_real_escape_string($avs->avContent);
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