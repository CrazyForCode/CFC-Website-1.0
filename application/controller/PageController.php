<?php
require_once WEBROOT . '/application/controller/ADMIN_BLL.php';
require_once WEBROOT . '/application/controller/MOVIES_BLL.php';
require_once WEBROOT . '/application/controller/BDFunction.php';

class PageController {
	public $view;
	
	public function loginAction() {
		$admin_BLL = new ADMIN_BLL ();
		$userName = $_POST ["name"];
		$userPasswd = $_POST ["password"];
		
		if (! is_null ( $userName ) && ! is_null ( $userPasswd )) {
			if ($admin_BLL->login ( $userName, md5 ( $userPasswd ) )) {
				setcookie ( "userName", $userName );
				setcookie ( "userPasswd", md5 ( $userPasswd ) );
				header ( 'Location: index.php?controller=yingshi' );
			}
		}
		
		require_once WEBROOT . '/application/views/admin/login.phtml';
	}
	public function pingmianAction() {
		if ($_COOKIE ['userName'] != null) {
			require_once WEBROOT . '/application/views/admin/pingmian.phtml';
		}
		else {
			require_once WEBROOT . '/application/views/admin/login.phtml';
		}
	}
	public function yingshiAction() {
		if ($_COOKIE ['userName'] != null) {
			$type=$_GET['type'];
			$id=$_GET['id'];
			if($type!=null&&$id!=null)
			{
				$moives=new MOVIES_BLL();
				$result=$moives->selectByone("movieID",$id);
				//var_dump($result);
				$this->view->data=$result->Rows[0];
				
			}
			require_once WEBROOT . '/application/views/admin/yingshi.phtml';
		}
		else {
			require_once WEBROOT . '/application/views/admin/login.phtml';
		}
		
	}
	
	public function yingshiListAction() {
		if ($_COOKIE ['userName'] != null) {
			require_once WEBROOT . '/application/views/admin/yingshiList.phtml';
		}
		else {
			require_once WEBROOT . '/application/views/admin/login.phtml';
		}
	
	}
	
	public function pingmianListAction() {
		if ($_COOKIE ['userName'] != null) {
			require_once WEBROOT . '/application/views/admin/pingmianList.phtml';
		}
		else {
			require_once WEBROOT . '/application/views/admin/login.phtml';
		}
	
	}
	
	public function yingshiuploadAction() {
		$moives=new MOVIES_BLL();
		$moiveName=$_POST['moiveName']; 
		$moiveOutImg=$_POST['moiveOutImg']; 
		$moiveTag=$_POST['moiveTag'];  
		$moiveURL=$_POST['moiveURL'];  
		$moiveContent=$_POST['content'];  
		$moiveDate=$_POST['moiveDate'];
		$type= $_POST['type'];
		if($type=="add")
		
		$result=$moives->insert($moiveName, $moiveOutImg, $moiveTag, $moiveURL, $moiveContent, $moiveDate);
	    else {
	    	
	    	$moives->update($type, $moiveName, $moiveOutImg, $moiveTag, $moiveURL, $moiveContent, $moiveDate);
	    }
	    	
		
		header ( 'Location: index.php?controller=yingshiList' );
	}
	public function delAction()
	{
		$id=$_GET['id'];
		$type=$_GET['type'];
		if($id!=null&&$type!=null)
		{
			if($type=="yingshi")
			{
				$moives=new MOVIES_BLL();
				$moives->deleteByid($id);
				header ( 'Location: index.php?controller=yingshiList' );
			}
		}
	}
}

?>