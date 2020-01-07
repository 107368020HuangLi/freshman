<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table_名稱</title>
</head>

<body>
 	<table width="500" height="120" border="1"> 
	<body background="background/ADDM.jpg">
    <h1 align="center"><font color="#FF0000">查看歷史資料表</font></h1>
    
    <?PHP
		include("myprojectcsv.php");
		$myprojectcsv = new myprojectcsv();
		
		if( isset($_POST['exp'])) {
			$myprojectcsv->export();
		}
	?>
        <center>
			<form method="post"> 
   		    <input type="submit" name="exp" value="Export" 
            	   style=" width:100px; height:40px; border:2px  #000000 dashed; 		
                           background-color:#3BFF3B; font-size:20px;"/>
			</form>
		</center>
        
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
									 <input type='submit' name='show' value='刪除資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 1 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
									 <input type='submit' name='show' value='刪除資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 2 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
			 						 <input type='submit' name='show' value='刪除資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 3 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
									 <input type='submit' name='show' value='刪除資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td>";	
		}
		
		if( $count_table % 5 == 4 ){
			echo "<td align='center'>".((int)$count_table+1)."</td>";//編號		
			echo "<td align='center'>$row[$count_table]</td>";	
			echo "<td align='center'><input type='submit' name='show' value='查看資料表'/>
									 <input type='submit' name='show' value='刪除資料表'/>
					            	 <input type='hidden' name='table_name' value='$row[$count_table]'/></td></tr>";	
		}
		
		echo "</form>";
	} 
 ?>
 
 
 	 <?PHP
	 	$show_del = !empty($_GET["show"])?$_GET["show"]:null;
		$table_name = !empty($_GET["table_name"])?$_GET["table_name"]:null;
		$get_column = $_GET['column'] ? $_GET['column'] : 0 ;                      ///////
		$get_number = $_GET['number'] ? $_GET['number'] : 0 ;                      ///////////
	 ?>
     
     <?PHP
	 	$get_column_cal_x = $_GET['column_cal_x'] ? $_GET['column_cal_x'] : 0 ;
		$get_column_cal_y = $_GET['column_cal_y'] ? $_GET['column_cal_y'] : 0 ;
	 ?>
     
     <?PHP
	 	$get_column_draw_x = $_GET['column_draw_x'] ? $_GET['column_draw_x'] : 0 ;
		$get_column_draw_y = $_GET['column_draw_y'] ? $_GET['column_draw_y'] : 0 ;
	 ?>
     
     
      </table>     
      <br>
      </br>
     
      <br>
      </br>
       
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
//		echo $query_row_data[1];
	
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
//		echo $sql_insert_new_data;
		mysql_query($sql_insert_new_data);

		//$final_num_dataa = mysql_num_rows($sql_show_repeat2);
				
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
	 
	 else if($show_del == "刪除資料表" && $table_name != "userss"){
	 	$sql_dataa = "DROP TABLE $table_name" ;
		mysql_query($sql_dataa);
		
		$select_drop_database_cal = "USE cal_result" ;
		mysql_query($select_drop_database_cal);
		
		$sql_cal_chose_drop = "DROP TABLE cal_".$table_name ;	
		mysql_query($sql_cal_chose_drop);
		
		$select_drop_database_query = "USE query_result" ;
		mysql_query($select_drop_database_query);
		
		$sql_query_chose_drop = "DROP TABLE query_".$table_name ;	
		mysql_query($sql_query_chose_drop);
		
		echo '<meta http-equiv=REFRESH CONTENT=0.1;url=every_table.php>';
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
     
    <br>
    </br>
    
    <br>
    </br>
    
    <p><font size = "5">數值計算</font></p>
    
		<form method="get"> 
        
        <input type="hidden" name="show" value="查看資料表"/>
        <input type="hidden" name="table_name" value="<?PHP echo $table_name ?>"/>
        
        <select name ="column">
        <option>選擇計算欄位</option>
        
        <?PHP
		for( $ars2 = 1 ; $ars2 < $fields_num_dataa ; $ars2++){	
			$result_zero2[$ars2] = mysql_result($result_field_dataa,0,$ars2);  //列印出第一列資訊
		?>
        <option value="<?PHP echo $ars2 ?>"><?PHP echo $result_zero2[$ars2] ?></option>
        <?PHP
        }
		?>
        
        </select>
        
        
        <select name ="number" onChange="this.form.submit()">
        <option>選擇</option>
        <option value= "1">平均</option>
        <option value="2">最小值</option>
        <option value= "3">最大值</option>
        <option value="4">筆數</option>
        <option value= "5">標準差</option>
        <option value="6">變異數</option>
		</select>
        <br />
        <br/>
        <br/>
        </form>
        
    <?PHP
	  	
	    if( $get_number == 1 && $get_column != 0 ) {
			$sql_data3 = " SELECT * FROM $table_name ";			
			$repeat3 = mysql_query($sql_data3); 
			while($row_result3 = mysql_fetch_array($repeat3)){
				$everyone_age += (int)$row_result3[$_GET['column']];
				$count_number++;	
			}
			echo "<td align=center>"."選擇欄位為: " ?> 
            
            <font color="#FF0000"> 
			<?PHP echo $result_zero2[$_GET['column']]."</td>" ; ?> 
            </font>
            
			<?PHP
			echo "<br>" ;
			echo "<td align=center>"."  平均為:" ?>
            <font color="#FF0000"> 
			<?PHP
				$final_cal_avg = round(($everyone_age/$count_number),1) ;
				echo $final_cal_avg."</td></tr>"; 
			?>
            </font>
     
	 <?PHP
	 		/////////////// 建立資料庫/表  /////////////////儲存公式/////////////////
			
			$sql_set_new_database = "CREATE DATABASE cal_result" ;
			mysql_query($sql_set_new_database);
			
			$select_database = "USE cal_result" ;
			mysql_query($select_database);
			 			
			$sql_table_cal = "CREATE TABLE  cal_".$table_name."( 
			cal_id INT NOT NULL AUTO_INCREMENT,
			cal_method VARCHAR(100) NOT NULL,
			cal_column VARCHAR(100) NOT NULL,
			final_result TEXT NOT NULL,
			PRIMARY KEY ( cal_id ))";
			mysql_query($sql_table_cal);
			
			//$repeat_unique = "ALTER TABLE cal_".$table_name." ADD UNIQUE meth_col ( cal_method , cal_column )" ;
			//mysql_query($repeat_unique);
			
			$sql_table_insert = "INSERT INTO cal_".$table_name."(
			cal_method , cal_column , final_result ) VALUES ( ".$get_number.",".$get_column.",".$final_cal_avg.")";
			mysql_query($sql_table_insert);		
	 ?>       
     	
 
	<?PHP
		}
		
		if( $get_number == 2 && $get_column != 0 ) {
			$sql_data3 = " SELECT * FROM $table_name ";
		
			$repeat3 = mysql_query($sql_data3); 
			
			for( $find_col_min = 0 ; $find_col_min < $num_dataa ; $find_col_min++){
				$dataa_min = mysql_fetch_row($repeat3);
				$stores_data_min[$find_col_min] = $dataa_min[$_GET['column']] ;
			}
			
			$min_data = $stores_data_min[0];
			
			for( $compare_min = 0 ; $compare_min < $num_dataa ; $compare_min++ ){
				if( $min_data > $stores_data_min[$compare_min] ){
					$min_data = $stores_data_min[$compare_min];
				}
			}
			echo "<td align=center>"."選擇欄位為: " ?> 
            
            <font color="#FF0000"> 
            <?PHP echo $result_zero2[$_GET['column']]."</td>" ; ?>
            </font>
            
			<?PHP
			echo "<br>" ;
			echo "<td align=center>"."  最小值為:" ?> 
			
            <font color="#FF0000"> 
            <?PHP
				$final_min_data = round($min_data,1);
			?>
			<?PHP echo $final_min_data."</td>"; ?>
            
            </font>
            
    <?PHP
	 		/////////////// 建立資料庫/表  /////////////////儲存公式/////////////////
			
			$sql_set_new_database = "CREATE DATABASE cal_result" ;
			mysql_query($sql_set_new_database);
			
			$select_database = "USE cal_result" ;
			mysql_query($select_database);
			 			
			$sql_table_cal = "CREATE TABLE  cal_".$table_name."( 
			cal_id INT NOT NULL AUTO_INCREMENT,
			cal_method VARCHAR(100) NOT NULL,
			cal_column VARCHAR(100) NOT NULL,
			final_result TEXT NOT NULL,
			PRIMARY KEY ( cal_id ))";
			mysql_query($sql_table_cal);
			
