
  <?php 
  include 'displayimg.php';
  
  ?>
    <?php include 'header.php';?>
    <div class="container CategoryBorder" style="background:none">
    	<div class="row">
		 <?php
		  while($row=mysqli_fetch_array($categoryName)){
          echo '<div class="col-xs-1 col-sm-1 CtegoryList Jewellery iconf" id="' . $row['catid'] . '">';
		  echo '<img   src="data:image/png;base64,'.base64_encode( $row['catimage'] ).'"  width="18" height="26"/>';
          echo	'<span>' . $row['catname'].'</span>';
         echo '</div>';
          }
		  ?>
       </div>
    </div>
    <div class="container">
    <div class="row">
    	<div class="col-sm-12 col-xs-12 CategoryBorder">
        	<img src="images/category_Icon.png" style="background: #FF7F7F;"width="20" height="18" alt=""/>
			<span class="" style="background: #fff;color: grey;">Category</span>
        </div>
    </div>
    </div>
    <div class="container ContainerHeight">
	<div class="GridOuter">
    	<div class="row" id="productSpec">
					
			
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
		$('div.iconf').click(function() {
			var favId = $(this).attr('id');
			
			$.ajax({
				type: "POST",
				url: "displayimg.php?id=" +favId,
				success: function(data){
					$("#productSpec").html("");
					var divImg= $("#productSpec").prepend(data);
					
				}
			});
			
		});
	</script>
  </body>
</html>