<?php session_start();
if(!(isset($_SESSION['Usertp'])))
{
	header("Location: logout.php");
	exit();	
}
?>