<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>資料庫內容</title>
</head>
<body>
<h1 align="center"><font color="#FF0000">查詢病患基本資料</font></h1>
<?php
include("include/test_app_top.php"); 
include("myprojectcsv.php");
$myprojectcsv = new myprojectcsv();
if( isset($_POST['exp'])) {
	$myprojectcsv->export();
}
?>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顯示資料</title>

<body>		
        <table width="500" height="120" border="1"> 
        
<body background="background/ADDM.jpg">

<?PHP

		$sql_data = "SELECT * FROM userss"; // 資料表
		$repeat = mysql_query($sql_data); 
		$num=mysql_num_rows($repeat);			
		
		$fields_num=mysql_num_fields($repeat);//取得資料表欄位數
		
		$result_field=mysql_query('select * from userss'); //執行sql指令;
 		$fields_num=mysql_num_fields($result_field);//取得資料表欄位數
		
		echo '<table  border="1">';
		
		for( $ars = 0 ; $ars < $fields_num ; $ars++){
			echo "<from>";
			$result_zero[$ars] = mysql_result($repeat,0,$ars);  //列印出第一列資訊
			echo "<td align=center>$result_zero[$ars]</td>";
		}
		
		echo "</tr>";
	
		for ( $x = 0 ; $x < ($fields_num) ; $x++ ){
			$meta=mysql_fetch_field($result_field);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name[$x]=$meta->name; //將欄位名稱儲存到$fields_name陣列
  		}	
		
		for( $combine = 1 ; $combine < $fields_num ; $combine++ ){
			$final_combine[$combine] = $the_fields_name[$combine]." like '%".$_GET[$combine]."%'" ;
			$fine = implode(" and ",$final_combine);
		}
