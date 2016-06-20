<?php session_start();
if(!(isset($_SESSION['Usera'])))
{
	header("Location: logout.php");
	exit();	
}
?>