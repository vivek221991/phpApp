<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	mysql_select_db($dbname);
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
			$usermailId = mysql_query("select * from userlogin where usermailid='$mailid'");
			$rows = mysql_num_rows($usermailId);
				//$userLoginId=$row['userid'];
			if ($rows == 1) {
				
				$_SESSION['login_user']=$mailid; // Initializing Session
				header("location: pamphlet.php"); // Redirecting To Other Page
			} else {
				//$error = "mailId is invalid";
				$userinfo=mysql_query("insert into  userlogin values('','$mailid')");
				$_SESSION['login_user']=$mailid;
				header("location: pamphlet.php");
			}	
			
		}
}	

?>