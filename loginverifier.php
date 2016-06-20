<?php session_start();
if(!(isset($_SESSION['UserName']))&&!(isset($_SESSION['key'])))
{
	header("Location: logout.php");
	exit();	
}
?>