
<?php include 'signin.php';?>
<?php include 'search.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/pamphlet.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	var caldiv;	
	function showcaldiv(){
		//alert("cliked");
		//var shocaldiv=document.getElementById("calpopup");
		console.log("shocaldiv");
		calpopupdiv();
		
	}
	
	//call search function
	function calpopupdiv(){
	//var SearchKeyData={'SearchKey':SearchKey};
			$.ajax({
				type: "POST",
				url: "reminderInfo.php",
			//	data:SearchKeyData,
				success: function(data){
					console.log(data);
					caldiv= $("#calpopup").html(data);
				}
			});
			caldivshow();
	}
	function caldivshow(){
	console.log("come");
	var shocaldiv=document.getElementById("calpopup");
	console.log(shocaldiv);
	console.log(caldiv);
	
				if(shocaldiv.style.display === "none"){
					shocaldiv.style.display = "block";
				}else {
					shocaldiv.style.display = "none";
				}
	}
</script>

		
  </head>
 
  <body>
  <?php 
	include 'usersession.php';

  ?>
    <nav class="navbar navbar-inverse navbar-fixed-top NavBgRemove">	  
	     <div class="container MenuBG">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
 <a href="pamphlet.php" class="navbar-brand LogoPadding"><img src="images/Logo.png" width="118" height="35" alt=""/></a>
 </div>
        <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" style="height: 1px;">
			
          <ul class="nav navbar-nav SearchTextBox">
            <li class="SearchTextBox01">
			
				<input type="text" value="" name="searchItem" class="SearchKey" id="SearchKey" placeholder="Spot The Offers" required />
				<input  type="submit" name="search" id="searchData" value="Search" class="SearchBtn" />
			
			</li>
            <li class="HeaderIcons">
				<?php if($login_session=='') { ?>
					<input type="button" value="Sign in" class="SignInBtn" id="SignInBtn"/>
				<?php } else { ?>
					<span class="EmailID"><?php echo $login_session; ?></span>
				<?php } ?>
					<form action="" method="post" id="signINbutton"  style="display: none;" >
					<div class="SigninPopup">
						<input type="text" name="mailid" placeholder="Please Enter E-mail ID" required />
						<input name="submit" type="submit" value=" Login " class="SubmitBtn">
					</div>	
					</form>
				
			</li> 
            
            <li class="HeaderIcons hvr-sweep-to-bottom" style="position: relative; padding: 16px 10px;" id="lical" onclick="showcaldiv()">
             <img src="images/reminder_Icon.png" width="20" height="19" alt=""/>
                <span style="background-color: #333333; color: #ffffff; padding: 0px 0px; font-size: 11px; position: absolute; top: 7px; right: -2px; 
                letter-spacing: 2px; padding-left: 3px;"><?php include 'calender.php'; echo $count ?></span>
            </li>
            <li class="HeaderIcons hvr-sweep-to-bottom"><a href="pinned.php"><img src="images/pin_Icon.png" width="12" height="18" alt=""/></a></li>
            <li class="HeaderIcons hvr-sweep-to-bottom" id="favList"><a  href="userfav.php"><img src="images/fav_Icon.png" width="20" height="17" alt=""/></a></li>
			
			
			<li class="HeaderIcons hvr-sweep-to-bottom"><a href="category.php" ><img src="images/category_Icon.png" width="22" height="19" alt=""/></a></li>
          </ul>
        </div><!--/.nav-collapse -->
		<div class="IconsBG">
			<img src="images/icons_BG.png" width="107" height="604" alt=""/>
		</div>
		<div class="IconsBG IconsBG_1">
			<img src="images/icons_BG.png" width="107" height="604" alt=""/>
		</div>
      </div> </nav>
	  
	<div class="ReminderOuter" id="calpopup" style="display:none;"></div>
 