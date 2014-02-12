
<?php
/**
 * by mrchenhao
 */
require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/MOIVESInfo.php';
class MOIVES_DAL {                         
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	
	//insert
	public function insert($moiveName,$moiveOutImg,$moiveTag,$moiveURL,$moiveContent,$moiveDate)
	{
		$sql="INSERT INTO MOIVES (moiveName,moiveOutImg,moiveTag,moiveURL,moiveContent,moiveDate) VALUES ('".$moiveName."','".$moiveOutImg."','".$moiveTag."','".$moiveURL."','".$moiveContent."','".$moiveDate."')";
	    
		return $this->db->executeNonQuery($sql);
	}
	//delete 
	public function delete($way,$value)
	{
		$sql="DELETE FROM MOIVES WHERE ".$way."=".$value;
		
		return $this->db->executeNonQuery($sql);
		
	}
	//update all
	public function update($id,$moiveName,$moiveOutImg,$moiveTag,$moiveURL,$moiveContent,$moiveDate)
	{
		$sql="UPDATE MOIVES SET moiveName='".$moiveName."',moiveOutImg='".$moiveOutImg."',moiveTag='".$moiveTag."',moiveURL='".$moiveURL."',moiveContent='".$moiveContent."',moiveDate='".$moiveDate."' where moiveID=".$id;
		return $this->db->executeNonQuery($sql); 
	}
	//select all
	
	public function selectAll()
	{
		$sql="SELECT *FROM MOIVES WHERE 1";
		return $this->db->executeDataTable($sql);
	}
	//select by someone
	public function selectbyone($way,$value)
	{
		$sql="SELECT * FROM MOIVES WHERE ".$way."=".$value;
		return $this->db->executeDataTable($sql);
	}
	//lesect like some
	public function mohuselectbyone($way,$value)
	{
		$sql="SELECT * FROM MOIVES WHERE ".$way."li	ke".$value;
		return $this->db->executeDataTable($sql);
	}
	
}

?>