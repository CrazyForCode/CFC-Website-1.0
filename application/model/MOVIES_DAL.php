<?php
/**
 * by mrchenhao
 */

require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/MOVIESInfo.php';

class MOVIES_DAL {                         
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	
	//insert
	public function insert($movieName,$movieOutImg,$movieTag,$movieURL,$movieContent,$movieDate)
	{
		$sql="INSERT INTO MOVIES (movieName,movieOutImg,movieTag,movieURL,movieContent,movieDate) VALUES ('".$movieName."','".$movieOutImg."',".$movieTag.",'".$movieURL."','".$movieContent."','".$movieDate."')";
		return $this->db->executeNonQuery($sql);
	}
	//delete 
	public function delete($way,$value)
	{
		$sql="DELETE FROM MOVIES WHERE ".$way."=".$value;
		
		return $this->db->executeNonQuery($sql);
		
	}
	//update all
	public function update($id,$movieName,$movieOutImg,$movieTag,$movieURL,$movieContent,$movieDate)
	{
		$sql="UPDATE MOVIES SET movieName='".$movieName."',movieOutImg='".$movieOutImg."',movieTag='".$movieTag."',movieURL='".$movieURL."',movieContent='".$movieContent."',movieDate='".$movieDate."' where movieID=".$id;
		return $this->db->executeNonQuery($sql); 
	}
	//select all
	
	public function selectAll()
	{
		$sql="SELECT *FROM MOVIES WHERE 1";
		return $this->db->executeDataTable($sql);
	}
	//select by someone
	public function selectbyone($way,$value)
	{
		$sql="SELECT * FROM MOVIES WHERE ".$way."=".$value;
		return $this->db->executeDataTable($sql);
	}
	//lesect like some
	public function mohuselectbyone($way,$value)
	{
		$sql="SELECT * FROM MOVIES WHERE ".$way."like".$value;
		return $this->db->executeDataTable($sql);
	}
	
}

?>