<?php
require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/TEAMSInfo.php';
class TEAMS_DAL {                         
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	public function insert($teamName,$teamIMG,$teamJob,$teamEmail,$teamOther)
	{
		$sql="INSERT INTO TEAMS (teamName,teamIMG,teamJob,teamEmail,teamOther) VALUES ('".$teamName."','".$teamIMG."','".$teamJob."','".$teamEmail."','".$teamOther."')";
	    
		return $this->db->executeNonQuery($sql);
	}
	public function delete($way,$value)
	{
		$sql="DELETE FROM TEAMS WHERE ".$way."=".$value;
		echo $sql;
		return $this->db->executeNonQuery($sql);
		
	}
	public function update($id)
	{
		$sql="UPDATE TEAMS SET adPassword='".$ad->adPassword."'";
	}
}

?>