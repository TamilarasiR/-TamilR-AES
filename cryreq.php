<?php include "loginverifier.php";


$id=$_REQUEST["id"];
$username=$_SESSION['UserName'];


include "dbaseopen.php";
$query1 = "SELECT * FROM ipc_files WHERE fileid='$id' and userid='$username'";
$result12=mysql_query($query1) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
if($row2=mysql_fetch_array($result12))
{

$result = mysql_query("SELECT * FROM ipc_crypt order by id");
$temp=0;
while($row = mysql_fetch_array($result))
{
if ($temp<$row['id'])
   $temp=$row['id'];
}
$temp=$temp+1;
	
$query="INSERT INTO ipc_crypt(id,fileid,userid,status)VALUES('$temp','$id','$username','0')";
$result=mysql_query($query) or die ('<p>Error Code : 117 <b>Pelase Report Error</b><br /><a href="/feedback/">report</a></p>');

		header("Location: filedetails.php?R=1");
		exit();

}
else
{
header("Location: filedetails.php?R=2");
}
?>