<?php session_start();

$userid=$_REQUEST["username"];
$password=$_REQUEST["password"];

$userid=stripslashes($userid);
$password=stripslashes($password);

$givenval=$userid.",".$password;

if($userid=="")
{
	header("Location: login.php?R=1");
	exit();
}
elseif($password=="")
{
	header("Location: login.php?R=2");
	exit();
}
elseif($userid=="admin")
{
	header("Location: adminlogin.php");
	exit();
}
elseif($userid!="adc")
{
	header("Location: login.php");
	exit();
}

else
{
	include "dbaseopen.php";
	$query1="select * from ipc_users where userid='$userid' and password='$password'";
	$result1=mysql_query($query1);
	if(!($row1=mysql_fetch_row($result1)))
	{
		header("Location: login.php?R=3");
		exit();
	}
	else
	{
		$_SESSION['UserId']=$userid;
		$_SESSION['Usertp']=$row1[1];
		$_SESSION['UserType']=$row1[7];
		if(($row1[7]==2)||($row1[7]==1))

		{
		
		

$dateval=date("y-m-d H:i:s");
$randum=rand();



		
        $query4="update ipc_users set mobileno='$randum',dateofjoin='$dateval' where userid='$userid' and password='$password'";
		$result4=mysql_query($query4)or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
		
	      
		
			header("Location: tpaindex.php");
			exit();	
		}
		else
		{
			header("Location: tpalogin.php");
			exit();	
		}	
	}	
	include "dbaseclose.php";
}
?>
