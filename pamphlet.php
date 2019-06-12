 <?php
  include 'displayimg.php';
 ?>

	  <?php include 'header.php';?>
   
    <div class="container ContainerHeight">
	<div class="GridOuter">
	
    	<div class="row" id="offers">
		  <?php
		  while($row=mysqli_fetch_array($query)){
			 echo '<div class="col-sm-4 col-xs-4 Width320 "  >';
					echo '<div class="AdOuter" >';
						//echo '<img  src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'"  width="308" height="300"/>';
						echo '<img   src="data:image/png;base64,'.base64_encode( $row['subcatimage'] ).'" class="Popup" id="popup'.$row['subcatid'].'" width="300" height="300"/>';
							echo 	'<label style="left:5px">' . $row['subcatname'].'</label>';
							echo 	'<label style="right:5px;">' . $row['expireDate'].'</label>'; 
							echo 	'<div class="OverlayOuter">';
							echo	'<img src="images/fav_Icon.png" id="'.$row['subcatid'].'" name="fav" class="FavIcon" width="20" height="17" alt="" />';
							echo	'<img src="images/pin_Icon.png" width="12" id="'.$row['subcatid'].'@'.$row['catId'].'"  class="FavIcon" name="pin" height="18" alt=""/>';
							echo	'<img src="images/reminder_Icon.png" width="20" height="19" id="@'.$row['subcatid'].'" name="reminder"  class="FavIcon" alt=""/>';
							echo 	'</div>';
							echo 	'<form id="inputDiv_'.$row['subcatid'].'" action="" method="post" style="display: none;">';
							echo 	'<input type="text" class="EmailTxtField" name="mailid" placeholder="Please Enter E-mail ID" id="userid_'.$row['subcatid'].'" required />';
							echo	'<input type="submit" value="Submit" name="submit"  class="SubmitBtn"  />';
							echo '</form>';
					 echo '</div>';
			  echo '</div>';
		  }					
         ?>
        </div>
	
    </div>
    </div>
	<div id="popupdiv"></div>
	  <?php include 'usersession.php'; ?>
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
	
	//serch adname 
	$('img.Popup').click(function(e) { 
		//console.log("jhjjhjh");
		var valpo=this.src;
		document.getElementById("popupdiv").style.display="block";
		var imgtag=$('<h4 class="Close">x</h4><img src="' + valpo + '" ></img>');
		$("#popupdiv").html(imgtag);
		$('h4.Close').click(function(e) { 
			$("#popupdiv").hide();
			});
	});
	var SearchKey;
	$('#searchData').click(function(e) {
		SearchKey=$('#SearchKey').val();
		//console.log(SearchKey);
		if(SearchKey){
			searchDtaaAjax();
		}
		
	});
	//call search function
	function searchDtaaAjax(){
	var SearchKeyData={'SearchKey':SearchKey};
			$.ajax({
				type: "POST",
				url: "search.php?go="+SearchKeyData,
				data:SearchKeyData,
				success: function(data){
					console.log(data);
					 $("#offers").html(data);
				}
			});
	}
	//onclick of signin button open input form
	$('.SignInBtn').click(function(e) {
			
	//console.log("click sign in");
	var sessionCheck="<?php echo $login_session ;?>";
	//console.log(sessionCheck);
		if(!sessionCheck){
			
				//$("#signINbutton").show();
				var swf2 = document.getElementById("signINbutton");
				if(swf2.style.display === "none"){
					swf2.style.display = "block";
				}else {
					swf2.style.display = "none";
				}
			
			//console.log("session not logedin");
		}
		else{
			
			$("#SignInBtn").hide();
		
		}
	});
	//on different icon clik
	var favId;
	var userId;
	var pinId;
	var imgAtrr;
	var userLoginId;
	//var rminderStr;
		$('div.OverlayOuter img').click(function(e) {
			imgAtrr=this.name;
				var sessionCheck="<?php echo $login_session ;?>";
				userLoginId="<?php echo $userLoginId ;?>";
	
		//check user logedin or not 
		
			if(imgAtrr=="fav"){
				favId = $(this).attr('id');
				//$('#inputDiv_'+favId).show();
			}
			if(imgAtrr=="pin"){
				var imgEveId = $(this).attr('id');
				var arrStr = imgEveId.split(/[@]/);
					pinId=parseInt(arrStr[1]);
					favId=parseInt(arrStr[0]);
				
			}
			//onclick of claender
			if(imgAtrr=="reminder"){
				var reminderId = $(this).attr('id');
				var arrReminder = reminderId.split(/[@]/);
					favId=parseInt(arrReminder[1]);
					//rminderStr=parseInt(arrReminder[0]);		
			}
		if(!sessionCheck){
			//console.log( favId);
				var swf2 = document.getElementById("inputDiv_"+favId);
				//console.log(swf2);
				if(swf2.style.display === "none"){
					swf2.style.display = "block";
				}else {
					swf2.style.display = "none";
				}
			//$('#inputDiv_'+favId).show();
			$('.SubmitBtn').click(function() {
				userId=$('#userid_'+favId).val();
				$('#inputDiv_'+favId).hide();
				//function to check with database user exits in table or not
				if(userLoginId){
					if(imgAtrr=="fav"){
						sendUserData();
					}
					if(imgAtrr=="pin"){
						sendUserPinData();
					}
					if(imgAtrr=="reminder"){
						userReminderData();
					}
				}else{
					console.log("user id not found");
				}
			});
		}else{
			
			$('#inputDiv_'+favId).hide();
			if(imgAtrr=="fav"){
				sendUserData();
			}
			if(imgAtrr=="pin"){
				sendUserPinData();
			}
			if(imgAtrr=="reminder"){
				userReminderData();
			}
		}
	
			//uniSubId=$(this).siblings('img:first').attr('id');
			/*var tto=favId.indexOf("_")+1;
			var subID=favId.indexOf(".");
			var subname =favId.slice(subID);
			*/
			
		});
		
		//if mail id popup enable then send data into database
		
		//user save fav offers
		function sendUserData(){
		
		var favPindata={'favid':favId,'userid':userLoginId};
			$.ajax({
				type: "POST",
				url: "displayimg.php?ids=" +favId,
				data:favPindata,
				success: function(result){
					//console.log(result);
				}
			});
		}
		//user pinned offers
		function sendUserPinData(){
			var pindata={'pinid':pinId,'pinuserid':userLoginId};
			$.ajax({
				type: "POST",
				url: "displayimg.php?pinid=" +pinId,
				data:pindata,
				success: function(data){
					console.log(data);
				}
				
			});
		}
		function userReminderData(){
		//console.log(favId);
		//console.log(userLoginId);
			var userReminderOffer={'reminderData':favId,'userLoginId':userLoginId};
			$.ajax({
				type: "POST",
				url: "displayimg.php?ID=" +favId,
				data:userReminderOffer,
				success: function(data){
					//console.log(data);
				}
			});
		}
		
		
	</script>
	
  </body>
</html>