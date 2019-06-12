<?php

if(isset($_POST['submit']))
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	mysqli_select_db($conn,$dbname);
	$catID = $_POST['catid'];
	$subCatName = $_POST['subCatName'];
	$subCatAddress = $_POST['subCatAddress'];
	$expireDate = $_POST['date'];
	$imagename=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
	$subCatImage=mysqli_real_escape_string($conn,file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType=mysqli_real_escape_string($conn,$_FILES["image"]["type"]);

	if(substr($imageType,0,5)== "image"){
		
		mysqli_query($conn,"insert into subcategory values('','$catID','$subCatName','$expireDate','$subCatAddress','$subCatImage')");
		//echo "image uploaded";
		header('Location: admin.php');
	}
	else{echo "only images are allowed";
	}

}



//mysqli_close($conn);
	
?>