//			$repeat_unique = "ALTER TABLE cal_".$table_name." ADD UNIQUE meth_col ( cal_method , cal_column )" ;
//			mysql_query($repeat_unique);
			
			$sql_table_insert = "INSERT INTO cal_".$table_name."(
			cal_method , cal_column , final_result ) VALUES ( ".$get_number.",".$get_column.",".$final_min_data.")";
			mysql_query($sql_table_insert);			
	 ?>       
                    
	<?PHP
		}
		
	   if( $get_number == 3 && $get_column != 0 ) {
			$sql_data3 = " SELECT * FROM $table_name ";
		
			$repeat3 = mysql_query($sql_data3); 
			
			for( $find_col_max = 0 ; $find_col_max < $num_dataa ; $find_col_max++ ){
				$dataa_max = mysql_fetch_row($repeat3);
				$stores_data_max[$find_col_max] = $dataa_max[$_GET['column']] ;
			}
			
			$max_data = $stores_data_max[0];
			
			for( $compare_max = 0 ; $compare_max < $num_dataa ; $compare_max++ ){
				if( $max_data < $stores_data_max[$compare_max] ){
					$max_data = $stores_data_max[$compare_max];
				}
			}
			echo "<td align=center>"."選擇欄位為: " ?> 
            
            <font color="#FF0000"> 
			<?PHP echo $result_zero2[$_GET['column']]."</td>" ; ?>
            </font>
            
            <?PHP
			echo "<br>" ;
			echo "<td align=center>"."  最大值為:" ?>
            
            <font color="#FF0000"> 
            <?PHP
				$final_max_data = round($max_data,1);
			?>
            <?PHP echo $final_max_data."</td>"; ?>
			</font>
            
    <?PHP
	 		/////////////// 建立資料庫/表  /////////////////儲存公式/////////////////
			
			$sql_set_new_database = "CREATE DATABASE cal_result" ;
			mysql_query($sql_set_new_database);
			
			$select_database = "USE cal_result" ;
			mysql_query($select_database);
			 			
			$sql_table_cal = "CREATE TABLE  cal_".$table_name."( 
			cal_id INT NOT NULL AUTO_INCREMENT,
			cal_method VARCHAR(100) NOT NULL,
			cal_column VARCHAR(100) NOT NULL,
			final_result TEXT NOT NULL,
			PRIMARY KEY ( cal_id ))";
			mysql_query($sql_table_cal);
			
			//$repeat_unique = "ALTER TABLE cal_".$table_name." ADD UNIQUE meth_col ( cal_method , cal_column )" ;
			//mysql_query($repeat_unique);
			
			$sql_table_insert = "INSERT INTO cal_".$table_name."(
			cal_method , cal_column , final_result ) VALUES ( ".$get_number.",".$get_column.",".$final_max_data.")";
			mysql_query($sql_table_insert);			
	 ?>              
            
            
     <?PHP
        }
		
		
	   if( $get_number == 4 && $get_column != 0 ) {
			$sql_data3 = " SELECT * FROM $table_name ";
		
			$repeat3 = mysql_query($sql_data3); 
			while($row_result3 = mysql_fetch_array($repeat3)){
				$count_number++;	
			}
			echo "<td align=center>"."選擇欄位為: " ?> 
            
			<font color="#FF0000"> 
			<?PHP echo $result_zero2[$_GET['column']]."</td>" ; ?>
			</font>
			
            <?PHP
            echo "<br>" ;
			echo "<td align=center>"."   筆數為:" ?> 
			
            <font color="#FF0000"> 
			<?PHP echo $count_number."</td>"; ?>
			</font>
            
    <?PHP
	 		/////////////// 建立資料庫/表  /////////////////儲存公式/////////////////
			
			$sql_set_new_database = "CREATE DATABASE cal_result" ;
			mysql_query($sql_set_new_database);
			
			$select_database = "USE cal_result" ;
			mysql_query($select_database);
			 			
			$sql_table_cal = "CREATE TABLE  cal_".$table_name."( 
			cal_id INT NOT NULL AUTO_INCREMENT,
			cal_method VARCHAR(100) NOT NULL,
			cal_column VARCHAR(100) NOT NULL,
			final_result TEXT NOT NULL,
			PRIMARY KEY ( cal_id ))";
			mysql_query($sql_table_cal);
			
			//$repeat_unique = "ALTER TABLE cal_".$table_name." ADD UNIQUE meth_col ( cal_method , cal_column )" ;
			//mysql_query($repeat_unique);
			
			$sql_table_insert = "INSERT INTO cal_".$table_name."(
			cal_method , cal_column , final_result ) VALUES ( ".$get_number.",".$get_column.",".$count_number.")";
			mysql_query($sql_table_insert);			
	 ?>             
            
      <?PHP
        }
		
		 if( $get_number == 5 && $get_column != 0 ) {
			$sql_data3 = " SELECT * FROM $table_name ";
		
			$repeat3 = mysql_query($sql_data3); 

			for( $find_col_data = 0 ; $find_col_data < $num_dataa ; $find_col_data++ ){
				$data_array= mysql_fetch_row($repeat3);
				$stores_data_array[$find_col_data] = $data_array[$_GET['column']] ;
			}
			
			for( $cal_avg = 0 ; $cal_avg < $num_dataa ; $cal_avg++ ){
				$total_data += $stores_data_array[$cal_avg];
			}
			
			$avg_count = $total_data/$num_dataa ;
			 
			for($cal_avg2 = 0 ; $cal_avg2 < $num_dataa ; $cal_avg2++ ){
				$data_delete_avg[$cal_avg2] = ($stores_data_array[$cal_avg2]-$avg_count) ;
			}
			
			for($cal_avg3 = 0 ; $cal_avg3 < $num_dataa ; $cal_avg3++ ){
				$data_square[$cal_avg3] = $data_delete_avg[$cal_avg3] * $data_delete_avg[$cal_avg3] ;	
			}
			
			for($cal_avg4 = 0 ; $cal_avg4 < $num_dataa ; $cal_avg4++ ){
				$data_add += $data_square[$cal_avg4]  ;	
			}
			
			$final_data = ( $data_add / $num_dataa );
			$final_data_count = sqrt($final_data);
			
			echo "<td align=center>"."選擇欄位為: " ?> 
			
            <font color="#FF0000"> 
			<?PHP echo $result_zero2[$_GET['column']]."</td>" ; ?>
            </font>
            
            <?PHP	
			echo "<br>" ;	
			echo "<td align=center>"."   標準差為:" ?> 
			
            <font color="#FF0000"> 
            <?PHP
				$final_sgd = round($final_data_count,1) ;
			?>
			<?PHP echo $final_sgd."</td>"; ?>
			</font>
            
    <?PHP
	 		/////////////// 建立資料庫/表  /////////////////儲存公式/////////////////
			
			$sql_set_new_database = "CREATE DATABASE cal_result" ;
			mysql_query($sql_set_new_database);
			
			$select_database = "USE cal_result" ;
			mysql_query($select_database);
			 			
			$sql_table_cal = "CREATE TABLE  cal_".$table_name."( 
			cal_id INT NOT NULL AUTO_INCREMENT,
			cal_method VARCHAR(100) NOT NULL,
			cal_column VARCHAR(100) NOT NULL,
			final_result TEXT NOT NULL,
			PRIMARY KEY ( cal_id ))";
			mysql_query($sql_table_cal);
			
			//$repeat_unique = "ALTER TABLE cal_".$table_name." ADD UNIQUE meth_col ( cal_method , cal_column )" ;
			//mysql_query($repeat_unique);
			
			$sql_table_insert = "INSERT INTO cal_".$table_name."(
			cal_method , cal_column , final_result ) VALUES ( ".$get_number.",".$get_column.",".$final_sgd.")";
			mysql_query($sql_table_insert);			
	 ?>             
            
      <?PHP
        }
		
		 if( $get_number == 6 && $get_column != 0 ) {
			$sql_data3 = " SELECT * FROM $table_name ";	
			$repeat3 = mysql_query($sql_data3); 

			for( $find_col_data2 = 0 ; $find_col_data2 < $num_dataa ; $find_col_data2++){
				$data_array2= mysql_fetch_row($repeat3);
				$stores_data_array2[$find_col_data2] = $data_array2[$_GET['column']] ;
			}
			
			for( $cal_avg1_2 = 0 ; $cal_avg1_2 < $num_dataa ; $cal_avg1_2++ ){
				$total_data2 += $stores_data_array2[$cal_avg1_2];
			}
			
			$avg_count2 = $total_data2/$num_dataa ;
			 
			for($cal_avg2_2 = 0 ; $cal_avg2_2 < $num_dataa ; $cal_avg2_2++){
				$data_delete_avg2[$cal_avg2_2] = ($stores_data_array2[$cal_avg2_2]-$avg_count2) ;
			}
			
			for($cal_avg3_2 = 0 ; $cal_avg3_2 < $num_dataa ; $cal_avg3_2++){
				$data_square2[$cal_avg3_2] = $data_delete_avg2[$cal_avg3_2] * $data_delete_avg2[$cal_avg3_2] ;	
			}
			
			for($cal_avg4_2 = 0 ; $cal_avg4_2 < $num_dataa ; $cal_avg4_2++){
				$data_add2 += $data_square2[$cal_avg4_2] ;	
			}
			
			$final_data2 = ( $data_add2 / $num_dataa);
			
			echo "<td align=center>"."選擇欄位為: " ?> 
			<font color="#FF0000"> 
			<?PHP echo $result_zero2[$_GET['column']]."</td>" ; ?>
			</font>
            
            <?PHP
            echo "<br>" ;
			echo "<td align=center>"."   變異數為:" ?> 
			
            <font color="#FF0000"> 
            
			<?PHP
				$final_sgd2 = round($final_data2,1);
			?>
            
			<?PHP echo $final_sgd2."</td>"; ?>
            </font>
            
     <?PHP
	 		/////////////// 建立資料庫/表  /////////////////儲存公式/////////////////
			
			$sql_set_new_database = "CREATE DATABASE cal_result" ;
			mysql_query($sql_set_new_database);
			
			$select_database = "USE cal_result" ;
			mysql_query($select_database);
			 			
			$sql_table_cal = "CREATE TABLE  cal_".$table_name."( 
			cal_id INT NOT NULL AUTO_INCREMENT,
			cal_method VARCHAR(100) NOT NULL,
			cal_column VARCHAR(100) NOT NULL,
			final_result TEXT NOT NULL,
			PRIMARY KEY ( cal_id ))";
			mysql_query($sql_table_cal);
			
			//$repeat_unique = "ALTER TABLE cal_".$table_name." ADD UNIQUE meth_col ( cal_method , cal_column )" ;
			//mysql_query($repeat_unique);
			
			$sql_table_insert = "INSERT INTO cal_".$table_name."(
			cal_method , cal_column , final_result ) VALUES ( ".$get_number.",".$get_column.",".$final_sgd2.")";
			mysql_query($sql_table_insert);			
	 ?>               

    <?PHP
		}		
	?>
   	
    
    <p><font size = "5">計算回歸曲線和計算R平方值</font></p>
    
    <form method="get">     
        
        <input type="hidden" name="show" value="查看資料表"/>
        <input type="hidden" name="table_name" value="<?PHP echo $table_name ?>"/>
        
        <select name ="column_cal_x">
        <option>選擇x軸</option>
        
        <?PHP
		for( $ars2_2 = 1 ; $ars2_2 < $fields_num_dataa ; $ars2_2++){	
			$result_zero2_2[$ars2_2] = mysql_result($result_field_dataa,0,$ars2_2);  //列印出第一列資訊
		?>
        <option value="<?PHP echo $ars2_2 ?>"><?PHP echo $result_zero2_2[$ars2_2] ?></option>
        <?PHP
        }
		?>
        </select>
    
    	<select name ="column_cal_y" onChange="this.form.submit()">
        <option>選擇y軸</option>
        <?PHP
		for( $ars22_2 = 1 ; $ars22_2 < $fields_num_dataa ; $ars22_2++){	
			$result_zero2_2[$ars22_2] = mysql_result($result_field_dataa,0,$ars22_2);  //列印出第一列資訊
		?>
        <option value="<?PHP echo $ars22_2 ?>"><?PHP echo $result_zero2_2[$ars22_2] ?></option>
        <?PHP
        }
		?>
		</select>
        <br>
        <input type="submit" value="計算回歸曲線">
    	<br>
   <?PHP
   		if( $get_column_cal_x != 0 && $get_column_cal_y != 0 ) {
			$sql_data3_2 = " SELECT * FROM $table_name ";
		
			$repeat3_x_2 = mysql_query($sql_data3_2);
			$repeat3_y_2 = mysql_query($sql_data3_2);
			
			$fields_num3_x_2=mysql_num_fields($repeat3_x_2);//取得資料表欄位數
			$fields_num3_y_2=mysql_num_fields($repeat3_y_2);//取得資料表欄位數
					
			for( $find_col_x_2 = 0 ; $find_col_x_2 < $num_dataa ; $find_col_x_2++){
				$dataa_x_2 = mysql_fetch_row($repeat3_x_2);
				$stores_data_x_2[$find_col_x_2] = $dataa_x_2[$_GET['column_cal_x']] ;
				$x_square[$find_col_x_2] = $stores_data_x_2[$find_col_x_2] * $stores_data_x_2[$find_col_x_2];
				$final_x_square += $x_square[$find_col_x_2];
			}			
			
			for( $find_col_y_2 = 0 ; $find_col_y_2 < $num_dataa ; $find_col_y_2++ ){
				$dataa_y_2 = mysql_fetch_row($repeat3_y_2);
				$stores_data_y_2[$find_col_y_2] = $dataa_y_2[$_GET['column_cal_y']] ;	
				$y_square[$find_col_y_2] = $stores_data_y_2[$find_col_y_2] * $stores_data_y_2[$find_col_y_2];
				$final_y_square += $y_square[$find_col_y_2];				
			}
			
			
			for( $cal_xy = 0 ; $cal_xy < $num_dataa ; $cal_xy++ ){
				$add_xy[$cal_xy] = $stores_data_x_2[$cal_xy] * $stores_data_y_2[$cal_xy] ;
				$final_add_xy += $add_xy[$cal_xy] ;
			}
			
			for( $ccaall = 0 ; $ccaall < $num_dataa ; $ccaall++ ){
				 $aaxx += $stores_data_x_2[$ccaall];	 
			}
			
			for( $ccaall_2 = 0 ; $ccaall_2 < $num_dataa ; $ccaall_2++ ){
				 $aayy += $stores_data_y_2[$ccaall_2];	 
			}
				$the_avg_number_x = $aaxx / $num_dataa;
				$the_avg_number_y = $aayy / $num_dataa;
								
			for( $ccaall_1_x = 0 ; $ccaall_1_x < $num_dataa ; $ccaall_1_x++ ){
				 $first_x[$ccaall_1_x] = $stores_data_x_2[$ccaall_1_x] - $the_avg_number_x;	
			}
			
			for( $ccaall_1_y = 0 ; $ccaall_1_y < $num_dataa ; $ccaall_1_y++ ){
				 $first_y[$ccaall_1_y] = $stores_data_y_2[$ccaall_1_y] - $the_avg_number_y;	
			}
			
			for( $ccaall_xy = 0 ; $ccaall_xy < $num_dataa ; $ccaall_xy++ ){
				 $combin_xy[$ccaall_xy] = $first_x[$ccaall_xy] * $first_y[$ccaall_xy];
				 $cell_up += $combin_xy[$ccaall_xy];
			}
			
			
			for( $ccaall_1_x = 0 ; $ccaall_1_x < $num_dataa ; $ccaall_1_x++ ){
				 $first_x[$ccaall_1_x] = $stores_data_x_2[$ccaall_1_x] - $the_avg_number_x;	
				 $final_x_x[$ccaall_1_x] = $first_x[$ccaall_1_x] * $first_x[$ccaall_1_x];
				 $cell_down +=  $final_x_x[$ccaall_1_x];
			}

			$final_b = $cell_up / $cell_down ;
			$final_a = $the_avg_number_y - $final_b * $the_avg_number_x ;
			
			echo "<td align=center>"."迴歸曲線: y = " ?>
            
            <font color="#FF0000"> 
			<?PHP echo round($final_a,2); ?> 
            </font>
            
			<?PHP echo " x +" ; ?> 
			<font color="#FF0000"> 
			<?PHP echo round($final_b,2)."</td>"; ?>
            </font>
            
			<?PHP 
			echo "<br>" ;
			
			$R_square = ( $num_dataa * $final_add_xy - $aaxx * $aayy ) / sqrt( $num_dataa * $final_x_square - $aaxx * $aaxx) / sqrt( $num_dataa * $final_y_square - $aayy * $aayy ) ;	
			$final_R_square = $R_square * $R_square;
			
			echo "<td align=center>"."R_square : " ;?>
            <font color="#FF0000"> 
			<?PHP echo round($final_R_square,2)."</td>"; ?> 
            </font>	
  <?PHP	
		}
  ?>
  
    	<p><font size = "5">選擇欄位畫散佈圖</font></p> 
    
   </form>
    
   <form action="new_draw_scatter.php" method="get"> 
       	
        <input type="hidden" name="show" value="查看資料表"/>
        <input type="hidden" name="table_name" value="<?PHP echo $table_name ?>"/>
        
        <select name ="column_draw_x">
        <option>選擇x軸</option>
        
        <?PHP
		for( $ars2_draw = 1 ; $ars2_draw < $fields_num_dataa ; $ars2_draw++ ){	
			$result_zero2_draw[$ars2_draw] = mysql_result($result_field_dataa,0,$ars2_draw);  //列印出第一列資訊
		?>
        <option value="<?PHP echo $ars2_draw ?>"><?PHP echo $result_zero2_draw[$ars2_draw] ?></option>
        <?PHP
        }
		?>
        
        </select>
        
        
        <select name ="column_draw_y" onChange="this.form.submit()">
        <option>選擇y軸</option>
        <?PHP
		for( $ars22_draw = 1 ; $ars22_draw < $fields_num_dataa ; $ars22_draw++){	
			$result_zero2_draw[$ars22_draw] = mysql_result($result_field_dataa,0,$ars22_draw);  //列印出第一列資訊
			//echo "<td align=center>$result_zero[$ars]</td>";
		?>
        <option value="<?PHP echo $ars22_draw ?>"><?PHP echo $result_zero2_draw[$ars22_draw] ?></option>
        <?PHP
        }
		?>
		</select>
        <br />
        <input type="submit" value="畫圖">
  </form>
         
    <?PHP
	/////////////////////////////////連線計算之資料表////////////////////////////////
		mysql_connect("localhost","root","123456789");    //與資料庫建立連線
 		mysql_select_db("cal_result");  //選擇資料庫  /*建立資料表*/
		
		$sql_cal_chose = "SELECT * FROM cal_".$table_name ;
		$cal_tables_repeat = mysql_query($sql_cal_chose); 	
		$cal_tables_num = mysql_num_rows($cal_tables_repeat);
		
		$fields_cal_num = mysql_num_fields($cal_tables_repeat);//取得資料表欄位
	/*	
		for( $ars_cal = 0 ; $ars_cal < $fields_cal_num ; $ars_cal++){
			$result_zero_cal[$ars_cal] = mysql_result($cal_tables_repeat,0,$ars_cal);  //列印出第一列資訊
		}
	*/
		/////////////////////////////////////////////////////////////////////////////////
		
		for ( $cal_final = 0 ; $cal_final < $fields_cal_num ; $cal_final++ ){
			$meta_cal = mysql_fetch_field($cal_tables_repeat); //取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name_cal[$cal_final] = $meta_cal->name; //將欄位名稱儲存到$fields_name陣列
  		}
		
		echo '<table border="2" bgcolor="#FFCC66"  align="center">';
		echo '<tr>';
			for( $chose_cal = 1 ; $chose_cal < $fields_cal_num ; $chose_cal++ ){			
	    		echo'<td width="10%">'.$the_fields_name_cal[$chose_cal].'</td>';	
			}
		echo '</tr>';
		
		for( $cal_a = 0 ; $cal_a < $cal_tables_num ; $cal_a++ ){
			$row_cal = mysql_fetch_row($cal_tables_repeat);
							
				if( $row_cal[1] == "1" ){
					echo '<td width = 10%>'.平均.'</td>';
				}
				if( $row_cal[1] == "2" ){
					echo '<td width = 10%>'.最小值.'</td>';
				}
				if( $row_cal[1] == "3" ){
					echo '<td width = 10%>'.最大值.'</td>';
				}
				if( $row_cal[1] == "4" ){
					echo '<td width = 10%>'.筆數.'</td>';
				}
				if( $row_cal[1] == "5" ){
					echo '<td width = 10%>'.標準差.'</td>';
				}
				if( $row_cal[1] == "6" ){
					echo '<td width = 10%>'.變異數.'</td>';
				}
			
			for( $first_column = 1 ; $first_column < $fields_num_dataa ; $first_column++ ){
				if( $row_cal[2] == $first_column ){
					echo '<td width = 10%>'.$result_zero2[$first_column].'</td>';
				}
			}
			
			echo '<td width = 10%>'.$row_cal[3].'</td>';
			echo '</tr>';
		}
		echo '</table>';
	?>
     
    	<table border="0" align="center" cellpadding="4">
			<tr>
				<td><p><a href="import_data.php">go_Back</a><p></td>
			</tr>
		</table>

</body>
</html>