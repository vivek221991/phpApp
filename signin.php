<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn,$dbname);
	session_start(); // Starting Session
//	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['mailid']) ) {
		$error = "Username or Password is invalid";
		}
		else
		{
			// Define $username and $password
			$mailid=$_POST['mailid'];
			//echo $mailid;
			//check user exitsted or not
			$usermailId = mysqli_query($conn,"select * from userlogin where usermailid='$mailid'");
			$rows = mysqli_num_rows($usermailId);
				//$userLoginId=$row['userid'];
			if ($rows == 1) {
				
				$_SESSION['login_user']=$mailid; // Initializing Session
				header("location: pamphlet.php"); // Redirecting To Other Page
			} else {
				//$error = "mailId is invalid";
				$userinfo=mysqli_query($conn,"insert into  userlogin values('','$mailid')");
				$_SESSION['login_user']=$mailid;
				header("location: pamphlet.php");
			}	
			
		}
}	

?>