?>		


	<?PHP		
		if($_GET){
			$sql_data2 = "SELECT * FROM userss where $fine"; // 資料表
			$repeat2 = mysql_query($sql_data2); 
			$num2=mysql_num_rows($repeat2);
			$fields_num2=mysql_num_fields($repeat2);//取得資料表欄位數
		
			$result_field2=mysql_query('select * from userss'); //執行sql指令;
 			$fields_num2=mysql_num_fields($result_field2);//取得資料表欄位數
			//echo $fine;
			for( $field_names2 = 0 ; $field_names2 < $fields_num2 ; $field_names2++ ){
				echo "<form>";
				echo "<td align=center>$the_fields_name[$field_names2]</td>"; 		
			}
			
			echo "</tr>";

			for( $ax = 1 ; $ax <= $num2 ; $ax++ ){
				$row2=mysql_fetch_row($repeat2);												
				echo "<tr><form>";
				echo "<td align=center>$ax</td>";//編號

				for( $aaaxxx = 1 ; $aaaxxx <  $fields_num2 ; $aaaxxx++){
					echo "<td align=center><input type='text' name='$the_fields_name[$aaaxxx]' value='$row2[$aaaxxx]' size='20'/></td>";
				}																								
				echo "</form></tr>";
			}
			echo '</table>';				
		}
		
		else{
			echo "error";		
		}		
	?> 
         
    	<center>
			<form method="post">
   		    <input type="submit" name="exp" value="Export"
            	   style=" width:100px; height:40px; border:2px  #000000 dashed; 		
                           background-color:#3BFF3B; font-size:20px;">
			</form>
		</center>
        
      	<table border="0" align="center" cellpadding="4">
			<tr>
				<td><p><a href="inquiry.php">重新選擇新條件</a><p></td>
			</tr>
		</table>
        
        <br>
                   
    <?PHP
		for( $combine2 = 1 ; $combine2 < $fields_num2 ; $combine2++ ){
			$final_combine2[$combine2] = $the_fields_name[$combine2]." like '%".$_GET[$combine2]."%'" ;
			$fine2 = implode(" and ",$final_combine2);
		}

	$get_column = $_GET['column'] ? $_GET['column'] : 0 ;
	$get_number = $_GET['number'] ? $_GET['number'] : 0 ;
	
	$sql_data2 = "SELECT * FROM userss where $fine2 ";

	?>
          
	<p><font size = "5">數值計算</font></p>
    
        <form method="get"> 
        <?PHP
		for($ttt = 1 ; $ttt < $fields_num ; $ttt++ ){
			$era[$ttt] = $_GET[$ttt];
		?>
        <input type = "hidden"  name="<? echo $ttt ?>" value="<?= $era[$ttt] ?>" />
		<?PHP
		}
        ?>
        
        <input type="hidden" name="action" value="sub_chose"/>
        <input type="hidden" name="sub_chose" value="確定查找項目"/>
        
        <select name ="column">
        <option>選擇計算欄位</option>
        
        <?PHP
		for( $ars2 = 1 ; $ars2 < $fields_num ; $ars2++){	
			$result_zero2[$ars2] = mysql_result($repeat,0,$ars2);  //列印出第一列資訊
			//echo "<td align=center>$result_zero[$ars]</td>";
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
        if( $get_number == 1 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3 = mysql_query($sql_data3); 
			while($row_result3 = mysql_fetch_array($repeat3)){
				$everyone_age += (int)$row_result3[$_GET['column']];
				$count_number++;	
			}
			echo "<td align=center>"."選擇欄位為:&nbsp;".$result_zero2[$_GET['column']]."</td>" ;
			echo "<br>" ;
			echo "<td align=center>"."平均為:&nbsp;".round(($everyone_age/$count_number),1)."</td></tr>";
		}
		
		if( $get_number == 2 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3 = mysql_query($sql_data3); 
			
			for( $find_col_min = 0 ; $find_col_min < $num2 ; $find_col_min++){
				$dataa_min = mysql_fetch_row($repeat3);
				$stores_data_min[$find_col_min] = $dataa_min[$_GET['column']] ;
			}
			
			$min_data = $stores_data_min[0];
			
			for( $compare_min = 0 ; $compare_min < $num2 ; $compare_min++ ){
				if( $min_data > $stores_data_min[$compare_min] ){
					$min_data = $stores_data_min[$compare_min];
				}
			}
			echo "<td align=center>"."選擇欄位為: ".$result_zero2[$_GET['column']]."</td>" ;
			echo "<br>" ;
			echo "<td align=center>"."  最小值為:".round($min_data,1)."</td>";
		}
		
		  if( $get_number == 3 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3 = mysql_query($sql_data3); 
			
			for( $find_col_max = 0 ; $find_col_max < $num2 ; $find_col_max++){
				$dataa_max = mysql_fetch_row($repeat3);
				$stores_data_max[$find_col_max] = $dataa_max[$_GET['column']] ;
			}
			
			$max_data = $stores_data_max[0];
			
			for( $compare_max = 0 ; $compare_max < $num2 ; $compare_max++ ){
				if( $max_data < $stores_data_max[$compare_max] ){
					$max_data = $stores_data_max[$compare_max];
				}
			}
			echo "<td align=center>"."選擇欄位為: ".$result_zero2[$_GET['column']]."</td>" ;
			echo "<br>" ;
			echo "<td align=center>"."  最大值為:".round($max_data,1)."</td>";
		}
		
		  if( $get_number == 4 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3 = mysql_query($sql_data3); 
			while($row_result3 = mysql_fetch_array($repeat3)){
				$count_number++;	
			}
			echo "<td align=center>"."選擇欄位為: ".$result_zero2[$_GET['column']]."</td>" ;
			echo "<br>" ;
			echo "<td align=center>"."   筆數為:".$count_number."</td>";
		}
		
		  if( $get_number == 5 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3 = mysql_query($sql_data3); 

			
			for( $find_col_data = 0 ; $find_col_data < $num2 ; $find_col_data++){
				$data_array= mysql_fetch_row($repeat3);
				$stores_data_array[$find_col_data] = $data_array[$_GET['column']] ;
			}
			
			//echo $stores_data_array[0];
			
			for( $cal_avg = 0 ; $cal_avg < $num2 ; $cal_avg++ ){
				$total_data += $stores_data_array[$cal_avg];
			}
			
			$avg_count = $total_data/$num2 ;
			 
			for($cal_avg2 = 0 ; $cal_avg2 < $num2 ; $cal_avg2++){
				$data_delete_avg[$cal_avg2] = ($stores_data_array[$cal_avg2]-$avg_count) ;
			}
			
			for($cal_avg3 = 0 ; $cal_avg3 < $num2 ; $cal_avg3++){
				$data_square[$cal_avg3] = $data_delete_avg[$cal_avg3] * $data_delete_avg[$cal_avg3] ;	
			}
			
			for($cal_avg4 = 0 ; $cal_avg4 < $num2 ; $cal_avg4++){
				$data_add += $data_square[$cal_avg4]  ;	
				
			}
			
			$final_data = ( $data_add / $num2);
			$final_data_count = sqrt($final_data);
			
			echo "<td align=center>"."選擇欄位為: ".$result_zero2[$_GET['column']]."</td>" ;	
			echo "<br>" ;	
			echo "<td align=center>"."   標準差為:".round($final_data_count,1)."</td>";
		}
		
		  if( $get_number == 6 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3 = mysql_query($sql_data3); 

			for( $find_col_data2 = 0 ; $find_col_data2 < $num2 ; $find_col_data2++){
				$data_array2= mysql_fetch_row($repeat3);
				$stores_data_array2[$find_col_data2] = $data_array2[$_GET['column']] ;
			}
			
			for( $cal_avg1_2 = 0 ; $cal_avg1_2 < $num2 ; $cal_avg1_2++ ){
				$total_data2 += $stores_data_array2[$cal_avg1_2];
			}
			
			$avg_count2 = $total_data2/$num2 ;
			 
			for($cal_avg2_2 = 0 ; $cal_avg2_2 < $num2 ; $cal_avg2_2++){
				$data_delete_avg2[$cal_avg2_2] = ($stores_data_array2[$cal_avg2_2]-$avg_count2) ;
			}
			
			for($cal_avg3_2 = 0 ; $cal_avg3_2 < $num2 ; $cal_avg3_2++){
				$data_square2[$cal_avg3_2] = $data_delete_avg2[$cal_avg3_2] * $data_delete_avg2[$cal_avg3_2] ;	
			}
			
			for($cal_avg4_2 = 0 ; $cal_avg4_2 < $num2 ; $cal_avg4_2++){
				$data_add2 += $data_square2[$cal_avg4_2] ;	
			}
			
			$final_data2 = ( $data_add2 / $num2);
			
			echo "<td align=center>"."選擇欄位為: ".$result_zero2[$_GET['column']]."</td>" ;
			echo "<br>" ;
			echo "<td align=center>"."   變異數為:".round($final_data2,1)."</td>";
		}		
		?>
        
 	<p><font size = "5">選擇欄位畫散佈圖</font></p>       
	
   <?PHP 
    	$get_column_x_field = $_GET['column_x'] ? $_GET['column_x'] : 0 ;
		$get_column_y_field = $_GET['column_y'] ? $_GET['column_y'] : 0 ;
    ?>
    
     <?PHP 
    	$get_column_x_field_2 = $_GET['column_x_2'] ? $_GET['column_x_2'] : 0 ;
		$get_column_y_field_2 = $_GET['column_y_2'] ? $_GET['column_y_2'] : 0 ;
    ?>
    
  <form action="get_scatter_data.php" method="get"> 
        <?PHP
		for($ttt = 1 ; $ttt < $fields_num ; $ttt++ ){
			$era[$ttt] = $_GET[$ttt];
		?>
        <input type = "hidden"  name="<? echo $ttt ?>" value="<?= $era[$ttt] ?>" />
		<?PHP
		}
        ?>
        
        <input type="hidden" name="action" value="sub_chose"/>
        <input type="hidden" name="sub_chose" value="確定查找項目"/>
        
        <select name ="column_x">
        <option>選擇x軸</option>
        
        <?PHP
		for( $ars2 = 1 ; $ars2 < $fields_num ; $ars2++){	
			$result_zero2[$ars2] = mysql_result($repeat,0,$ars2);  //列印出第一列資訊
			//echo "<td align=center>$result_zero[$ars]</td>";
		?>
        <option value="<?PHP echo $ars2 ?>"><?PHP echo $result_zero2[$ars2] ?></option>
        <?PHP
        }
		?>
        
        </select>
        
        
        <select name ="column_y" onChange="this.form.submit()">
        <option>選擇y軸</option>
        <?PHP
		for( $ars22 = 1 ; $ars22 < $fields_num ; $ars22++){	
			$result_zero2[$ars22] = mysql_result($repeat,0,$ars22);  //列印出第一列資訊
			//echo "<td align=center>$result_zero[$ars]</td>";
		?>
        <option value="<?PHP echo $ars22 ?>"><?PHP echo $result_zero2[$ars22] ?></option>
        <?PHP
        }
		?>
		</select>
        <br />
        <input type="submit" value="畫圖">
  </form>
  

  <p><font size = "5">計算回歸曲線和計算R平方值</font></p>  
  
    <form action="" method="get"> 
        <?PHP
		for($ttt2 = 1 ; $ttt2 < $fields_num ; $ttt2++ ){
			$era[$ttt2] = $_GET[$ttt2];
		?>
        <input type = "hidden"  name="<? echo $ttt2 ?>" value="<?= $era[$ttt2] ?>" />
		<?PHP
		}
        ?>
        
        <input type="hidden" name="action" value="sub_chose"/>
        <input type="hidden" name="sub_chose" value="確定查找項目"/>
        
        <select name ="column_x_2">
        <option>選擇x軸</option>
        
        <?PHP
		for( $ars2_2 = 1 ; $ars2_2 < $fields_num ; $ars2_2++){	
			$result_zero2_2[$ars2_2] = mysql_result($repeat,0,$ars2_2);  //列印出第一列資訊
			//echo "<td align=center>$result_zero[$ars]</td>";
		?>
        <option value="<?PHP echo $ars2_2 ?>"><?PHP echo $result_zero2_2[$ars2_2] ?></option>
        <?PHP
        }
		?>
        
        </select>
        
        
        <select name ="column_y_2" onChange="this.form.submit()">
        <option>選擇y軸</option>
        <?PHP
		for( $ars22_2 = 1 ; $ars22_2 < $fields_num ; $ars22_2++){	
			$result_zero2_2[$ars22_2] = mysql_result($repeat,0,$ars22_2);  //列印出第一列資訊
			//echo "<td align=center>$result_zero[$ars]</td>";
		?>
        <option value="<?PHP echo $ars22_2 ?>"><?PHP echo $result_zero2_2[$ars22_2] ?></option>
        <?PHP
        }
		?>
		</select>
        <br />
        <input type="submit" value="計算回歸曲線">
  </form>
  

  
  <?PHP
   		if( $get_column_x_field != 0 && $get_column_y_field != 0 ) {
			$sql_data3 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3_x = mysql_query($sql_data3);
			$repeat3_y = mysql_query($sql_data3);
			
			$fields_num3_x=mysql_num_fields($repeat3_x);//取得資料表欄位數
			$fields_num3_y=mysql_num_fields($repeat3_y);//取得資料表欄位數
		
			//$result_field2=mysql_query('select * from userss'); //執行sql指令;
 			//$fields_num2=mysql_num_fields($result_field2);//取得資料表欄位數
			
			for( $find_col_x = 0 ; $find_col_x < $num2 ; $find_col_x++){
				$dataa_x = mysql_fetch_row($repeat3_x);
				$stores_data_x[$find_col_x] = $dataa_x[$_GET['column_x']] ;
				echo $stores_data_x[$find_col_x];
			}
			
			for( $find_col_y = 0 ; $find_col_y < $num2 ; $find_col_y++ ){
				$dataa_y = mysql_fetch_row($repeat3_y);
				$stores_data_y[$find_col_y] = $dataa_y[$_GET['column_y']] ;	
				echo $stores_data_y[$find_col_y];
			}
			//echo "<td align=center>"."選擇x軸為: ".$stores_data_x[0]."</td>" ;
			//echo "<td align=center>"."選擇y軸為: ".$stores_data_y[0]."</td></tr>";
		}
  ?>
  
   <?PHP
   		if( $get_column_x_field_2 != 0 && $get_column_y_field_2 != 0 ) {
			$sql_data3_2 = " SELECT * FROM userss where $fine2 ";
		
			$repeat3_x_2 = mysql_query($sql_data3_2);
			$repeat3_y_2 = mysql_query($sql_data3_2);
			
			$fields_num3_x_2=mysql_num_fields($repeat3_x_2);//取得資料表欄位數
			$fields_num3_y_2=mysql_num_fields($repeat3_y_2);//取得資料表欄位數
					
			for( $find_col_x_2 = 0 ; $find_col_x_2 < $num2 ; $find_col_x_2++){
				$dataa_x_2 = mysql_fetch_row($repeat3_x_2);
				$stores_data_x_2[$find_col_x_2] = $dataa_x_2[$_GET['column_x_2']] ;
				$x_square[$find_col_x_2] = $stores_data_x_2[$find_col_x_2] * $stores_data_x_2[$find_col_x_2];
				$final_x_square += $x_square[$find_col_x_2];
			}			
			
			for( $find_col_y_2 = 0 ; $find_col_y_2 < $num2 ; $find_col_y_2++ ){
				$dataa_y_2 = mysql_fetch_row($repeat3_y_2);
				$stores_data_y_2[$find_col_y_2] = $dataa_y_2[$_GET['column_y_2']] ;	
				$y_square[$find_col_y_2] = $stores_data_y_2[$find_col_y_2] * $stores_data_y_2[$find_col_y_2];
				$final_y_square += $y_square[$find_col_y_2];				
			}
			
			
			for( $cal_xy = 0 ; $cal_xy < $num2 ; $cal_xy++ ){
				$add_xy[$cal_xy] = $stores_data_x_2[$cal_xy] * $stores_data_y_2[$cal_xy] ;
				$final_add_xy += $add_xy[$cal_xy] ;
			}
			
			for( $ccaall = 0 ; $ccaall < $num2 ; $ccaall++ ){
				 $aaxx += $stores_data_x_2[$ccaall];	 
			}
			
			for( $ccaall_2 = 0 ; $ccaall_2 < $num2 ; $ccaall_2++ ){
				 $aayy += $stores_data_y_2[$ccaall_2];	 
			}
				$the_avg_number_x = $aaxx / $num2;
				$the_avg_number_y = $aayy / $num2;
								
			for( $ccaall_1_x = 0 ; $ccaall_1_x < $num2 ; $ccaall_1_x++ ){
				 $first_x[$ccaall_1_x] = $stores_data_x_2[$ccaall_1_x] - $the_avg_number_x;	
			}
			
			for( $ccaall_1_y = 0 ; $ccaall_1_y < $num2 ; $ccaall_1_y++ ){
				 $first_y[$ccaall_1_y] = $stores_data_y_2[$ccaall_1_y] - $the_avg_number_y;	
			}
			
			for( $ccaall_xy = 0 ; $ccaall_xy < $num2 ; $ccaall_xy++ ){
				 $combin_xy[$ccaall_xy] = $first_x[$ccaall_xy] * $first_y[$ccaall_xy];
			//	 echo $combin_xy[$ccaall_xy]."<br>"; 
				 $cell_up += $combin_xy[$ccaall_xy];
			//	 echo $combin_xy[$ccaall_xy];
			}
			
			
			for( $ccaall_1_x = 0 ; $ccaall_1_x < $num2 ; $ccaall_1_x++ ){
				 $first_x[$ccaall_1_x] = $stores_data_x_2[$ccaall_1_x] - $the_avg_number_x;	
				 $final_x_x[$ccaall_1_x] = $first_x[$ccaall_1_x] * $first_x[$ccaall_1_x];
			//	 echo $final_x_x[$ccaall_1_x]."<br>";
				 $cell_down +=  $final_x_x[$ccaall_1_x];
			}
			
			//echo $cell_down;
			$final_b = $cell_up / $cell_down ;
			$final_a = $the_avg_number_y - $final_b * $the_avg_number_x ;
			
			//echo "<td align=center>"." b = ".round($final_b,2)."</td>" ;
			//echo "<td align=center>"." a = ".round($final_a,2)."</td>" ;	
			

			echo "<td align=center>"."迴歸曲線: y = ".round($final_a,2)." x +".round($final_b,2)."</td>" ;
			echo "<br>" ;
			
			$R_square = ( $num2 * $final_add_xy - $aaxx * $aayy ) / sqrt( $num2 * $final_x_square - $aaxx * $aaxx) / sqrt( $num2 * $final_y_square - $aayy * $aayy ) ;	
			$final_R_square = $R_square * $R_square;
			//echo $final_y_square;
			echo "<td align=center>"."     R_square : ".round($final_R_square,2)."</td>" ;		
		}
  ?>
  
  
  <form action="t_test.php" name="form_chose" id="form_chose" method="get" enctype="multipart/form-data" >	 
        <table border="1" align="center" cellpadding="4">
		<?PHP
			for( $ii = 1 ; $ii < $fields_num  ; $ii++ ){
				if( $ii % 5 == 1 ){ 					
					echo "<tr><td>".$result_zero[$ii]."<td><input type='text' name= '$ii'</td></td>";				 				
				}
				
				elseif( $ii % 5 == 2 ){ 
					echo "<td>".$result_zero[$ii]."<td><input type='text' name= '$ii'</td></td>";				
				}
				
				elseif( $ii % 5 == 3 ){ 
					echo "<td>".$result_zero[$ii]."<td><input type='text' name= '$ii'</td></td>";					
				}
				
				elseif( $ii % 5 == 4 ){ 
					echo  "<td>".$result_zero[$ii]."<td><input type='text' name= '$ii'</td></td>";						
				}
				
				elseif( $ii % 5 == 0 ){ 
					echo  "<td>".$result_zero[$ii]."<td><input type='text' name= '$ii'</td></td></tr>";		
				}				
			}
		?>
        </table>
       		  <center>
              	 <input type="hidden" name="action_T" value="T_TEST"/>
        		 <input type="submit" name="T_TEST" id="T_TEST" value="進入T檢定"
                 		style=" width:150px; height:40px; border:2px  #000000 dashed; 		
                        background-color:pink; font-size:20px;" />			
              </center>
    </form>
    
    <?php 	
	mysql_close();              
	?>

		