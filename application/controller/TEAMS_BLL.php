<?php
require_once WEBROOT.'/application/model/TEAMS_DAL.php';
require_once WEBROOT.'/application/Entity/TEAMSInfo.php';
class TEAMS_BLL {
	private $DAL;
	public function __construct(){
		$this->DAL=new TEAMS_DAL();
	}
	public function insert($teamName,$teamIMG,$teamJob,$teamEmail,$teamOther){
	
		if($teamName=="")return false;
		
		$result=$this->DAL->insert($teamName, $teamIMG, $teamJob, $teamEmail, $teamOther);
		echo $result;
		if($result){
			return true;
		}
		return false;
	}
	
	public function deleteByid($id)
	{
		if($id=="")
			return false;
		$result=$this->DAL->delete("teamID",$id);
	}
	
}

?>