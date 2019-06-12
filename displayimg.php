<?php

    //http://www.formget.com/php-post-get/
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	//$conn = mysql_connect($servername, $username, $password);
	
	$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

	if(isset($_GET['id'])){
		$id=mysqli_real_escape_string($conn,$_GET['id']);
		$query=mysqli_query($conn,"select * from subcategory where catid='$id'");
		  while($row=mysqli_fetch_assoc($query)){
         echo '<div class="col-sm-4 col-xs-4 Width320">';
          		echo '<div class="AdOuter">';
				echo '<img src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'"  width="308" height="165" alt=""/>';
           	   // echo	'<img src="images/ad_1.png" width="308" height="165" alt=""/>';
                 echo  '  <label style="left:5px">' . $row['subcatname'].'</label>';
                  echo ' <label style="right:5px;">'.date("Y/m/d").'</label>';
				 
         
                   
                echo '</div>';
         echo  '</div>';
		
          }
		 
	}
	
	//get subcategory list on slection of category

	//user save fav item into database
	if(isset($_GET['ids'])){
		$favId = $_POST['favid'];
		$userId = $_POST['userid'];
		$userinfo=mysqli_query($conn,"insert into  userinfo values('','$favId','$userId')");
		//echo $userinfo;
	}
	//user save unique pinnedid item into database
	if( isset($_GET['pinid'])){
		$pinid = $_POST['pinid'];
		$pinuserid = $_POST['pinuserid'];
		//echo $pinuserid ;
		$pinnData=mysqli_query($conn,"select * from pinnedcat where pincatid=$pinid and pinneduser=$pinuserid");
		if($row=mysqli_fetch_array($pinnData)){
			//echo "record alredy exits";
		}else{
			//echo "record not exits";
			$userPinInfo=mysqli_query($conn,"insert into  pinnedcat  values('','$pinid','$pinuserid')");
		}
		
		//echo $userinfo;
	}
	if( isset($_GET['ID'])){
		$reminderData = $_POST['reminderData'];
		$userLoginId = $_POST['userLoginId'];
		//$reminderDatasr=25;
		$queryCal=mysqli_query($conn,"SELECT * FROM subcategory where subcatid=$reminderData ");
		while($row=mysqli_fetch_array($queryCal)){
		//echo $row['subcataddress'];
			$expdate =  $row['expireDate']; 
			$userCalInfo=mysql_query("insert into  calendar values('','$expdate','$userLoginId','$reminderData') ");
		}
	}
	//category 
	$categoryName=mysqli_query($conn,"SELECT * from category");
	//select all subcategory and its for main page
		$query=mysqli_query($conn,"SELECT * FROM subcategory ORDER by subcatid DESC");
		//echo json_encode($query);
		//echo $query;
		//select favlist
		
		//$favlist=mysql_query("SELECT b.subcatid, b.subcatname, b.subcataddress,b.subcatimage FROM userinfo a, subcategory b WHERE a.favid = b.subcatid");
		//$favlist=mysql_query("SELECT b.subcatid, b.subcatname, b.subcataddress,b.subcatimage FROM userinfo a, subcategory b WHERE a.favid = b.subcatid and a.userid=$userLoginId");
		//$pinnedItem=mysql_query("SELECT b.catid,b.subcatname,b.subcataddress,b.subcatimage FROM userpinitem a,subcategory b WHERE b.catid=a.pinnedid");
		//echo $subCatID['subcatid'];
		//$pinnedItem=mysql_query("SELECT b.catid,b.subcatname,b.subcataddress,b.subcatimage FROM userpinitem a,subcategory b WHERE b.catid=a.pinnedid and a.pinneduser=$userLoginId");

		//$subcatimage =mysql_query("SELECT * from  subcategory WHERE $subCatID['subcatid']=$catID['catid']");
		//echo $subcatimage;
?>