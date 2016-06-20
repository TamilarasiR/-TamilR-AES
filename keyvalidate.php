<?php session_start();

$key=$_REQUEST["key"];
$key=stripslashes($key);

$userid="";

	if(isset($_SESSION['UserId']))
	{
		$userid=$_SESSION['UserId'];
	}

if($key=="")
{
	header("Location: key.php?R=1");
	exit();
}
else
{
	include "dbaseopen.php";
	$query1="select * from ipc_users where userid='$userid' and mobileno='$key'";
	$result1=mysql_query($query1);
	if(!($row1=mysql_fetch_row($result1)))
	{
		header("Location: login.php?R=3");
		exit();
	}
	else
	{
		
		$_SESSION['key']=$row1[3];

		if(($row1[7]==2)||($row1[7]==1))

		{
		
		
			header("Location: index.php");
			exit();	
		}
		else
		{
			header("Location: logout.php");
			exit();	
		}	
	}	
	include "dbaseclose.php";
}
?>
