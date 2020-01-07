<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>獨立t檢定</title>
</head>

<body>
 	<table width="500" height="120" border="1"> 
	<body background="background/ADDM.jpg">
    <h1 align="center"><font color="#FF0000">獨立t檢定(平均數檢定)</font></h1>
    
    <?PHP
		include("myprojectcsv.php");
		$myprojectcsv = new myprojectcsv();
	?>       
 		<h3 align="center"><font color="#CC00FF">Hint 1 : userss資料表很重要,不可更動</font></h3>
 <?php
 mysql_connect("localhost","root","123456789");    //與資料庫建立連線
 mysql_select_db("project_three");  //選擇資料庫 
 /*建立資料表*/
 ?>
    
  <?PHP

  $find_table = "SHOW TABLES FROM project_three";
  $repeat_table = mysql_query($find_table);
  
  $number = mysql_num_rows($repeat_table);

   for( $zxcv = 0 ; $zxcv < $number ; $zxcv++ ){
	 $row[$zxcv] = mysql_result($repeat_table,$zxcv);
   }
  ?>
  
  
  
  <?PHP  
   for( $count_table = 0 ; $count_table < $number ; $count_table++ ){
		echo "<form>";
		
		if( $count_table % 5 == 0 ){
			echo "<tr><td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>									
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 1 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 2 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 3 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 4 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td></tr>";	
		}
		
		echo "</form>";
	} 
 ?>
 
 
 	 <?PHP
	 	$show_del = !empty($_GET["show"])?$_GET["show"]:null;
		$table_name = !empty($_GET["table_name"])?$_GET["table_name"]:null;
		$get_row_select = $_GET['row_chose_name'] ? $_GET['row_chose_name'] : 0 ;                      ///////
		$get_col_select = $_GET['col_chose_name'] ? $_GET['col_chose_name'] : 0 ;
	 ?>     
      </table>     
       
     <table width="500" height="120" border="1"> 
     
     <?PHP
	 	$show_first = "SELECT * FROM userss"; // 資料表
		$repeat_show_first = mysql_query($show_first); 
		$num_show_first = mysql_num_rows($repeat_show_first);			
		$fields_num_show_first = mysql_num_fields($repeat_show_first);//取得資料表欄位數
		
		for( $ars_show_first = 0 ; $ars_show_first < $fields_num_show_first ; $ars_show_first++ ){
			echo "<from>";
			$result_zero_show_first[$ars_show_first] = mysql_result($repeat_show_first,0,$ars_show_first);  //列印出第一列資訊
			echo "<td align=center>$result_zero_show_first[$ars_show_first]</td>";
		}
		echo "</tr>";	
	 ?>
     
     <h2 align="center"><font color="#FF00FF"><?PHP echo "查詢資料表為"?> </font></h2>
     <h2 align="center"><font color="#FF0000"><?PHP echo $table_name ?> </font></h2>
     
	 <?PHP
	 if( $show_del == "查看資料表" && $table_name != "userss" ){	
	 	$sql_query_data = "USE query_result" ;
		$sql_query_repeat = mysql_query($sql_query_data);
		$sql_query_find_tables = "SELECT * FROM query_".$table_name;
		$sql_query_repeat2 = mysql_query($sql_query_find_tables);
		
		$query_num = mysql_num_rows($sql_query_repeat2);
		$query_row_data = mysql_fetch_row($sql_query_repeat2); 

	
	 	$sql_show_table = "USE project_three" ;
	  	$sql_show_repeat = mysql_query($sql_show_table);
		$sql_find_dataa = "SELECT * FROM $table_name";	
		$sql_show_repeat2 = mysql_query($sql_find_dataa);
	    $num_dataa = mysql_num_rows($sql_show_repeat2);
	
		$result_field_dataa = mysql_query('select * from userss'); //執行sql指令;
 		$fields_num_dataa = mysql_num_fields($sql_show_repeat2);//取得資料表欄位數
		
		$sql_truncate_table = "truncate TABLE ".$table_name ; /*清空SQL資料表*/
		mysql_query($sql_truncate_table);
		
		$sql_insert_new_data = "insert into ".$table_name." SELECT * FROM userss where $query_row_data[1] GROUP BY id"; /*重建SQL資料表*/

		mysql_query($sql_insert_new_data);
				
		for ( $x = 0 ; $x < ($fields_num_dataa) ; $x++ ){
			$meta = mysql_fetch_field($result_field_dataa);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name_dataa[$x] = $meta->name; //將欄位名稱儲存到$fields_name陣列
  		}
		
		for( $a = 1 ; $a <= $num_dataa ; $a++ ){	
			$row_data2 = mysql_fetch_row($sql_show_repeat2);												
			echo "<tr><form>";
			echo "<td align=center>$a</td>";//編號

			for( $aaa = 1 ; $aaa <  $fields_num_dataa ; $aaa++){
				echo "<td align=center><input type='text' value='$row_data2[$aaa]' size='20'/></td>";
			}	
		}
	 }
	 	 
	 else if( $show_del == "查看資料表" && $table_name == "userss" ){
	 	$sql_dataa_userss = "SELECT * FROM $table_name" ;
		$repeat_dataa_userss = mysql_query($sql_dataa_userss);
		$num_dataa_userss = mysql_num_rows($repeat_dataa_userss);
		
		$result_field_dataa_userss = mysql_query('select * from userss'); //執行sql指令;
 		$fields_num_dataa_userss = mysql_num_fields($repeat_dataa_userss);//取得資料表欄位數
		
		for ( $x_userss = 0 ; $x_userss < ($fields_num_dataa_userss) ; $x_userss++ ){
			$meta_userss = mysql_fetch_field($result_field_dataa_userss);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name_dataa_userss[$x_userss] = $meta_userss->name; //將欄位名稱儲存到$fields_name陣列
  		}
		
		for( $a_userss = 1 ; $a_userss <= $num_dataa_userss ; $a_userss++ ){	
			$row_data_userss = mysql_fetch_row($repeat_dataa_userss);												
			echo "<tr><form>";
			echo "<td align=center>$a_userss</td>";//編號

			for( $aaa_userss = 1 ; $aaa_userss <  $fields_num_dataa_userss ; $aaa_userss++){
				echo "<td align=center><input type='text' value='$row_data_userss[$aaa_userss]' size='20'/></td>";
			}	
		}
	 }
	 
	 else{
	 	echo "請選擇要查看的資料表";
		return;
	 }
	?>    
     </table>
     
      <p><font size = "5">計算獨立t檢定</font></p>
      
      <form action="" name="form_row_col" id="form_row_col" method="get" enctype="multipart/form-data"> 
        
        <input type="hidden" name="show" value="查看資料表"/>
        <input type="hidden" name="table_name" value="<?PHP echo $table_name ?>"/>
        
        <p><font size = "5">Step1.1: 選擇<font color="#FF0000">分組變數</font></p></font>
        
        <select name ="row_chose_name">             <?PHP   /////////////  ?>
        	<option>選擇分組變數</option>
        	<?PHP
				for( $ars2 = 1 ; $ars2 < $fields_num_dataa ; $ars2++){	
					$result_zero2[$ars2] = mysql_result($result_field_dataa,0,$ars2);  //列印出第一列資訊
			?>
        	<option value="<?PHP echo $ars2 ?>"><?PHP echo $result_zero2[$ars2] ?></option>       
        	<?PHP
        		}
			?>       
        </select>
     
     	<p><font size = "5">Step1.2: 選擇<font color="#FF0000">檢定變數</font></p></font>
        
        <select name ="col_chose_name">         <?PHP   /////////////  ?>
        	<option>選擇檢定變數</option>
        	<?PHP
				for( $ars22_2 = 1 ; $ars22_2 < $fields_num_dataa ; $ars22_2++){	
				   // $col_chose = test_input($_GET["col_chose_name"]); 
					$result_zero2_2[$ars22_2] = mysql_result($result_field_dataa,0,$ars22_2);  //列印出第一列資訊
			?>
        	<option value="<?PHP echo $ars22_2 ?>"><?PHP echo $result_zero2_2[$ars22_2] ?></option>
             
        	<?PHP
        		}
			?>
		</select>
                 
        <p><font size = "8">Step2: 選擇<font color="#FF0000">變數數值</font>或<font color="#FF0000">種類</font></p></font>
    	
        <p><font size = "5">Step2.1: 選擇<font color="#FF0000">分組變數</font>數值或種類</p></font>
        
    	    <input type="radio" name="num_type_row" value="numbers_row" checked="true">連續數字 型別(分割點):
            <input type="text" name="get_row_type_number"><br>
        <br>
        	<input type="radio" name="num_type_row" value="types_row">種類 型別(以逗號分隔):
        	<input type="text" name="get_row_type_type"><br>
        <br>      
            <input type="submit" name="new_window" id="new_window" value="check" 
                   style="width:100px; height:40px; border:2px  #000000 dashed; background-color:pink; font-size:20px;" />	
     </form>
     
	 
	 	<?PHP
			$chose_row_var_is = $_GET["row_chose_name"];
			$chose_col_var_is = $_GET["col_chose_name"];
				
			$chose_row_var_type = $_GET["num_type_row"];
				
			$input_row_var_num = $_GET["get_row_type_number"];
			$input_row_var_type = $_GET["get_row_type_type"];
			
			$input_row_var_num_split = explode(",",$input_row_var_num);

			$count_input_row_var_num_split = count($input_row_var_num_split);
			
			$count_input_row_var_num_split_add_one = $count_input_row_var_num_split +1 ;
			
     		if( $chose_row_var_is != "選擇分組變數" && $chose_col_var_is != "選擇檢定變數" && isset($_GET["num_type_row"]) ){   //issert($_GET['num_type_row']) 看有無取得參數
			/*	
				echo "<br>";
				echo $chose_row_var_is."<br>";
				echo $chose_col_var_is."<br>";
				
				echo $chose_row_var_type."<br>";
				
				echo $input_row_var_num."<br>";
				
				echo $input_row_var_num_split[0]."<br>";
				echo $input_row_var_num_split[1]."<br>";
				echo $count_input_row_var_num_split."<br>";
				echo "<br>";
			*/
			}else{
				echo "操作有疏漏";
			}
     ?>
     
     <?PHP
     	$query_sum[$row_number][$col_number] = "SELECT * FROM $table_name WHERE A like '%$input_col_var_num_split[$col_number]%' " ;    
		
		for( $row_number = 0 ; $row_number < $count_input_row_var_num_split ; $row_number++ ){
			$query_ttest[$row_number] = "SELECT * FROM $table_name WHERE A like '%$input_row_var_num_split[$row_number]%' ";		//需修正
			$repeat_query[$row_number] =  mysql_query($query_ttest[$row_number]); 
			$repeat_query2[$row_number] =  mysql_query($query_ttest[$row_number]); 
			
			$result_numbers[$row_number] = mysql_num_rows($repeat_query[$row_number]);	
			
			while($count_all[$row_number] = mysql_fetch_array($repeat_query[$row_number])){
				$everyone_all[$row_number] += (int)$count_all[$row_number]['B'];            //需修正
			}
			
			$final_all_result[$row_number] = round( ($everyone_all[$row_number] / $result_numbers[$row_number]), 1);
			
			while($count_all2[$row_number] = mysql_fetch_array($repeat_query2[$row_number])){
				$count_del_avg[$row_number] = $count_all2[$row_number]['B'] - $final_all_result[$row_number]."<br>"; 
				$count_del_avg_square[$row_number] = $count_del_avg[$row_number] * $count_del_avg[$row_number] ;
				$final_count_del_avg_square[$row_number] += (float)$count_del_avg_square[$row_number];
			}
			
			$final_stdev[$row_number] = ($final_count_del_avg_square[$row_number] / $result_numbers[$row_number]) ."<br>"; 
			$sqrt_final_stdev[$row_number] = round (sqrt($final_stdev[$row_number]),1) ;
			
			$std_error[$row_number] = round( $sqrt_final_stdev[$row_number] / sqrt($result_numbers[$row_number]), 1);	//平均數標準誤
		}		
	 ?>
     
     
     
     <?PHP
	 	if( $chose_row_var_is != "選擇分組變數" && $chose_col_var_is != "選擇檢定變數" && isset($_GET["num_type_row"]) ){   //issert($_GET['num_type_row']) 看有無取得參數
			echo "<center>";
				echo "<form>";
					echo "<table border='1'>";
						
						echo "<tr>"; 
							echo "<td colspan = '6' align='center' >"."<font color='#FF0000'>".組別統計量."</td>"."</font>";							
						echo "</tr>";
						
						echo "<tr>";
							echo "<td>"."選擇檢定變數"."</td>";
							echo "<td>".$result_zero2[$_GET['row_chose_name']]."</td>";
							echo "<td>"."樣本數"."</td>";
							echo "<td>"."平均數"."</td>";
							echo "<td>"."標準差"."</td>";
							echo "<td>"."平均數標準誤"."</td>";
						echo "</tr>";
						
						echo "<tr>";
							echo "<td rowspan = '2' align='center' >".$result_zero2[$_GET['col_chose_name']]."</td>"."</font>";
							echo "<td>".$input_row_var_num_split[0]."</td>";
							echo "<td>".$result_numbers[0]."</td>";
							echo "<td>".$final_all_result[0]."</td>";
							echo "<td>".$sqrt_final_stdev[0]."</td>"; 
							echo "<td>".$std_error[0]."</td>";
						echo "</tr>";
						
						echo "<tr>";
							echo "<td>".$input_row_var_num_split[1]."</td>";
							echo "<td>".$result_numbers[1]."</td>";
							echo "<td>".$final_all_result[1]."</td>";
							echo "<td>".$sqrt_final_stdev[1]."</td>";
							echo "<td>".$std_error[1]."</td>";
						echo "</tr>";
						
					echo "</table>";
				echo "</form>";
			echo "</center>";
				
		}else{
			echo "操作有疏漏";
		}
		
	 ?>
            
    	<table border="0" align="center" cellpadding="4">
			<tr>
				<td><p><a href="import_data.php">go_Back</a><p></td>
			</tr>
		</table>

</body>
</html>