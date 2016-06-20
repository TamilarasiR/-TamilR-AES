<?php include "loginverifiertpa.php";


$id=$_REQUEST["id"];

include "dbaseopen.php";
$query1 = "SELECT * FROM ipc_files WHERE fileid='$id'";
$result12=mysql_query($query1) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
if($row2=mysql_fetch_array($result12))
{

$value=$row2[12];

	if($value==0)
	{
	
$query="update ipc_files set status='1' where fileid='$id'";
$result=mysql_query($query) or die ('<p>Error Code : 117 <b>Pelase Report Error</b><br /><a href="/feedback/">report</a></p>');

		header("Location: fileviewtpa.php?id=$id&R=1");
		exit();
	}
	else
	{
	
$query="update ipc_files set status=0 where fileid='$id' ";
$result=mysql_query($query) or die ('<p>Error Code : 117 <b>Pelase Report Error</b><br /><a href="/feedback/">report</a></p>');

		header("Location: fileviewtpa.php?id=$id&R=1");
		exit();
	}

}
else
{
header("Location: fileverifytpa.php?id=$id&R=3");
}
?>