<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>師生關係追蹤管理系統</title>

</head>

<body>
<form id="form1" name="form1" method="post" action="index2.php">
  <p>
    <label>
      <input type="radio" name="condition" value="0" id="condition_0" <?php //if($_POST ["condition"]=='0') echo "checked";?> />
      第幾屆畢業生</label>
    <label>
      <input type="radio" name="condition" value="1" id="condition_1"<?php //if($_POST ["condition"]=='1') echo "checked";?> />
      姓名</label>
    <label>
      <input type="radio" name="condition" value="2" id="condition_2"<?php //if($_POST ["condition"]=='2') echo "checked";?> />
      學號</label>
    <label>
      <input type="radio" name="condition" value="3" id="condition_3"<?php //if($_POST ["condition"]=='3') echo "checked";?> />
      專題老師</label>
    <label>
	<!--<input type="radio" name="condition" value="4" id="condition_4" />
    我的專題生</label>
	!-->
    關鍵字:
    <input type="text" name="conditiontext" id="conditiontext" value="<?php //echo $_POST ["conditiontext"] ;?>"/>
    <label for="conditiontext"></label>
    <input type="submit" name="submit1" id="submit1" value="送出" />
  </p>
</form>
<HR width="100%">

<table width="100%" border="1" id="table">

  <tr bgcolor="#A5A552">
    <th scope="col">學號</th>
    <th scope="col">姓名</th>
    <th scope="col">專題老師</th>
    <th scope="col">第幾屆</th>
    <th scope="col">FB UID</th>
    <th scope="col">FB名稱</th>
    <th scope="col">生日</th>
    <th scope="col">現居城市</th>
    <th scope="col">電話</th>
    <th scope="col">E-mail</th>
    <th scope="col">現任工作</th>
    <th scope="col">工作經歷</th>
  </tr>
  
<?php

	if (isset($_POST["conditiontext"])){

		
		
		$link_ID = mysql_connect("localhost","root","linsinjia");
		mysql_query("SET NAMES 'UTF8'");
		mysql_select_db("database");
		$textbox = $_POST ["conditiontext"];
		if(isset($_POST ["condition"]))
			$radiobox = $_POST ["condition"];		
		else
			$radiobox = "4" ;
		if($radiobox=="0"){
			$str = "SELECT * FROM studata WHERE year LIKE '%$textbox%';";
			$result=mysql_query($str,$link_ID);
		}
		else if($radiobox=="1"){
			$str = "SELECT * FROM studata WHERE stu_name LIKE '%$textbox%';";
			$result=mysql_query($str,$link_ID);
		}
		else if($radiobox=="2"){
			$str = "SELECT * FROM studata WHERE stu_id LIKE '%$textbox%';";
			$result=mysql_query($str,$link_ID);
						
		}
		else if($radiobox=="3"){
			$str = "SELECT * FROM studata WHERE teacher LIKE '%$textbox%';";
			$result=mysql_query($str,$link_ID);
		}else{
			$str = "SELECT * FROM studata ;";
			$result=mysql_query($str,$link_ID);
		}
		
		//$record = mysql_fetch_row($result);
		
		$sn_index = mysql_num_rows($result);
		
		mysql_close($link_ID);
		
		for($index=0;$index<$sn_index;$index++){
		
			$arr[$index]=mysql_fetch_array($result);						
			
		}
		
			for ($i=0;$i<$sn_index;$i++){

?>			

				<tr>
					<td><?php echo $arr[$i][0];?></td>
					<td><?php echo $arr[$i][1];?></td>
					<td><?php echo $arr[$i][2];?></td>
					<td><?php echo $arr[$i][3];?></td>
					<td><?php echo $arr[$i][4];?></td>
					<td><?php echo $arr[$i][5];?></td>
					<td><?php echo $arr[$i][6];?></td>
					<td><?php echo $arr[$i][7];?></td>
					<td><?php echo $arr[$i][8];?></td>
					<td><?php echo $arr[$i][9];?></td>
					<td><?php echo $arr[$i][10];?></td>
					<td><?php echo $arr[$i][11];?></td>
				</tr>
<?php			
		}
		}
?>

</table>
<table width="100%">
			<tr>
					<td align="center">
							<form>
								<?php //<input id="go_up" type=submit  value="上一頁" size=輸出鈕寬度>?>
								<?php //<input id="go_down" type=submit  value="下一頁" size=輸出鈕寬度> ?>
							</form>
					</td>
			</tr>
</table>
</body>
</html>