<?php
class myprojectcsv extends mysqli
{	
	public function __construct()     ///兩個底線
	{
		parent::__construct("localhost","root","123456789","project_three");
		if($this->connect_error){
			echo "Fail to connect to Database :". $this->connect_error;
		}
	}
	
	public function import($file)
	{	
		$this -> state_csv = false;
		$file = fopen($file,'r');
		
		$result_field = mysql_query('select * from userss'); //執行sql指令;
 	    $fields_names = mysql_num_fields($result_field);//取得資料表欄位數
		
		$test_num = mysql_num_rows($result_field);  //查看資料庫資 資料筆數,用於判斷是否回傳第一行
	//////////////////////////////處理欄位//////////////////////////////// 
		 for ( $x = 0 ; $x < ($fields_names) ; $x++ ){
			$meta = mysql_fetch_field($result_field);//取得欄位資訊,使用mysql_fetch_field函數目的要取得資料表欄位名稱
    		$the_fields_name[$x] = $meta -> name ; //將欄位名稱儲存到$fields_name陣列
  		 }
		
		 foreach($the_fields_name as $key_dele => $value_dele){
      		if($value_dele == 'id'){
         		unset($the_fields_name[$key_dele]);
      		}
    	 }
		
		$the_fields_name = array_values($the_fields_name);


		if( $test_num == 0 ){
			$first = true; 
		}
		else{
			$first = false;
		}
////////////////////////////////////////////////////////////////////
		while( $row = fgetcsv($file)  ){		
			if(!$first){
				$first = true ;		
			}
			else{
				$value = "'". implode("','", $row) . "'";
				$final_fieldname = implode($the_fields_name,",");
				$q = "INSERT INTO userss(".$final_fieldname.") VALUES(". $value .") " ; 
				//  ON DUPLICATE KEY UPDATE B=VALUES(B) //選擇資料表  
				// ON DUPLICATE KEY UPDATE B = VALUES(B) or id=id+1  
				//  ON DUPLICATE KEY UPDATE id=id+1
			    // $q = "REPLACE INTO data(B)  VALUES(B)" ;
			   
			    $q = mb_convert_encoding($q,'UTF-8','Big5');
			     
				if( $this->query($q) ){
					$this->state_csv = true;
				}else{
					$this->state_csv = false;
				}
			}
		}
		
		if($this->state_csv){
			echo  "Successful Import";
		}else{
			echo  "Something Error";
		}
		
	}
	
	
	public function export()
	{
		 
		$exp_dataset = $_GET["table_name"];	
	//	$this->state_csv = false;
		$q = "SELECT * FROM $exp_dataset";          //選擇資料表
	
	//	$q = mb_convert_encoding($q,'UTF-8','auto');  //匯出要中文字  ///bug //目標&原始
		 
	//	$run = $this->query($q);
		
	//	$output_name = $exp_dataset.'.csv' ;
//		header("Content-Description: File Transfer");
		
		header('Content-Type: text/csv;  charset=utf-8');
		header('Content-Disposition: attachment; filename='.$exp_dataset.'.csv');
		ob_clean();
		echo( chr(0xEF).chr(0xBB).chr(0xBF) ) ;
			
		$user_data = $this -> query($q);
		$file = fopen("php://output","w");
		
		mysql_connect("localhost","root","123456789");    //與資料庫建立連線
		mysql_select_db("project_three");  //選擇資料庫 
		
		$use_database = "USE project_three";
		$sql_use_database = mysql_query($use_database);
							mysql_query($sql_use_database);
		$result_use_table = mysql_query('select * from userss'); //執行sql指令
		
		$num_use_first = mysql_num_rows($result_use_table);
		$fields_num_use_first = mysql_num_fields($result_use_table);//取得資料表欄位數
		
		for( $count = 0 ; $count < $fields_num_use_first ; $count++ ){
			$result_use_first_column[$count] = mysql_result($result_use_table,0,$count);  //列印出第一列資訊
		}
		
		$final_output_file = implode($result_use_first_column,",");
		fputcsv($file,split(",",$final_output_file));
			
		while( $row = $user_data->fetch_array(MYSQLI_NUM)){
			fputcsv($file,$row) ;
		}

		fclose($file);
		exit;
	/*	
		if( $run->num_rows > 0 ){
			$fn = $exp_dataset .".csv";
			$file = fopen("C:/Users/8064/Desktop/" . $fn,"w");  //注意電腦名稱
			while( $row = $run->fetch_array(MYSQLI_NUM)){
				if( fputcsv($file,$row)){
					$this->state_csv = true;
				}else{
					$this->state_csv = false;
				}
			}
			if($this->state_csv){
				echo  "Successfully Export";
			}else{
				echo  "Something Error";
			}
			fclose($file);
		}else{
			echo "No data found";	
		}
	*/
	}
}

/*
A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,
									   AA,AB,AC,AD,AE,AF,AG,AH,AI,AJ,AK,AL,AM,AN,AO,AP,AQ,AR,ASS,AT,AU,AV,AW,AX,AY,AZ,
									   BA,BB,BC,BD,BE,BF,BG,BH,BI,BJ,BK,BL,BM,BN,BO,BP,BQ,BR,BS,BT,BU,BV,BW,BX,BYY,BZ,
									   CA,CB,sss
*/

/*
 t.A , t.B , t.C , t.D , t.E , t.F , t.G , t.H , t.I , t.J , t.K , t.L , t.M , t.N , t.O , t.P , t.Q ,
		              t.R , t.S , t.T , t.U , t.V , t.W , t.X , t.Y , t.Z ,
					  
					  t.AA , t.AB , t.AC , t.AD , t.AE , t.AF , t.AG , t.AH , t.AI , t.AJ , t.AK , t.AL , t.AM , t.AN ,t.AO , t.AP , t.AQ , t.AR , t.ASS , t.AT , t.AU , t.AV , t.AW , t.AX , t.AY , t.AZ ,
					  
					  t.BA , t.BB , t.BC , t.BD , t.BE , t.BF , t.BG , t.BH , t.BI , t.BJ , t.BK , t.BL , t.BM , t.BN ,t.BO , t.BP , t.BQ , t.BR , t.BS , t.BT , t.BU , t.BV , t.BW , t.BX , t.BYY , t.BZ ,
					  
					  t.CA , t.CB 

*/
?>