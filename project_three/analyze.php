<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分析</title>
</head>

	<body background="background/ADDM.jpg">
    
	<h1 align="center"><font color="#FF0000">分析介面</font></h1>
    
<body>


 				
                
    <form action="" name="analysis" id="analysis" method="post" enctype="multipart/form-data" >
  		<tr>
    		<td colspan="2" aligan="center">
              	<center>
                      
     <?php
    	 if(!empty($_POST['regression'])){
        	echo '<meta http-equiv=REFRESH CONTENT=1;url=regression.php>';    //跳至回歸頁面
	 	 }
						 	 
		 if(!empty($_POST['ttest'])){
			 echo '<meta http-equiv=REFRESH CONTENT=1;url=ttest.php>';   //跳至t檢定頁面
	 	 }
	 
	 	if(!empty($_POST['independent'])){
			 echo '<meta http-equiv=REFRESH CONTENT=1;url=independent.php>';      //跳至卡方獨立性分析頁面
	 	 }	       
	?>
    
    			<center>
                    	<input type="hidden" name="action" value="regression"/>  
                        <input type="submit" name="regression" id="regression" value="迴歸分析"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:20px;" />
                              
                        <input type="hidden" name="action" value="ttest"/>  
                  	    <input type="submit" name="ttest" id="ttest" value="t檢定"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	
                           
                               
                        <input type="hidden" name="action" value="independent"/>  
                        <input type="submit" name="independent" id="independent" value="卡方獨立性分析"
                        	   style="width:200px; height:40px; border:2px  #000000 
                               dashed; 	background-color:pink;  font-size:25px;" />	
			    </center>
                
                </td>               
  			 </tr>
		</form>	

    	<table border="0" align="center" cellpadding="4">
			<tr>
				<td><p><a href="import_data.php">go_Back</a><p></td>
			</tr>
		</table>

</body>
</html>