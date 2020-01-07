
 <?php
 	mysql_connect("localhost","root","123456789");    //與資料庫建立連線
 	mysql_select_db("project_three");  //選擇資料庫  /*建立資料表*/
 
 	$sql_data = "SELECT * FROM userss"; // 資料表
 	$repeat = mysql_query($sql_data); 
 	$num=mysql_num_rows($repeat);			
		
 	$fields_num=mysql_num_fields($repeat);//取得資料表欄位數
		
		 
 	for ( $x = 0 ; $x < ($fields_num) ; $x++ ){
		$meta = mysql_fetch_field($repeat);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    	$the_fields_name[$x]=$meta->name; //將欄位名稱儲存到$fields_name陣列
		$like_between[$x] = $_GET["$the_fields_name[$x]"] ? $_GET["$the_fields_name[$x]"] : null ;
 	}

/////////////////////////////////////////////建表新增用//////////////////////////////////////////
 	for( $con = 1 ; $con < $fields_num ; $con++ ){
		if( $like_between[$con] == "like"   ){
	 		$fis[$con] = $the_fields_name[$con]." like '%".$_GET[$con]."%'" ;			
		}
	 
		if( $like_between[$con] == "between" ){
			$replace =  str_replace(","," and ",$_GET[$con]);
	 		$fis[$con] = $the_fields_name[$con]." between ".$replace ;
		}
	 	$finals = implode(" and ",$fis);
 	}
	
//////////////////////////////////////////sql匯入用///////////////////////////////////////	
	for( $con_sql = 1 ; $con_sql < $fields_num ; $con_sql++ ){
		if( $like_between[$con_sql] == "like"   ){
	 		$fis_sql[$con_sql] = $the_fields_name[$con_sql]." like \'%".$_GET[$con_sql]."%\'" ;		///////////////////////////////輸入注意		
		}
	 
		if( $like_between[$con_sql] == "between" ){
			$replace_sql =  str_replace(","," and ",$_GET[$con_sql]);
	 		$fis_sql[$con_sql] = $the_fields_name[$con_sql]." between ".$replace_sql ;
		}
	 	$finals_sql = implode(" and ",$fis_sql);
 	}
 /*
 	for( $test = 1 ; $test < ($fields_num) ; $test++ ){	
		if(!empty($_GET[$test])){
			if( $like_between[$test] == "like" ){
				$fff[$test] = $the_fields_name[$test]."column:".$_GET[$test].";";
			}
			if( $like_between[$test] == "between" ){
				$replace_data =  str_replace(",","and",$_GET[$test]);
				$fff[$test] = $the_fields_name[$test]."column:".$replace_data.";";
			}
		}
		if(empty($_GET[$test])){
			$fff[$test] = "";
		}
	    $ASD_final = implode("",$fff);
 	}
	*/
?>

	
	
