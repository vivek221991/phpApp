<?php

if(isset($_POST['submit']))
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);

	mysql_select_db($dbname);
	$catID = $_POST['catid'];
	$subCatName = $_POST['subCatName'];
	$subCatAddress = $_POST['subCatAddress'];
	$expireDate = $_POST['date'];
	$imagename=mysql_real_escape_string($_FILES["image"]["name"]);
	$subCatImage=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType=mysql_real_escape_string($_FILES["image"]["type"]);

	if(substr($imageType,0,5)== "image"){
		
		mysql_query("insert into subcategory values('','$catID','$subCatName','$expireDate','$subCatAddress','$subCatImage')");
		//echo "image uploaded";
		header('Location: admin.php');
	}
	else{//echo "only images are allowed";
	}

}



//mysqli_close($conn);
	
?>