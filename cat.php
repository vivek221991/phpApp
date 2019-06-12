<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	mysqli_select_db($conn,$dbname);
	
	$catname = $_POST['catname'];
	$imagename=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
	$imagedata=mysqli_real_escape_string($conn,file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType=mysqli_real_escape_string($conn,$_FILES["image"]["type"]);

	if(substr($imageType,0,5)== "image"){
		
		mysqli_query($conn,"insert into category values('','$imagedata','$catname')");
		//echo "image uploaded sucess";
		header('Location: admin.php');
	}
	else{echo "only images are allowed";}
	
		

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>