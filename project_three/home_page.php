<title>資料庫內容</title>
<?php
include("include/test_app_top.php"); 	
?>

<body background="background/ADDM.jpg">

<h1 align="center"><font color="#FF0000">主頁</font></h1>
		
      
<form action="" name="people" id="people" method="post" enctype="multipart/form-data" >
  			<tr>
    			<td colspan="2" aligan="center">
                	<center>				
<?php
     if(!empty($_POST['jump'])){
        echo '<meta http-equiv=REFRESH CONTENT=1;url=edit.php>';    //跳至編輯頁面
	 }
						 	 
	 if(!empty($_POST['select'])){
		 echo '<meta http-equiv=REFRESH CONTENT=1;url=select_column.php>';   //跳至觀看欄位頁面
	 }
	 
	 if(!empty($_POST['inquiry'])){
		 echo '<meta http-equiv=REFRESH CONTENT=1;url=inquiry.php>';      //跳至查詢頁面
	 }	 
	 
	 if(!empty($_POST['structure'])){
		 echo '<meta http-equiv=REFRESH CONTENT=1;url=structure.php>';  //跳至欄位名稱編輯頁面
	 }
	 
	 if(!empty($_POST['history'])){
		 echo '<meta http-equiv=REFRESH CONTENT=1;url=every_table.php>';  //跳至欄位名稱編輯頁面
	 }
	 
	 if(!empty($_POST['analyze'])){
		 echo '<meta http-equiv=REFRESH CONTENT=1;url=analyze.php>';  //跳至欄位名稱編輯頁面
	 }
?>

<?PHP
/////////////////////////////////////////////////////////按鈕製作/////////////////////////////////////
?>
                    <center>
                    	<input type="hidden" name="action" value="new"/>  
                        <input type="submit" name="jump" id="jump" value="編輯成員名單"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:20px;" />
                              
                        <input type="hidden" name="action" value="select"/>  
                  	    <input type="submit" name="select" id="select" value="選擇觀看欄位"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	
                           
                               
                        <input type="hidden" name="action" value="inquiry"/>  
                        <input type="submit" name="inquiry" id="inquiry" value="查詢和統計"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	 
                         
                        <input type="hidden" name="action" value="structure"/>  
                        <input type="submit" name="structure" id="structure" value="結構"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	 
                        
                        <input type="hidden" name="action" value="history"/>  
                        <input type="submit" name="history" id="history" value="查看歷史紀錄"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	 
                               
                        <input type="hidden" name="action" value="analyze"/>  
                        <input type="submit" name="analyze" id="analyze" value="分析頁面"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	 
                                                 
                    </center>
                     
<?PHP 
/////////////////////////////////////////////////////按鈕製作//////////////////////////////////////
?>
              </td>               
  			</tr>
</form>	

		<hr width="95%" size="5" noshade style="border:2px #cccccc;"> 

