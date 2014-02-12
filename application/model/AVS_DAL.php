<?php
require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/AVSInfo.php';
class AVS_DAL {
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	public function add(AVSInfo $avs){
		$sql="INSERT INTO AVS (avName,avIMG,avTag,avAge,avHight,
				avWeight,av3w,avContent,avDate)VALUES
			 	('".$avs->avName."','".$avs->avIMG."',".$avs->avTag.",'".$avs->avAge."','".
				$avs->avHight."','".$avs->avWeight."','".$avs->av3w."','".$avs->avContent.
				"','".$avs->avDate."')";
		return $this->db->executeNonQuery($sql);
	}
	
	public function delete($id){
		$sql="DELETE FROM AVS WHERE avID=".$id;
		return $this->db->executeNonQuery($sql);
	}
	public function deleteByName($name){
		$sql="DELETE FROM AVS WHERE avName='".$name."'";
		return $this->db->executeNonQuery($sql);
	}
	public function update(AVSInfo $avs){
		$sql="UPDATE AVS SET avName='".$avs->avName."',avIMG='".$avs->avIMG.
			"',avTag=".$avs->avTag.",avAge='".$avs->avAge."',avHight='".$avs->avHight.
		"',avWeight='".$avs->avWeight."',av3w='".$avs->av3w."',avContent='".$avs->avContent.
		"' WHERE avID=".$avs->avID;
		return $this->db->executeNonQuery($sql);
	}
	public function get($id){
		$sql="SELECT * FROM AVS WHERE avID=".$id;
		return $this->db->executeDataTable($sql);
	}
	public function getByPage($start,$rows){
		$sql="SELECT * FROM AVS ORDER BY avID DESC LIMIT ".$start.",".$rows;
		return $this->db->executeDataTable($sql);
	}
	public function getByName($name){
		$sql="SELECT * FROM AVS WHERE avName='".$name."'";
		return $this->db->executeDataTable($sql);
	}
}

?>