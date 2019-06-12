<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--<style>
.catDiv{width: 27%;
    background-color: grey;
    padding: 5px;float: left;
    margin: 70px;}
</style>-->
</head>

<body >
<?php
	//include 'cat.php';
	include 'index.php';
	include 'displayimg.php';
?>
<div class="catDiv" id="catDivId" style="">
	<form method="POST" action="cat.php" enctype="multipart/form-data">
	
    <p>
        <label for="catname">category Name:</label>
        <input type="text" name="catname" id="catname">
    </p>
   
	<input type="file" name="image" id="imageUpload">
	
    <input type="submit" value="Submit" name="submit">
	
</form>
</div>
<div class="catDiv" id="subCatID">
<form method="POST" action="" enctype="multipart/form-data">
			<Select name='catid'  class='subCatName'>
				<?php
				while($row=mysql_fetch_array($categoryName)){
			
			echo '<option value="'. $row['catid'] .'">' . $row['catname'].'</option>'; 
		}
				?>
			</select>
			
    <p>
        <label for="subCatName">Ad Name:</label>
        <input type="text" name="subCatName" id="subCatName">
    </p>
    <p>
        <label for="subCatAddress">Address:</label>
        <input type="text" name="subCatAddress" id="subCatAddress">
    </p>
	 <p>
        <label for="date">Date:</label>
        <input type="text" name="date" id="expireDate">
    </p>
	<input type="file" name="image" id="subCatimageUpload">
	
    <input type="submit" value="Submit" name="submit">
	
</form>
</div>
</body>
</html>
