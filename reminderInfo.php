  
  
  <?php include 'header.php';?>
 <?php
 $reminfo = mysqli_query($conn,"SELECT b.subcatname,b.subcatimage, b.expireDate,a.exp_date,a.adv_name,a.calId FROM calendar a, subcategory b WHERE b.expireDate=a.exp_date and a.adv_name=$userLoginId");
		if($reminfo){
			while($row=mysqli_fetch_array($reminfo)){
				echo '<div class="AdOuterReminder">';
				echo '<img   src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'"  width="50" height="50"/>';
				echo '<span>
				Ad Name - ' . $row['subcatname'].'<br />
				Last Date - ' . $row['expireDate'].'
				</span>';
				echo '</div>';
			}
		}else{
			echo 'No user reminder selected';
		}
?>
