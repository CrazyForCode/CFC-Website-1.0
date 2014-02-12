<?php
//TEST START
date_default_timezone_set('PRC');
define("DIR",dirname(__FILE__));
$STR=DIR;
$STR=str_replace("/application/TEST", "", $STR);
define("WEBROOT",$STR);
//TEST END

require_once WEBROOT.'/application/controller/TEAMS_BLL.php'; //需要测试的文件
echo "ok";
?>

<html>
	<head></head>
	<body>
		<?php 
		    $id=$_POST["id"];
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
		<h1>update test</h1>
		<form method=post action="testTEAMS_BLL.php?art=2">
		    teamid:<input type="text" value="" name="id"> <br/>
			teamName:<input type="text" value="" name="name"> <br/>
			teamIMG:<input type="text" value="" name="img"> <br/>
			teamJob:<input type="text" value="" name="job"> <br/>
			teamEmail	:<input type="text" value="" name="email"> <br/>
			teamOther:<input type="text" value="" name="other"> <br/>
			<input name="DenLu" type="submit" value="update"/>
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
				if($bll->update($id,$userName, $img, $job, $email, $other)) 
					echo "1 true";
				else echo "1 false";
				$bll=null;
			}
		?>
	</body>
</html>
<?php

?>