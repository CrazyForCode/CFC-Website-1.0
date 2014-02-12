<?php
require_once WEBROOT.'/application/database/MySql.php';
class BaseDAL { //针对mysql_real_escape_string() 需要mysqlconnect,创建临时链接，newCon()和closeCon只能成对出现
	private static $db;
	public static function newCon(){
		self::$db=new MySql();
        self::$db->getConnect();
	}
	public static function closeCon(){
		self::$db->closeConnect();
		self::$db=null;
	}
}

?>