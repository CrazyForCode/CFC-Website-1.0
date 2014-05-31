<?php
/**
 * by mrchenhao
 */
require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/TEAMSInfo.php';
class TEAMS_DAL {                         
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	//insert
	public function insert($teamName,$teamIMG,$teamJob,$teamEmail,$teamOther)
	{
		$sql="INSERT INTO TEAMS (teamName,teamIMG,teamJob,teamEmail,teamOther) VALUES ('".$teamName."','".$teamIMG."','".$teamJob."','".$teamEmail."','".$teamOther."')";
	    
		return $this->db->executeNonQuery($sql);
	}
	//delete 
	public function delete($way,$value)
	{
		$sql="DELETE FROM TEAMS WHERE ".$way."=".$value;
	
		return $this->db->executeNonQuery($sql);
		
	}
	//update all
	public function update($id,$teamName,$teamIMG,$teamJob,$teamEmail,$teamOther)
	{
		$sql="UPDATE TEAMS SET teamName='".$teamName."',teamIMG='".$teamIMG."',teamJob='".$teamJob."',teamEmail='".$teamEmail."',teamOther='".$teamOther."' where teamID=".$id;
		return $this->db->executeNonQuery($sql); 
	}
	//select all
	
	public function selectAll()
	{
		$sql="SELECT *FROM TEAMS WHERE 1";
		return $this->db->executeDataTable($sql);
	}
	//select by someone
	public function selectbyone($way,$value)
	{
		$sql="SELECT * FROM TEAMS WHERE ".$way."=".$value;
		return $this->db->executeDataTable($sql);
	}
	//lesect like some
	public function mohuselectbyone($way,$value)
	{
		$sql="SELECT * FROM TEAMS WHERE ".$way."like".$value;
		return $this->db->executeDataTable($sql);
	}
	
}

?>
