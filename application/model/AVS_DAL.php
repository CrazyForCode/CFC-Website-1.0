<?php
require_once WEBROOT.'/application/database/MySql.php';
require_once WEBROOT.'/application/Entity/AVSInfo.php';
class AVS_DAL {
	private $db;
	public function __construct(){
		$this->db=new MySql();
	}
	public function add(AVSInfo $avs){
		$sql="INSERT INTO AVS (avTag,avOutIMG,avInIMG,avName,avSex,
				avBirth,avNationality,avNation,avProvince,avIDcard,
				avAdrr,avPostCode,avWeiBo,avQQEmail,avMobile,
				avPhone,avHight,avWeight,avFacePaint,avColor,
				avEyeColor,avShoeSize,avSH,avButs,avWaist,
				avHips,avCup,avStyle,avWorkTime,avISAgree,
				avContent,avDate)VALUES
			 	(".$avs->avTag.",'".$avs->avOutIMG."','".$avs->avInIMG."','".$avs->avName."','".$avs->avSex."','".
				$avs->avBirth."','".$avs->avNationality."','".$avs->avNation."','".$avs->avProvince."','".$avs->avIDcard."','".
				$avs->avAdrr."','".$avs->avPostCode."','".$avs->avWeiBo."','".$avs->avQQEmail."','".$avs->avMobile."','".
				$avs->avPhone."','".$avs->avHight."',".$avs->avWeight.",".$avs->avFacePaint.",'".$avs->avColor."','".
				$avs->avEyeColor."','".$avs->avShoeSize."','".$avs->avSH."','".$avs->avButs."','".$avs->avWaist."','".
				$avs->avHips."','".$avs->avCup."',".$avs->avStyle.",'".$avs->avWorkTime."',".$avs->avISAgree.",'".
				$avs->avContent."','".$avs->avDate."')";
		return $this->db->executeNonQuery($sql);
	}
	
	public function delete($id){
		$sql="DELETE FROM AVS WHERE AVID=".$id;
		return $this->db->executeNonQuery($sql);
	}
	public function deleteByName($name){
		$sql="DELETE FROM AVS WHERE avName='".$name."'";
		return $this->db->executeNonQuery($sql);
	}
	public function update(AVSInfo $avs){
		$sql="UPDATE AVS SET avName='".$avs->avName."',avSex='".$avs->avSex."',avWeiBo='".$avs->avWeiBo.
				"',avHight='".$avs->avHight."',avWeight='".$avs->avWeight."',avButs='".$avs->avButs.
				"',avWaist='".$avs->avWaist."',avHips='".$avs->avHips."',avContent='".$avs->avContent.
				"',avDate='".$avs->avDate."' WHERE AVID=".$avs->AVID;
		return $this->db->executeNonQuery($sql);
	}
	public function get($id){
		$sql="SELECT * FROM AVS WHERE AVID=".$id;
		return $this->db->executeDataTable($sql);
	}
	public function getByPage($start,$rows){
		$sql="SELECT * FROM AVS ORDER BY AVID DESC LIMIT ".$start.",".$rows;
		return $this->db->executeDataTable($sql);
	}
	public function getByName($name){
		$sql="SELECT * FROM AVS WHERE avName='".$name."'";
		return $this->db->executeDataTable($sql);
	}
}

?>