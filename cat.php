<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);

	mysql_select_db($dbname);
	
	$catname = $_POST['catname'];
	$imagename=mysql_real_escape_string($_FILES["image"]["name"]);
	$imagedata=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType=mysql_real_escape_string($_FILES["image"]["type"]);

	if(substr($imageType,0,5)== "image"){
		
		mysql_query("insert into category values('','$imagedata','$catname')");
		//echo "image uploaded sucess";
		header('Location: admin.php');
	}
	else{echo "only images are allowed";}
	
		

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>