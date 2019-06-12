
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn,$dbname);
  //if(isset($_POST['search']))
	/*if (isset($_POST['search'])) {
		if (empty($_POST['searchItem']) ) {
			$error = "enter search key";
		}
		else
		{
			if(preg_match("/^[  a-zA-Z]+/", $_POST['searchItem'])){ 
				 $adname=$_POST['searchItem'];
				 $sql="SELECT  *FROM subcategory WHERE subcatname LIKE '%" . $adname .  "%'"; 
				$result=mysql_query($sql); 
				while($row=mysql_fetch_array($result)){ 
	      
					echo '<div class="col-sm-4 col-xs-4 Width320">';
					echo '<div class="AdOuter">';
					echo '<img src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'"  width="308" height="165" alt=""/>';
					echo  '  <label style="left:5px">' . $row['subcatname'].'</label>';
					echo ' <label style="right:5px;">' . $row['subcataddress'].'</label>';
			
					echo '</div>';
					echo  '</div>';
				} 		
			}
		}
	}*/
	
 if(isset($_GET['go'])){ 
		if(preg_match("/^[  a-zA-Z]+/", $_POST['SearchKey'])){ 
			$name=$_POST['SearchKey']; 
			$sql="SELECT  *FROM subcategory WHERE subcatname LIKE '%" . $name .  "%'"; 
			$result=mysqli_query($conn,$sql); 
			while($row=mysqli_fetch_array($result)){ 
				   echo '<div class="col-sm-4 col-xs-4 Width320">';
					echo '<div class="AdOuter">';
					echo '<img src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'"  width="308" height="165" alt=""/>';
					echo  '  <label style="left:5px">' . $row['subcatname'].'</label>';
					echo ' <label style="right:5px;">' . $row['expireDate'].'</label>';
					echo '</div>';
					echo  '</div>';
			} 
			//categorey search itemes			
			$searchCat="SELECT  *FROM category WHERE catname LIKE '%" . $name .  "%'"; 
			$result=mysqli_query($conn,$searchCat); 
			while($row=mysqli_fetch_array($result)){ 
				   echo '<div class="col-sm-4 col-xs-4 Width320">';
					echo '<div class="AdOuter">';
					echo '<img src="data:image/png;base64,'.base64_encode( $row['catimage'] ).'"  width="308" height="165" alt=""/>';
					echo  '  <label style="left:5px">' . $row['catname'].'</label>';
					echo '</div>';
					echo  '</div>';
			} 				
		} 
		 
	
	}
?> 