<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	mysql_select_db($dbname);
//session_start();// Starting Session
// Storing Session

if(isset($_SESSION['login_user'])){
	$user_check=$_SESSION['login_user'];
	//echo $user_check;
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select * from userlogin where usermailid='$user_check'");
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['usermailid'];
	$userLoginId=$row['userid'];
}else{
	$login_session ='';
	$userLoginId='';
}

if(!isset($login_session)){
//mysql_close($connection); // Closing Connection
//header('Location: index.php'); // Redirecting To Home Page
}

?>