<?php
//TEST START
date_default_timezone_set('PRC');
define("DIR",dirname(__FILE__));
$STR=DIR;
$STR=str_replace(DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."TEST", "", DIR);
define("WEBROOT",$STR);
//TEST END

require_once WEBROOT.'/application/controller/ADMIN_BLL.php'; //需要测试的文件
?>

<html>
	<head></head>
	<body>
		<?php 
			$userName=$_POST["name"];
			$userPasswd=$_POST["password"];
			$oldps=$_POST["oldpassword"];
			$newps=$_POST["newpassword"];
			$art=$_GET["art"];
			echo "OUTname:".$userName."<br/>";
			echo "OUTpassword:".$userPasswd."<br/>";
			echo "OLDpasswd:".$oldps."<br/>";
			echo "OUTpassword:".$newps."<br/>";
		?>
		<h1>测试登录</h1>
		<form method=post action="testADMIN_BLL.php?art=1">
			name:<input type="text" value="" name="name"> <br/>
			passwd:<input type="password" value="" name="password"> <br/>
			<input name="DenLu" type="submit" value="登陆"/>
		</form>
		<h1>测试修改密码</h1>
		<form method=post action="testLogin.php?art=2">
			OLDpasswd:<input type="password" value="" name="oldpassword"> <br/>
			NEWpasswd:<input type="password" value="" name="newpassword"> <br/>
			<input name="DenLu" type="submit" value="修改"/>
		</form>
		<?php 
			//test
			if($art=="1"){
				$bll=new ADMIN_BLL();
				if($bll->login($userName, $userPasswd)) echo "1 true";
				else echo "1 false";
				$bll=null;
			}
			if($art=="2"){
				$bll=new ADMIN_BLL();
				if($bll->updatePasswd($oldps, $newps)) echo "2 true";
				else echo "2 false";
				$bll=null;
			}
		?>
	</body>
</html>
<?php

?>