<?PHP
	$get_named_table = $_GET['named_table'] ? $_GET['named_table'] : null ;
	$get_named_table2 = $_GET['named_table'] ? $_GET['named_table'] : null ;
	$get_named_table3 = $_GET['named_table'] ? $_GET['named_table'] : null ;
	$get_named_table4 = $_GET['named_table'] ? $_GET['named_table'] : null ;
 	
	$show_tables = "show tables FROM project_three";
	$aaty = mysql_query($show_tables);
	$tables_num = mysql_num_rows($aaty);
	
	for( $tery = 0 ; $tery < $tables_num ; $tery++ ){
		$fs[$tery] = mysql_result($aaty,$tery);
	}
		
	if( in_array($get_named_table,$fs) ){         //找陣列元素是否已存在
		$sql="truncate TABLE ".$get_named_table ; /*清空SQL資料表*/	
		$sql2 = "insert into ".$get_named_table2." SELECT * FROM userss where $finals GROUP BY id"; /*重建SQL資料表*/
	}
	else{
		$sql="create table ".$get_named_table." SELECT * FROM userss where $finals GROUP BY id"; /*建立SQL資料表*/
		
	}
	
	mysql_query($sql); 
	mysql_query($sql2);
	?>
    
    <?PHP
	/////////////////////////////////////保存搜尋條件/////////////////////////
	$sql_store_query = "CREATE DATABASE query_result" ;
	mysql_query($sql_store_query);
	
	$select_query_database = "USE query_result" ;
	mysql_query($select_query_database);
	
	$sql_table_query = "CREATE TABLE  query_".$get_named_table3." ( 
			query_id INT NOT NULL AUTO_INCREMENT,
			query_connect TEXT NOT NULL,
			PRIMARY KEY ( query_id ))";
	mysql_query($sql_table_query);

	$sql_query_insert = "INSERT INTO query_".$get_named_table4."(
			query_connect ) VALUES ( '$finals_sql' )";
	mysql_query($sql_query_insert);
	?>
    
    <?PHP
	/*
		<form action="" name="form_named" id="form_named" method="get"  enctype="multipart/form-data" >	 
		 <table border="1" align="center" cellpadding="5">
         	<?PHP
         		echo "<td align=center><input type='text' name='named_table' size='20'/></td>";
         	?>
         </table>
         
         	  <center>
              	 <input type="hidden" name="action" value="sub_named"/>
        		 <input type="submit" name="sub_named" id="sub_named" value="確定命名此資料表名稱"
                 		style=" width:300px; height:40px; border:2px  #000000 dashed; 		
                        background-color:pink; font-size:20px;" />			
              </center>
    	</form>
	*/
	
	
	/*

	*/
 ?> 
 
 
 <?PHP
 ///////////////////////////產生外部EXCEL/////////////////////////////
 
 /*	
	  $filename =fopen('C:/Users/8064/Desktop/test.txt','a');
	  
	  fwrite($filename,"Now_time\t");
	  fwrite($filename,"inquiry_connect\t\t\n");
      fwrite($filename,date("Y_m_d_H_i_s")."\t");
	  fwrite($filename,$ASD_final."\n");
      fclose($filename);
 */
 
 
 /*
 	store2.php?A=like&1=&B=like&2=&C=like&3=&D=like&4=&E=like&5=&F=like&6=&G=like&7=&H=like&8=&I=like&9=&J=like&10=&K=like&11=&L=between&12=50%2C72&M=like&13=&N=like&14=&O=like&15=&P=like&16=&Q=like&17=&R=like&18=&S=like&19=&T=like&20=&U=like&21=&V=like&22=&W=like&23=&X=like&24=&Y=like&25=&Z=like&26=&AA=like&27=&AB=like&28=&AC=like&29=&AD=like&30=&AE=like&31=&AF=like&32=&AG=like&33=&AH=like&34=&AI=like&35=&AJ=like&36=&AK=like&37=&AL=like&38=&AM=like&39=&AN=like&40=&AO=like&41=&AP=like&42=&AQ=like&43=&AR=like&44=&ASS=like&45=&AT=like&46=&AU=like&47=&AV=like&48=&AW=like&49=&AX=like&50=&AY=like&51=&AZ=like&52=&BA=like&53=&BB=like&54=&BC=like&55=&BD=like&56=&BE=like&57=&BF=like&58=&BG=like&59=&BH=like&60=&BI=like&61=&BJ=like&62=&BK=like&63=&BL=like&64=&BM=like&65=&BN=like&66=&BO=like&67=&BP=like&68=&BQ=like&69=&BR=like&70=&BS=like&71=&BT=like&72=&BU=like&73=&BV=like&74=&BW=like&75=&BX=like&76=&BYY=like&77=&BZ=like&78=&CA=like&79=&CB=like&80=&named_table=age&action=sub_chose&sub_chose=確定查找項目
 */
 ?>
 	  
 	   <script language="JavaScript">
			alert("儲存完成")
			window.location="analyze.php"
       </script>