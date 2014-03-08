<?php
require_once WEBROOT.'/application/controller/ADMIN_BLL.php';
require_once WEBROOT.'/application/controller/BDFunction.php';
class PageController {
	public $view;
	public function loginAction(){
		
		$admin_BLL=new ADMIN_BLL();
		$userName=$_POST["name"];
		$userPasswd=$_POST["password"];
		if(!is_null($userName) && !is_null($userPasswd)){
			if($admin_BLL->login($userName, md5($userPasswd))){
				setcookie("userName",$userName);
				setcookie("userPasswd",md5($userPasswd));
				header('Location: index.php?controller=admin');
			}
		}
		
		require_once WEBROOT.'/application/views/admin/login.phtml';
	}
	public function adminAction()
	{
		
		require_once WEBROOT.'/application/views/admin/index.phtml';
	}
	
	
}

?>