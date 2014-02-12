<?php
//TEST START
date_default_timezone_set('PRC');
define("DIR",dirname(__FILE__));
$STR=DIR;
$STR=str_replace("/application/TEST", "", $STR);
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
			echo "OUTname:".$userName."<br/>";
			echo "OUTpassword:".$userPasswd."<br/>";
		?>
		<form method=post action="testLogin.php">
			name:<input type="text" value="" name="name"> <br/>
			passwd:<input type="password" value="" name="password"> <br/>
			<input name="DenLu" type="submit" value="登陆"/>
		</form>
		<?php 
			//test
			$bll=new ADMIN_BLL();
			if($bll->login($userName, $userPasswd)) echo "true";
			else echo "false";
		?>
	</body>
</html>
<?php

?>