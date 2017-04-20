<?php
	session_start();
	if(!isset($_SESSION['login'])) 
	{
		
	echo "<script type='text/javascript'>
			alert('login first!');
			window.location.href='index.php';
			</script>";
	}
	else
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "spl";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
		}
	$name1=$_SESSION['login'];
	
	$title=$_POST['submit'];

	$sql = "SELECT applied_by FROM coming_event where coming_event_id=$title";
	 
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
	$already=$row["applied_by"];
	$new=$already.",".$_SESSION['login'];
	$sql = "Update coming_event set applied_by="."'".$new."'"." where coming_event_id=$title";
	$result = mysqli_query($conn, $sql);
	
	}
	echo "<script type='text/javascript'>
			alert('Registration Done!');
			window.location.href='index.php';
			</script>";
}	
?>