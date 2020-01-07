<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料庫內容</title>
</head>
<body>
<h1 align="center"><font color="#FF0000">選擇瀏覽病患資料欄位</font></h1>
<?php
include("include/test_app_top.php"); 
?>
      
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顯示資料</title>


<body>
<body background="background/ADDM.jpg">
	
	<?PHP		
		$sql_data = "SELECT * FROM userss";		     // 資料表		
		$repeat = mysql_query($sql_data); 
		$row_num = mysql_num_rows($repeat);
		$fields_num = mysql_num_fields($repeat);//取得資料表欄位數
	
		for( $ars = 0 ; $ars < $fields_num ; $ars++){
			$result_zero[$ars] = mysql_result($repeat,0,$ars);  //列印出第一列資訊
		}
		
	//////////////////////////////處理欄位//////////////////////////////// 
		 for ( $x = 0 ; $x < ($fields_num) ; $x++ ){
			$meta=mysql_fetch_field($repeat);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name[$x]=$meta->name; //將欄位名稱儲存到$fields_name陣列
  		 }
	?> 

    <form action="" name="form_select" id="form_select" method="post" enctype="multipart/form-data" >	
        <table border="1" align="center" cellpadding="4">
		<?PHP
			for( $ii = 1 ; $ii < $fields_num  ; $ii++ ){
				if( $ii % 8 == 1 ){ 					
					echo "<tr><td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";
				}
				
				elseif( $ii % 8 == 2 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";				
				}
				
				elseif( $ii % 8 == 3 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";					
				}
				
				elseif( $ii % 8 == 4 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";						
				}
			
				elseif( $ii % 8 == 5 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";							
				}
				
				elseif( $ii % 8 == 6 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";						
				}
				
				elseif( $ii % 8 == 7 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td>";							
				}
				
				elseif( $ii % 8 == 0 ){ 
					echo "<td><input type='checkbox' name= '$the_fields_name[$ii]'</td><td>".$result_zero[$ii]."</td></tr>";						
				}					
			}
		?>
        </table>
       		  <center>
        		 <input type="submit" name="sub_select" id="sub_select" value="選擇顯示欄位"
                 		style=" width:150px; height:40px; border:2px  #000000 dashed; 		
                        background-color:pink; font-size:20px;" />			
              </center>
    </form>
    
<?php 
	
	if(isset($_POST["sub_select"])){
		echo'<table border="1" bgcolor="#99FFFF"  align="center">';
		echo '<tr>';
				
			for( $chose = 0 ; $chose < $fields_num ; $chose++ ){			
				if(!empty($_POST["$the_fields_name[$chose]"])){
	    			echo'<td width="10%">'.$result_zero[$chose].'</td>';	
				}
			}
		echo '</tr>';
		
			for( $the_data = 1 ; $the_data < $row_num ; $the_data++ ){
				$the_row_data=mysql_fetch_row($repeat);	
				
				for( $rrr = 1 ; $rrr <  $fields_num ; $rrr++){
					if(!empty($_POST["$the_fields_name[$rrr]"])){
						echo'<td width="10%">'.$the_row_data[$rrr].'</td>';
					}
				}
				echo '</tr>';
			}	
		echo '</tr>';
		echo '</table>';            
	}
?>
		<table border="0" align="center" cellpadding="4">
			<tr>
				<td><p><a href="import_data.php">go_Back</a><p></td>
			</tr>
		</table>
</body>
</head>
</html>
