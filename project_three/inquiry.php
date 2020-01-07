<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>資料庫內容</title>
</head>
<body>
<h1 align="center"><font color="#FF0000">選擇病患條件資料</font></h1>
<?php
include("include/test_app_top.php"); 
?>
      
  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顯示資料</title>

	<h3 align="center"><font color="#CC00FF">Hint1:選介於時,請將兩者用逗號分隔</font></h3>
    <h3 align="center"><font color="#CC00FF">Hint2:命名資料表名稱不可超過30個字</font></h3>
    <h3 align="center"><font color="#CC00FF">Hint3:命名資料表名稱不可有中文字</font></h3>

        <table width="500" height="120" border="1"> 
        
<body background="background/ADDM.jpg">


<?PHP
		$sql_data = "SELECT * FROM userss";		     // 資料表		
		$repeat = mysql_query($sql_data); 
		$num=mysql_num_rows($repeat);

		$fields_num=mysql_num_fields($repeat);//取得資料表欄位數
		
		for( $ars = 0 ; $ars < $fields_num ; $ars++){
			$result_zero[$ars] = mysql_result($repeat,0,$ars);  //列印出第一列資訊
		}
	
		for ( $x = 0 ; $x < ($fields_num) ; $x++ ){
			$meta=mysql_fetch_field($repeat);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name[$x]=$meta->name; //將欄位名稱儲存到$fields_name陣列
  		}
?>

<?PHP
	$named =  "請輸入命名之資料表名稱";
?>

   <form action="store2.php" name="form_chose" id="form_chose" method="get" enctype="multipart/form-data" >	  
       
        <table border="1" align="center" cellpadding="5">
		
		<?PHP
			for( $ii = 1 ; $ii < $fields_num  ; $ii++ ){						
				echo "<tr><td>".$result_zero[$ii] ?> <td><select name = "<?PHP echo $the_fields_name[$ii] ?>" > 
                										 <option value="like"> <?PHP  echo '包含' ?></option> 
                	   									 <option value="between"><?PHP  echo '介於' ?> </option>
                                                         </select></td> <?PHP echo "<td><input type='text' name= '$ii'</td></tr>";							
			}
			
				echo "<td>".$named."<td></td>"."<td align=center><input type='text' name='named_table' size='20'/></td>";
		?>
        
        </table>
       		  <center>
        		 <input type="submit" name="sub_chose" id="sub_chose" value="確定查找項目"
                 		style=" width:150px; height:40px; border:2px  #000000 dashed; 		
                        background-color:pink; font-size:20px;" />			
              </center>
    </form>
	
    <?PHP
	for( $xx = 0 ; $xx < $fields_num  ; $xx++ ){
		echo $_GET[$xx];
	}
	?>
    
	<?php 	
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