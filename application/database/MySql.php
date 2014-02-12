<?php
require_once WEBROOT.'/application/Entity/DataTable.php';

class MySql {
	private $con;
	public function  __construct(){

	}
	public function initConnect(){
		$host = 'localhost';
		$port = '3306';
		$user = 'ts';
		$pwd = '123456';
		$dbname = 'IMAGE-WEB';
		$this->con = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
		if(!$this->con) {
			die("Connect Server Failed: " . mysql_error());
		}
		mysql_select_db($dbname, $this->con);	
		mysql_query("set names utf8");
	}
	public function getConnect(){
		$this->initConnect();
	}
	public function closeConnect(){
		mysql_close($this->con);
	}
	/**
	 * execute : update,delete,insert
	 * @param String $sql
	 * @return boolean
	 */
	public function executeNonQuery($sql){
		$this->initConnect();
		$result=mysql_query($sql);
		mysql_close($this->con);
		return $result;
	}
	public function executeDataTable($sql){
		$this->initConnect();
		$result=mysql_query($sql);
		
		$table=new DataTable();
		$cons=0;
		while($row = mysql_fetch_array($result))
		{
			$table->Rows[$cons++]=$row;
		}
		$table->count=$cons;
		mysql_close($this->con);
		return $table;
	}
	public function ExecuteScalar($sql){
		
	}
}

?>