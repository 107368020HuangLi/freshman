<?PHP
 ///////////////////////////產生外部EXCEL/////////////////////////////	
	  $filename ="test.xls";
 
      $contents = "Now_Time\tinquiry_content\n";
      $contents = $contents.date("Y_m_d_H_i_s");
      
      header('Content-type: application/ms-excel');
      header('Content-Disposition: attachment; filename='.$filename);
      echo $contents;
	
 ?>