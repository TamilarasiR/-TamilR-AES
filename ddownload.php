<?php include "loginverifier.php";


$id=$_REQUEST["id"];



include "dbaseopen.php";
$query1 = "SELECT * FROM ipc_files WHERE fileid='$id'  and download='0'";
$result12=mysql_query($query1) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
if($row2=mysql_fetch_array($result12))
{
	

$filename = $row2[6];

if (!file_exists($filename)) {

   header("Location: fileview.php?id=$id&R=3");
} 
else
{

		$url=$row2[6];
		header("Location:".$url);
		exit();
	
	}
}
else
{
header("Location: fileview.php?id=$id&R=1");
}
?>