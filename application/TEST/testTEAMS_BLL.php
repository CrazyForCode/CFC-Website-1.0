<?php
//TEST START
date_default_timezone_set('PRC');
define("DIR",dirname(__FILE__));
$STR=DIR;
$STR=str_replace("/application/TEST", "", $STR);
define("WEBROOT",$STR);
//TEST END

require_once WEBROOT.'/application/controller/TEAMS_BLL.php'; //需要测试的文件
?>

<html>
	<head></head>
	<body>
		<?php 
			$userName=$_POST["name"];
			$img=$_POST["img"];
			$job=$_POST["job"];
			$email=$_POST["email"];
			$other=$_POST["other"];
			$oldps=$_POST["oldpassword"];
			$newps=$_POST["newpassword"];
			$art=$_GET["art"];
			echo "Inputname:".$userName."<br/>";
			echo "Inputimg:".$img."<br/>";
			echo "Inputjob:".$job."<br/>";
			echo "Inputemail:".$email."<br/>";
			echo "Inputother:".$other."<br/>";
			echo "OLDpasswd:".$oldps."<br/>";
			echo "OUTpassword:".$newps."<br/>";
		?>
		<h1>insert test</h1>
		<form method=post action="testTEAMS_BLL.php?art=1">
			teamName:<input type="text" value="" name="name"> <br/>
			teamIMG:<input type="text" value="" name="img"> <br/>
			teamJob:<input type="text" value="" name="job"> <br/>
			teamEmail	:<input type="text" value="" name="email"> <br/>
			teamOther:<input type="text" value="" name="other"> <br/>
			<input name="DenLu" type="submit" value="insert"/>
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
				$bll=new TEAMS_BLL();
				if($bll->insert($userName, $img, $job, $email, $other)) 
					echo "1 true";
				else echo "1 false";
				$bll=null;
			}
			if($art=="2"){
				$bll=new TEAMS_BLL();
				$bll->deleteByid(1);
			}
		?>
	</body>
</html>
<?php

?>