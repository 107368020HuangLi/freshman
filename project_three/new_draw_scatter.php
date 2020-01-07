<?php
	include ("src/jpgraph.php"); 
	include ("src/jpgraph_scatter.php");
	include("include/test_app_top.php"); 
	$find_dataset = $_GET["table_name"];
	$sql_data2 = "SELECT * FROM $find_dataset"; // 資料表
		
			$repeat3_x = mysql_query($sql_data2);
			$repeat3_y = mysql_query($sql_data2);			
			$fields_num3_x=mysql_num_fields($repeat3_x);//取得資料表欄位數
			$fields_num3_y=mysql_num_fields($repeat3_y);//取得資料表欄位數			
			$num3_x=mysql_num_rows($repeat3_x);
			$num3_y=mysql_num_rows($repeat3_y);
			
			for( $find_col_x = 0 ; $find_col_x < $num3_x ; $find_col_x++){
				$dataa_x = mysql_fetch_row($repeat3_x);
				$stores_data_x[$find_col_x] = $dataa_x[$_GET['column_draw_x']] ;
			}
			
			for( $find_col_y = 0 ; $find_col_y < $num3_y ; $find_col_y++ ){
				$dataa_y = mysql_fetch_row($repeat3_y);
				$stores_data_y[$find_col_y] = $dataa_y[$_GET['column_draw_y']] ;
			}
			
	$graph = new Graph(900,900);
	$graph->SetScale("linlin");
 
	$graph->img->SetMargin(80,80,80,80);        
	$graph->SetShadow();
 
	$graph->title->Set("A simple scatter plot");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
	$sp1 = new ScatterPlot($stores_data_y,$stores_data_x);  //y,x
	
	$graph->Add($sp1);
	
	$graph->Stroke();

	?>
