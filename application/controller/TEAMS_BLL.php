<?php
require_once WEBROOT . '/application/model/TEAMS_DAL.php';
require_once WEBROOT . '/application/Entity/TEAMSInfo.php';
class TEAMS_BLL {
	private $DAL;
	public function __construct() {
		$this->DAL = new TEAMS_DAL ();
	}
	public function insert($teamName, $teamIMG, $teamJob, $teamEmail, $teamOther) {
		if ($teamName == "")
			return false;
		if ($teamIMG == "")
			return false;
		if ($teamJob == "")
			return false;
		if ($teamEmail == "")
			return false;
		if ($teamOther == "")
			return false;
		
		$result = $this->DAL->insert ( $teamName, $teamIMG, $teamJob, $teamEmail, $teamOther );
		if ($result) {
			return true;
		}
		return false;
	}
	public function deleteByid($id) {
		if ($id == "")
			return false;
		$result = $this->DAL->delete ( "teamID", $id );
		if($result)
			return true;
		return false;
	}
	
	public function deletebyName($name)
	{
		if($name=="")
			return false;
		$result = $this->DAL->delete ( "teamName","'".$name."'");
		if($result)
			return true;
		return false;
		
	}
	public function update($id,$teamName,$teamIMG,$teamJob,$teamEmail,$teamOther)
	{
		if($id=="")
			return false;
		$result=$this->DAL->update($id, $teamName, $teamIMG, $teamJob, $teamEmail, $teamOther);
				if($result)
			return true;
		return false;
	}
	
	public function selectByname($name)
	{
		if($name=="")
			return false;
		$table=$this->DAL->selectbyone("teamID",$name);
		if($table->count>0)
		{
			return $table;
		}
		else return null;
		
	}
	public function selectAll()
	{
		return $this->DAL->selectAll();
	}
}

?>