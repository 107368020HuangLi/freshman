<title>管理員的介面</title>
<?php
include("home_page.php"); 
include("myprojectcsv.php");

$myprojectcsv = new myprojectcsv();
if( isset($_POST['sub'])) {
	$myprojectcsv->import($_FILES['file']['tmp_name']);
	echo '<meta http-equiv=REFRESH CONTENT=0.5;url=import_data.php>';
}

if( isset($_POST['exp'])) {
	$myprojectcsv->export();
}

?>

<!DOCTYPE html>
<html>
<head>       
</head>

<body>
		<center>
			<form method="post" enctype="multipart/form-data">
			<input type="file" name="file">
    		<input type="submit" name="sub" value="Import"
            	   style=" width:100px; height:40px; border:2px  #000000 dashed; 		
                           background-color:#3BFF3B; font-size:20px;">
			</form>
		</center>
</body>
</html>