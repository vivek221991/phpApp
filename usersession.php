<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pamphlet";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn,$dbname);
//session_start();// Starting Session
// Storing Session

if(isset($_SESSION['login_user'])){
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysqli_query($conn,"select * from userlogin where usermailid='$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
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