<?PHP		
		$sql_data = "SELECT * FROM userss";		     // 選擇資料表		
		$repeat = mysql_query($sql_data); 			 // 啟用資料表
		$row_num=mysql_num_rows($repeat);            // 取得資料表筆數
		$row_column_name=mysql_fetch_row($repeat);	 // 取一列數據
		$fields_num=mysql_num_fields($repeat);//取得資料表欄位數
				
	//	echo '現有欄位數為:'.$fields_num.'<br>';
	
	$result_field=mysql_query('select * from userss'); //執行sql指令
	
    $fields_num=mysql_num_fields($result_field); //取得資料表欄位數
	
	for( $ars = 0 ; $ars < $fields_num ; $ars++){
		$result_zero[$ars] = mysql_result($repeat,0,$ars);
	}

	
	//////////////////////////////處理欄位//////////////////////////////// 
		 for ( $x = 0 ; $x < ($fields_num) ; $x++ ){
			$meta=mysql_fetch_field($result_field);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name[$x]=$meta->name; //將欄位名稱儲存到$fields_name陣列
  		}
		
		 foreach($the_fields_name as $key_dele => $value_dele){     //取得陣列元素,並刪除id元素
      		if($value_dele == 'id'){
         		unset($the_fields_name[$key_dele]);
      		}
    	}

		$final_fieldname = implode($the_fields_name,",");           //用逗號分隔各元素值
				
		for( $bnm = 1 ; $bnm < ($fields_num) ; $bnm++ ){
			$POST_data[$bnm] = "'".$_POST["$the_fields_name[$bnm]"]."'" ;   //用POST方式取得資料內容
		}
		
		$POST_data = array_values($POST_data);                  //因為刪除 id 因此重新排列陣列
		$final_POST_data = implode($POST_data,",");				//用逗號分隔各元素值

		if ($_POST["action1"]=="add"){							//新增欄位
			$sql_query = "INSERT INTO userss(".$final_fieldname.") VALUES (" ;
			
			$sql_query .="".$final_POST_data.")";
			
			$insert_result = mysql_query($sql_query);				
?>     

 	   <script language="JavaScript">
			alert("新增完畢")
			window.location="import_data.php"
       </script>

<?PHP
}
?>  

<?PHP
	if ($_POST["action2"]=="truncate"){             //刪除資料表
			$sql_query = "TRUNCATE userss" ;
			$turncate_table = mysql_query($sql_query);		
?>	
 		<script language="JavaScript">
			alert("清空完畢")
			window.location="import_data.php"
       </script>
<?PHP
}
?> 

  
	<form action="" name="formAdd" id="formAdd" method="post" enctype="multipart/form-data" >	
        <table border="1" align="center" cellpadding="4">
		<?PHP
			for( $ii = 1 ; $ii < $fields_num  ; $ii++ ){
				if( $ii % 5 == 1 ){ 					
					echo "<tr><td>".$result_zero[$ii]."</td><td><input type='text' name= ".$the_fields_name[$ii]." ></td>";
				 //	echo $result_zero[$ii].",".$the_fields_name[$ii]."<br>";
				}
				elseif( $ii % 5 == 2 ){ 
					echo "<td>".$result_zero[$ii]."</td><td><input type='text' name= ".$the_fields_name[$ii]." ></td>";
				//	echo $result_zero[$ii].",".$the_fields_name[$ii]."<br>";				
				}
				elseif( $ii % 5 == 3 ){ 
					echo "<td>".$result_zero[$ii]."</td><td><input type='text' name= ".$the_fields_name[$ii]." ></td>";		
				//	echo $result_zero[$ii].",".$the_fields_name[$ii]."<br>";		
				}
				elseif( $ii % 5 == 4 ){ 
					echo "<td>".$result_zero[$ii]."</td><td><input type='text' name= ".$the_fields_name[$ii]." ></td>";	
				//	echo $result_zero[$ii].",".$the_fields_name[$ii]."<br>";			
				}
			
				elseif( $ii % 5 == 0 ){ 
					echo "<td>".$result_zero[$ii]."</td><td><input type='text' name= ".$the_fields_name[$ii]." ></td></tr>";	
				//	echo $result_zero[$ii].",".$the_fields_name[$ii]."<br>";			
				}	
			}		
		?>
        </table>
        	
			   <center>
                 <input type="hidden" name="action1" value="add"/>
        		 <input type="submit" name="new" id="new" value="新增帳戶"
                 		style=" width:100px; height:40px; border:2px  #000000 dashed; 		
                        background-color:pink; font-size:20px;" />			
              </center>
              
              <br>           
	</form>
    
    <form action="" name="formdel" id="formdel" method="post" enctype="multipart/form-data" >	
 			  <center>
                 <input type="hidden" name="action2" value="truncate"/>
        		 <input type="submit" name="truncate" id="truncate" value="清空資料表"
                 		style=" width:120px; height:40px; border:2px  #000000 dashed; 		
                        background-color:pink; font-size:20px;" />			
              </center>
    </form>
</span>
</body>
</html>




