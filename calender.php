<?php
//on click show div and retrive data from subcategory table by using calender table userloginid
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn,$dbname);
	
	//count claender remindr
	$count = 0;
 //$advsql = "SELECT * FROM calendar";
 $diff_array = array();
 $i=0;
 //select calender data basis of users reminder set
 if($userLoginId==''){
	$count = 0;
 }else{
	 //$diff_array['count'] = $count;
	 $reminderdata = mysqli_query($conn,"SELECT b.subcatname,b.subcatimage, b.expireDate,a.exp_date,a.adv_name,a.calId FROM
 calendar a, subcategory b WHERE b.expireDate=a.exp_date and a.adv_name=$userLoginId ");
 
  
 //if ($result->num_rows > 0) 
 //{
     while($row=mysqli_fetch_array($reminderdata)) 
     {
   $exp_date = $row['exp_date'];
   
   $curr_date = date("Y-m-d");
   
   $date1 = new DateTime($exp_date);
   $date2 = new DateTime($curr_date);

   $diff = $date2->diff($date1)->format("%a");
   
   if( $diff == 1)
   {   
    $count++; 
    
    $diff_array[$row['adv_name']] = $row['calId'];
    $i++;
   }

  }
   $diff_array['count'] = $count;
  }
   
 
 // echo $count;
 // echo json_encode($diff_array);
  
 // echo '<pre>'; print_R($diff_array);
 //}
 
 // $surveysql = "SELECT COUNT(*) as AdvCount,GROUP_CONCAT(adv_id) as AdsId FROM advertisement WHERE DATEDIFF('2016-02-07','2016-02-05') <=2";
 
?>