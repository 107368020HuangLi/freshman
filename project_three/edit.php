<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>資料庫內容</title>
</head>
<body>
<h1 align="center"><font color="#FF0000">編輯病患基本資料</font></h1>
<?php
include("include/test_app_top.php"); 

?>
      
  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顯示資料</title>


<body>
		
        <table width="500" height="120" border="1"> 
        
<body background="background/ADDM.jpg">

<?php 
$id =!empty($_GET["id"])?$_GET["id"] :"" ;						
	
	if($id==""){ 

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
				
		for( $a = 1 ; $a <= $num ; $a++ ){
		
			$row=mysql_fetch_row($repeat);												
		
			echo "<tr><form>";
			echo "<td align=center>$a</td>";//編號

			for( $aaa = 1 ; $aaa <  $fields_num ; $aaa++){
				echo "<td align=center><input type='text' name='$the_fields_name[$aaa]' value='$row[$aaa]' size='20'/></td>";
			}	
			echo "<td align='center'><input type='submit' name='Submit' value='修改'/>
								     <input type='submit' name='Submit' value='刪除'/>
								     <input type='hidden' name='id' value='$row[0]'/></td>";																									
			echo "</form></tr>";
		}
		echo '</table>';
	}

	else{
		
	$sql_data2 = "SELECT * FROM userss";		     // 資料表		
	$repeat2 = mysql_query($sql_data2); 
	$num2=mysql_num_rows($repeat2);
		
	$result_field2=mysql_query('select * from userss'); //執行sql指令;
 	$fields_num2=mysql_num_fields($result_field2);//取得資料表欄位數

		for( $adjust_column = 0 ; $adjust_column < ($fields_num2) ; $adjust_column++ ){
			$meta2=mysql_fetch_field($result_field2);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name2[$adjust_column]=$meta2->name; //將欄位名稱儲存到$fields_name陣列
			
			$ACV[$adjust_column] = !empty($_GET["$the_fields_name2[$adjust_column]"])?$_GET["$the_fields_name2[$adjust_column]"]:null ;
	
			$final_field = $the_fields_name2[$adjust_column];
			$column = $ACV[$adjust_column];		
		}
		
		foreach($the_fields_name2 as $key_dele => $value_dele){
      		if($value_dele == 'id'){
         		unset($the_fields_name2[$key_dele]);
      		}
    	}
		
	$ACV_shift = array_shift($ACV);		
	$the_fields_name2 = array_values($the_fields_name2);

		for( $aass = 0 ; $aass < $fields_num2 ; $aass++){
			$stores[$aass] = $the_fields_name2[$aass]."="."'".$ACV[$aass]."'" ;
			$final_stores = implode(",",$stores);
		}
		
	$final_stores2 = substr($final_stores,0,-4);                    //刪除字串最後4個字元
	$Submit=!empty($_GET["Submit"])?$_GET["Submit"]:null;
	$msg='';
			
		if($Submit == '修改' ){
			$sql_data ="update userss set $final_stores2  WHERE id='$id'";
			$msg="修改完成";
		}

		else if($Submit =='刪除'){
			$sql_data ="DELETE FROM userss WHERE id='$id'";	
			$msg="刪除完成";
		}
	
		else{
			echo "操作錯誤";
			return;
		}
	
	mysql_query($sql_data) or die('SQL執行有誤');
	echo $msg;
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