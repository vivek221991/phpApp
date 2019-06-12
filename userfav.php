
  <?php 
  include 'displayimg.php';
  
  ?>
     <?php include 'header.php';?>
    
    <div class="container CategoryBorder">
    <div class="row">
    	<div class="col-sm-12 col-xs-12 FavHeader">
        	<img src="images/fav_Icon.png" style="background: #FF7F7F;"width="20" height="18" alt=""/>
			<span class="" style="background: #fff;color: grey;">My Favourite</span>
        </div>
    </div>
    </div>
    <div class="container ContainerHeight">
	<div class="GridOuter">
    	<div class="row">
		<?php
		include 'usersession.php';
		
		$favlist=mysqli_query($conn,"SELECT b.subcatid, b.subcatname, b.expireDate,b.subcatimage FROM 
		userinfo a, subcategory b WHERE a.favid = b.subcatid and a.userid=$userLoginId");
		if($favlist){
		while($row=mysqli_fetch_array($favlist)){		
			echo '<div class="col-sm-4 col-xs-4 Width320">';
          	echo '<div class="AdOuter">';
           	 echo '<img  src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'"  width="308" height="300"/>';
                echo '  <label style="left:5px">' . $row['subcatname'].'</label>';
                   echo 	'<label style="right:5px;">' . $row['expireDate'].'</label>'; 
              echo ' </div>';
			echo '</div>';
			}}else{
				echo '<h3>No User Sign in</h3>';
			}
			?>
        </div>
    </div>
    </div>
    <div class="Footer">
    	<div class="container">
    	<label>&copy; Pamphlet.com. 2016, All Rights reserved. <br > <a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a></label>
        <div class="FollowUsOtr">
        	<span>Follow Us</span>
            <img src="images/fb.png" width="21" height="22" alt=""/>
            <img src="images/twitt.png" width="22" height="23" alt=""/>
            <img src="images/g_plus.png" width="23" height="24" alt=""/>
        </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		/*function getFavItem(){
			$.ajax({
				type: "POST",
				url: "displayimg.php?id=" +favId,
				data:foo,
				success: function(result){
					console.log(result);
				}
			});
		}*/
	</script>
	
  </body>
</html>