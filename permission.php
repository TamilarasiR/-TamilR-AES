<?php session_start();
include "dbaseopen.php";

function checkUpload()
{
	$userid="";
	if(isset($_SESSION['UserId']))
	{
		$userid=$_SESSION['UserId'];
	}
	if($userid!="")
	{
		$sqlstring="select * from ipc_permission where usertype in(select desig from ipc_users where userid='$userid')";
		$result1=mysql_query($sqlstring);
		if($row1=mysql_fetch_row($result1))
		{
			if($row1[2]==0 || $row1[2]=="")
			{
				header("Location: logout.php");
				exit();	
			}
		}
		else
		{
			header("Location: logout.php");
			exit();	
		}
	}
	else
	{
		$sqlstring="select * from ipc_permission where pertype='guest'";
		$result1=mysql_query($sqlstring);
		if($row1=mysql_fetch_row($result1))
		{
			if($row1[2]==0)
			{
				header("Location: login.php?R=5");
				exit();	
			}
		}
	}
}
include "dbaseopen.php";
?>
