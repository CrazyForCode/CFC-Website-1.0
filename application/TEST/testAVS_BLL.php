<?php
//TEST START
date_default_timezone_set('PRC');
define("DIR",dirname(__FILE__));
$STR=str_replace(DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."TEST", "", DIR);
define("WEBROOT",$STR);
//TEST END
require_once WEBROOT.'/application/controller/AVS_BLL.php'; //需要测试的文件
?>

<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>
	<body>
		<?php
			$avs=new AVSInfo(); 
			$avs->AVID=intval(@$_POST["AVID"]);
			$avs->avTag=intval(@$_POST["avTag"]);
			$avs->avOutIMG=@$_POST["avOutIMG"];
			$avs->avInIMG=@$_POST["avInIMG"];
			$avs->avName=@$_POST["avName"];
			$avs->avSex=@$_POST["avSex"];
			$avs->avBirth=@$_POST["avBirth"];
			$avs->avNationality=@$_POST["avNationality"];
			$avs->avNation=@$_POST["avNation"];
			$avs->avProvince=@$_POST["avProvince"];
			$avs->avIDcard=@$_POST["avIDcard"];
			$avs->avAdrr=@$_POST["avAdrr"];
			$avs->avPostCode=@$_POST["avPostCode"];
			$avs->avWeiBo=@$_POST["avWeiBo"];
			$avs->avQQEmail=@$_POST["avQQEmail"];
			$avs->avMobile=@$_POST["avMobile"];
			$avs->avPhone=@$_POST["avPhone"];
			$avs->avHight=@$_POST["avHight"];
			$avs->avWeight=@$_POST["avWeight"];
			$avs->avFacePaint=intval(@$_POST["avFacePaint"]);
			$avs->avColor=@$_POST["avColor"];
			$avs->avEyeColor=@$_POST["avEyeColor"];
			$avs->avShoeSize=@$_POST["avShoeSize"];
			$avs->avSH=@$_POST["avSH"];
			$avs->avButs=@$_POST["avButs"];
			$avs->avWaist=@$_POST["avWaist"];
			$avs->avHips=@$_POST["avHips"];
			$avs->avCup=@$_POST["avCup"];
			$avs->avStyle=intval(@$_POST["avStyle"]);
			$avs->avWorkTime=@$_POST["avWorkTime"];
			$avs->avISAgree=intval(@$_POST["avISAgree"]);
			$avs->avContent=@$_POST["avContent"];
			
			$art=@$_GET["art"];
			$start=@$_POST["start"];
			$rows=@$_POST["rows"];
			echo "<pre>";
			print_r($avs);
			echo "</pre>"; 
		?>
		<h1>AVS 添加测试</h1>
		<form method=post action="testAVS_BLL.php?art=1">
			avTag:<input type="text" value="" name="avTag"> <br/>
			avOutIMG:<input type="text" value="" name="avOutIMG"> <br/>
			avInIMG:<input type="text" value="" name="avInIMG"> <br/>
			avName:<input type="text" value="" name="avName"> <br/>
			avSex:<input type="text" value="" name="avSex"> <br/>
			avBirth:<input type="text" value="" name="avBirth"> <br/>
			avNationality:<input type="text" value="" name="avNationality"> <br/>
			avNation:<input type="text" value="" name="avNation"> <br/>
			avProvince:<input type="text" value="" name="avProvince"> <br/>
			avIDcard:<input type="text" value="" name="avIDcard"> <br/>
			avAdrr:<input type="text" value="" name="avAdrr"> <br/>
			avPostCode:<input type="text" value="" name="avPostCode"> <br/>
			avWeiBo:<input type="text" value="" name="avWeiBo"> <br/>
			avQQEmail:<input type="text" value="" name="avQQEmail"> <br/>
			avMobile:<input type="text" value="" name="avMobile"> <br/>
			avPhone:<input type="text" value="" name="avPhone"> <br/>
			avHight:<input type="text" value="" name="avHight"> <br/>
			avWeight:<input type="text" value="" name="avWeight"> <br/>
			avFacePaint:<input type="text" value="" name="avFacePaint"> <br/>
			avColor:<input type="text" value="" name="avColor"> <br/>
			avEyeColor:<input type="text" value="" name="avEyeColor"> <br/>
			avShoeSize:<input type="text" value="" name="avShoeSize"> <br/>
			avSH:<input type="text" value="" name="avSH"> <br/>
			avButs:<input type="text" value="" name="avButs"> <br/>
			avWaist:<input type="text" value="" name="avWaist"> <br/>
			avHips:<input type="text" value="" name="avHips"> <br/>
			avCup:<input type="text" value="" name="avCup"> <br/>
			avStyle:<input type="text" value="" name="avStyle"> <br/>
			avWorkTime:<input type="text" value="" name="avWorkTime"> <br/>
			avISAgree:<input type="text" value="" name="avISAgree"> <br/>
			avContent:<input type="text" value="" name="avContent"> <br/>
			<input name="add" type="submit" value="添加"/>
		</form>
		
		<h1>AVS 删除测试</h1>
		<h3>按id删除</h3>
		<form method=post action="testAVS_BLL.php?art=2">
			AVID:<input type="text" value="" name="AVID"> <br/>
				 <input name="delete" type="submit" value="删除"/>
		</form>
		
		<h1>AVS 查询测试</h1>
		<h3>分页查询</h3>
		<form method=post action="testAVS_BLL.php?art=4">
			起始记录start:<input type="text" value="0" name="start"> <br/>
			分页显示条数rows:<input type="text" value="10" name="rows"> <br/>
			<input name="query" type="submit" value="查询"/>
		</form>
		<h3>按id查询</h3>
		<form method=post action="testAVS_BLL.php?art=5">
			AVID:<input type="text" value="" name="AVID"> <br/>
			<input name="query" type="submit" value="查询"/>
		</form>
		<h3>按姓名查询</h3>
		<form method=post action="testAVS_BLL.php?art=6">
			avName:<input type="text" value="" name="avName"> <br/>
			<input name="query" type="submit" value="查询"/>
		</form>
		
		<h1>AVS 更新测试</h1>
		<form method=post action="testAVS_BLL.php?art=7">
			输入AVID:<input type="text" value="" name="AVID"> <br/>
			<input name="add" type="submit" value="更新"/>
		</form>
		<?php 
			//test
			if($art=="1"){
				$bll=new AVS_BLL();
				if($bll->add($avs)) echo "1 true";
				else echo "1 false";
				$bll=null;
			}
			if($art=="2"){
				$bll=new AVS_BLL();
				if($bll->delete($id)) echo "2 true";
				else echo "2 false";
				$bll=null;
			}if($art=="3"){
				$bll=new AVS_BLL();
				if($bll->deleteByName($avName)) echo "3 true";
				else echo "3 false";
				$bll=null;
			}
			if($art=="4"){
				$bll=new AVS_BLL();
				$table=$bll->getByPage($start, $rows);
				show($table);
				$bll=null;
			}
			if($art=="5"){
				$bll=new AVS_BLL();
				$table=$bll->get($avs->AVID);
				show($table);
				$bll=null;
			}
			if($art=="6"){
				$bll=new AVS_BLL();
				$table=$bll->getByName($avs->avName);
				show($table);
				$bll=null;
			}
			if($art=="7"){
				$bll=new AVS_BLL();
				$table=$bll->get($avs->AVID);
				if(isset($avs->AVID)){?>
					<form method=post action="testAVS_BLL.php?art=8">
							<input type="hidden" value="<?php echo $table->Rows[0]['AVID']?>" name="AVID"> <br/>
					avName:<input type="text" value="<?php echo $table->Rows[0]['avName']?>" name="avName"> <br/>
					avSex:<input type="text" value="<?php echo $table->Rows[0]['avSex']?>" name="avSex"> <br/>
					avWeiBo:<input type="text" value="<?php echo $table->Rows[0]['avWeiBo']?>" name="avWeiBo"> <br/>
					avHight:<input type="text" value="<?php echo $table->Rows[0]['avHight']?>" name="avHight"> <br/>
					avWeight:<input type="text" value="<?php echo $table->Rows[0]['avWeight']?>" name="avWeight"> <br/>
					avButs:<input type="text" value="<?php echo $table->Rows[0]['avButs']?>" name="avButs"> <br/>
					avWaist:<input type="text" value="<?php echo $table->Rows[0]['avWaist']?>" name="avWaist"> <br/>
					avHips:<input type="text" value="<?php echo $table->Rows[0]['avHips']?>" name="avHips"> <br/>
					avContent:<input type="text" value="<?php echo $table->Rows[0]['avContent']?>" name="avContent"> <br/>
					<input name="add" type="submit" value="更新"/>
					</form><?php 
				}
			}
			if($art=="8"){
				$bll=new AVS_BLL();
				if($bll->update($avs))echo "8 true";
				else echo "8 false";
			}
			function show(DataTable $table){
				echo "<pre>";print_r($table);echo "</pre>";
				/*echo "<table><tr><th>avID</th><th>avName</th><th>avIMG</th><th>avTag</th><th>avAge</th>
					<th>avHight</th><th>avWeight</th><th>av3w</th><th>avContent</th><th>avDate</th></tr>";
				
				for($i=0;$i<$table->count;$i++){
					echo "<tr>";
					echo "<td>{$table->Rows[$i]['avID']}</td>
					<td>{$table->Rows[$i]['avName']}</td>
					<td>{$table->Rows[$i]['avIMG']}</td>
							<td>{$table->Rows[$i]['avTag']}</td>
							<td>{$table->Rows[$i]['avAge']}</td>
							<td>{$table->Rows[$i]['avHight']}</td>
							<td>{$table->Rows[$i]['avWeight']}</td>
							<td>{$table->Rows[$i]['av3w']}</td>
							<td>{$table->Rows[$i]['avContent']}</td>
							<td>{$table->Rows[$i]['avDate']}</td>"
							;
							echo "</tr>";
				}
				echo "</table>";*/
			}
		?>
	</body>
</html>
<?php

?>