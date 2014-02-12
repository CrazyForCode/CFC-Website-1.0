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
			$id=@$_POST["avID"];
			$avName=@$_POST["avName"];
			$avIMG=@$_POST["avIMG"];
			$avTag=@$_POST["avTag"];
			$avAge=@$_POST["avAge"];
			$avHight=@$_POST["avHight"];
			$avWeight=@$_POST["avWeight"];			
			$av3w=@$_POST["av3w"];
			$avContent=@$_POST["avContent"];			
			$avDate=@$_POST["avDate"];			
			$art=@$_GET["art"];
			$start=@$_POST["start"];
			$rows=@$_POST["rows"];
			
			echo "avName:".$avName."<br/>";
			echo "avIMG:".$avIMG."<br/>";
			echo "avTag:".$avTag."<br/>";
			echo "avAge:".$avAge."<br/>";
			echo "avHight:".$avHight."<br/>";
			echo "avWeight:".$avWeight."<br/>";
			echo "av3w:".$av3w."<br/>";
			echo "avContent:".$avContent."<br/>";
			echo "start:".$start."<br/>";
			echo "rows:".$rows."<br/>";
		?>
		<h1>AVS 添加测试</h1>
		<form method=post action="testAVS_BLL.php?art=1">
			avName:<input type="text" value="" name="avName"> <br/>
			avIMG:<input type="text" value="" name="avIMG"> <br/>
			avTag:<input type="text" value="" name="avTag"> <br/>
			avAge:<input type="text" value="" name="avAge"> <br/>
			avHight:<input type="text" value="" name="avHight"> <br/>
			avWeight:<input type="text" value="" name="avWeight"> <br/>
			av3w:<input type="text" value="" name="av3w"> <br/>
			avContent:<input type="text" value="" name="avContent"> <br/>
			<input name="add" type="submit" value="添加"/>
		</form>
		
		<h1>AVS 删除测试</h1>
		<h3>按id删除</h3>
		<form method=post action="testAVS_BLL.php?art=2">
			avID:<input type="text" value="" name="avID"> <br/>
				 <input name="delete" type="submit" value="删除"/>
		</form>
		<h3>按姓名删除</h3>
		<form method=post action="testAVS_BLL.php?art=3">
			avName:<input type="text" value="" name="avName"> <br/>
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
			id:<input type="text" value="" name="avID"> <br/>
			<input name="query" type="submit" value="查询"/>
		</form>
		<h3>按姓名查询</h3>
		<form method=post action="testAVS_BLL.php?art=6">
			avName:<input type="text" value="" name="avName"> <br/>
			<input name="query" type="submit" value="查询"/>
		</form>
		
		<h1>AVS 更新测试</h1>
		<form method=post action="testAVS_BLL.php?art=7">
			输入id:<input type="text" value="" name="avID"> <br/>
			<input name="add" type="submit" value="更新"/>
		</form>
		<?php 
			//test
			if($art=="1"){
				$bll=new AVS_BLL();
				$avs=new AVSInfo();
				$avs->avName=$avName;
				$avs->avIMG=$avIMG;
				$avs->avTag=$avTag;
				$avs->avAge=$avAge;
				$avs->avHight=$avHight;
				$avs->avWeight=$avWeight;
				$avs->av3w=$av3w;
				$avs->avContent=$avContent;
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
				$table=$bll->get($id);
				show($table);
				$bll=null;
			}
			if($art=="6"){
				$bll=new AVS_BLL();
				$table=$bll->getByName($avName);
				show($table);
				$bll=null;
			}
			if($art=="7"){
				$bll=new AVS_BLL();
				$table=$bll->get($id);
				if(isset($id)){?>
					<form method=post action="testAVS_BLL.php?art=8">
							<input type="hidden" value="<?php echo $table->Rows[0]['avID']?>" name="avID"> <br/>
					avName:<input type="text" value="<?php echo $table->Rows[0]['avName']?>" name="avName"> <br/>
					avIMG:<input type="text" value="<?php echo $table->Rows[0]['avIMG']?>" name="avIMG"> <br/>
					avTag:<input type="text" value="<?php echo $table->Rows[0]['avTag']?>" name="avTag"> <br/>
					avAge:<input type="text" value="<?php echo $table->Rows[0]['avAge']?>" name="avAge"> <br/>
					avHight:<input type="text" value="<?php echo $table->Rows[0]['avHight']?>" name="avHight"> <br/>
					avWeight:<input type="text" value="<?php echo $table->Rows[0]['avWeight']?>" name="avWeight"> <br/>
					av3w:<input type="text" value="<?php echo $table->Rows[0]['av3w']?>" name="av3w"> <br/>
					avContent:<input type="text" value="<?php echo $table->Rows[0]['avContent']?>" name="avContent"> <br/>
					<input type="hidden" value="<?php echo $table->Rows[0]['avDate']?>" name="avDate"> <br/>
					<input name="add" type="submit" value="更新"/>
					</form><?php 
				}
			}
			if($art=="8"){
				$bll=new AVS_BLL();
				$avs=new AVSInfo();				
				$avs->avID=$id;
				$avs->avName=$avName;
				$avs->avIMG=$avIMG;
				$avs->avTag=$avTag;
				$avs->avAge=$avAge;
				$avs->avHight=$avHight;
				$avs->avWeight=$avWeight;
				$avs->av3w=$av3w;
				$avs->avContent=$avContent;
				$avs->avDate=$avDate;
				print_r($avs);
				if($bll->update($avs))echo "8 true";
				else echo "8 false";
			}
			function show(DataTable $table){
				echo "<table><tr><th>avID</th><th>avName</th><th>avIMG</th><th>avTag</th><th>avAge</th>
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
				echo "</table>";
			}
		?>
	</body>
</html>
<?php

?>