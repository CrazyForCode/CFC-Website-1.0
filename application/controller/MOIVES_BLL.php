<?php
require_once WEBROOT . '/application/model/MOIVES_DAL.php';
require_once WEBROOT . '/application/Entity/MOIVESInfo.php';
class TEAMS_BLL {
	private $DAL;
	public function __construct() {
		$this->DAL = new TEAMS_DAL ();
	}
	public function insert($moiveName,$moiveOutImg,$moiveTag,$moiveURL,$moiveContent,$moiveDate) {
		if ($moiveName == "")
			return false;
		if ($moiveOutImg == "")
			return false;
		if ($moiveTag == "")
			return false;
		if ($moiveURL == "")
			return false;
		if ($moiveContent == "")
			return false;
		
		$result = $this->DAL->insert ($moiveName,$moiveOutImg,$moiveTag,$moiveURL,$moiveContent,$moiveDate);
		if ($result) {
			return true;
		}
		return false;
	}
	public function deleteByid($id) {
		if ($id == "")
			return false;
		$result = $this->DAL->delete ( "moiveID", $id );
		if($result)
			return true;
		return false;
	}
	
	public function deletebyName($name)
	{
		if($name=="")
			return false;
		$result = $this->DAL->delete ( "moiveName","'".$name."'");
		if($result)
			return true;
		return false;
		
	}
	public function update($id,$moiveName,$moiveOutImg,$moiveTag,$moiveURL,$moiveContent,$moiveDate)
	{
		if($id=="")
			return false;
		$result=$this->DAL->update($id, $moiveName,$moiveOutImg,$moiveTag,$moiveURL,$moiveContent,$moiveDate);
				if($result)
			return true;
		return false;
	}
	
	public function selectByname($name)
	{
		if($name=="")
			return false;
		$table=$this->DAL->selectbyone("moiveID",$name);
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