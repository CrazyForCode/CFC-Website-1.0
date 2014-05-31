<?php
require_once WEBROOT . '/application/model/MOVIES_DAL.php';
require_once WEBROOT . '/application/Entity/MOVIESInfo.php';

class MOVIES_BLL {
	private $DAL;
	public function __construct() {
		$this->DAL = new MOVIES_DAL();
	
	}
	public function insert($movieName,$movieOutImg,$movieTag,$movieURL,$movieContent,$movieDate) {
		
		if ($movieName == "")
			return false;
		if ($movieOutImg == "")
			return false;
		if ($movieTag == "")
			return false;
		if ($movieURL == "")
			return false;
		if ($movieContent == "")
			return false;
		
		$result = $this->DAL->insert ($movieName,$movieOutImg,$movieTag,$movieURL,$movieContent,$movieDate);
		if ($result) {
			return true;
		}
		return false;
	}
	public function deleteByid($id) {
		if ($id == "")
			return false;
		$result = $this->DAL->delete ( "movieID", $id );
		if($result)
			return true;
		return false;
	}
	
	public function deletebyName($name)
	{
		if($name=="")
			return false;
		$result = $this->DAL->delete ( "movieName","'".$name."'");
		if($result)
			return true;
		return false;
		
	}
	public function update($id,$movieName,$movieOutImg,$movieTag,$movieURL,$movieContent,$movieDate)
	{
		if($id=="")
			return false;
		$result=$this->DAL->update($id, $movieName,$movieOutImg,$movieTag,$movieURL,$movieContent,$movieDate);
				if($result)
			return true;
		return false;
	}
	
	public function selectByname($name)
	{
		if($name=="")
			return false;
		$table=$this->DAL->selectbyone("<movie></movie>ID",$name);
		if($table->count>0)
		{
			return $table;
		}
		else return null;
		
	}
	
	public function selectByone($way,$value)
	{
		$result=$this->DAL->selectbyone($way, $value);
		return $result;
	}
	public function selectAll()
	{
		return $this->DAL->selectAll();
	}
}

?>