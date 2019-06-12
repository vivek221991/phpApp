
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style>

</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
//include 'index.php';
include 'index.php';
	include 'displayimg.php';3
?>
</head>

<body >
<div class="AdminHeader"><img src="images/Logo.png" width="113" height="25" alt="" style="margin:15px;" /></div>

<div style="width:1000px; margin:0px auto">
<div class="AdminHeading">Add Category</div>
<div class="AdminContentOuter">

<div class="CategorySection" id="catDivId" style="">
	<form method="POST" action="cat.php" enctype="multipart/form-data">
	
    
        <label for="catname">category Name:</label>
        <input type="text" name="catname" id="catname" class="TxtBox" required>
    
   
	<input type="file" name="image" id="imageUpload" required>
	
    <input type="submit" value="Submit" name="submit" class="SubmitBtn" >
	
</form>
</div>
</div>
<div class="AdminHeading">Add Sub Category</div>
<div class="AdminContentOuter">

<div class="CategorySection" id="subCatID">

<form method="POST" action="" enctype="multipart/form-data">
<label for="adName">Select Category:</label>
			<Select name='catid'  class='subCatName TxtBox'>
				<?php
				while($row=mysqli_fetch_array($categoryName)){
			
			echo '<option value="'. $row['catid'] .'">' . $row['catname'].'</option>'; 
		}
				?>
			</select>
			
			
	<div style="width:100%; float:left;">
    	<label for="subCatName">Ad Name:</label>
        <input type="text" name="subCatName" id="subCatName" class="TxtBox" required >
   
        <label for="subCatAddress">Address:</label>
        <input type="text" name="subCatAddress" id="subCatAddress" class="TxtBox" required>
    
        <label for="date">Date:</label>
        <input type="text" name="date" id="expireDate" class="TxtBox" placeholder="yyyy-mm-dd" required>
    </div>		
	<input type="file" name="image" id="subCatimageUpload" style="float:left" required>
	
    <input type="submit" value="Submit" name="submit" class="SubmitBtn">
	
	
</form>
</div>
</div>
</div>

</body>
</html>
