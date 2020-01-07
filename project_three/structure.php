<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>資料庫結構</title>
</head>
<body>

<?php
include("include/test_app_top.php"); 
?>
      
  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顯示欄位資料</title>

	<h3><font color="#CC00FF">Hint 1 : 現有欄位數必須符合CSV欄位數</font></h3>
    <h3><font color="#CC00FF">Hint 2 : id欄位不可刪除</font></h3>
    <h3><font color="#CC00FF">Hint 3 : B,C欄位為</font><font color="#FF0000"> 病歷號 </font><font color="#CC00FF">與</font><font color="#FF0000"> 手術日期 </font></h3>
<body>
		
        <table width="500" height="120" border="1"> 
        
<body background="background/ADDM.jpg">

<?php 
	$sql_data = "SELECT * FROM userss";		     // 資料表		
	$repeat = mysql_query($sql_data); 
	$num=mysql_num_rows($repeat);
	
	$result_field=mysql_query('select * from userss'); //執行sql指令;
 	$fields_num=mysql_num_fields($result_field);//取得資料表欄位數

	//////////////////////////////處理欄位//////////////////////////////// 
		for ( $x = 0 ; $x < ($fields_num) ; $x++ ){
			$meta=mysql_fetch_field($result_field);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name[$x]=$meta->name; //將欄位名稱儲存到$fields_name陣列	
  		}
						
			for( $aaa = 0 ; $aaa <  $fields_num ; $aaa++ ){
				echo "<tr><form>";
				//	echo "<td align='center'></td>";   //
					echo "<td align='center'>".((int)$aaa+1)."</td>";//編號		
					echo "<td align='center'>$the_fields_name[$aaa]</td>";	
					echo "<td align='center'><input type='submit' name='Submit' value='刪除'/>
					                         <input type='hidden' name='column_name' value='$the_fields_name[$aaa]'/></td>";																																			
				echo "</form></tr>";
			} 
	
			
			$Submit=!empty($_GET["Submit"])?$_GET["Submit"]:null;
			$column_name = !empty($_GET["column_name"])?$_GET["column_name"]:null;
			
			$msg='';
	
				if($Submit == '刪除' && $column_name!='id' ){
					$sql_data = "ALTER TABLE userss DROP $column_name";	
					mysql_query($sql_data);
					$msg="刪除完成";
					 echo '<meta http-equiv=REFRESH CONTENT=0.5;url=structure.php>';		
				}
		
				echo $msg;
				
			//	mysql_close();
		//echo '</table>';       
?>

<form id = "form_add" name="form_add" method="post" action="">
	<p>增加欄位名稱:
		<input type="text" name="adds_column_name" id="adds_column_name" value="<?php echo $adds_column_name?>" />
    </p>
       
    <p>
    	<input type="submit" name="button_adds" id="button_adds" value="增加欄位"/>
    </p>
</form>

  <?PHP
	echo '現有欄位數為:'.$fields_num.'<br>';
	
	if($_POST['adds_column_name'] != '' ){
		$adds_column_name = $_POST['adds_column_name'] ;
		$sql_column_data = "ALTER TABLE userss ADD COLUMN $adds_column_name TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL"; // 資料表
		$repeat_column = mysql_query($sql_column_data); 
		echo 'add '.$_POST['adds_column_name'].' successful,現有欄位數為:'.$fields_num.'';
		//$num=mysql_num_rows($repeat);		
		echo '<meta http-equiv=REFRESH CONTENT=0.5;url=structure.php>';	
	}
	mysql_close();

  ?> 

		<table border="0" align="center" cellpadding="4">
			<tr>
				<td><p><a href="import_data.php">go_Back</a><p></td>
			</tr>
		</table>
                	
</body>
</head>
</html>