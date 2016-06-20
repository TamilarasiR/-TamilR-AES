<?php  session_start();
$id= $_REQUEST['id'];
$password= $_REQUEST['password'];
$age=$_REQUEST['age'];
$gender=$_REQUEST['gender'];
$mob=$_REQUEST['mob'];
$email= $_REQUEST['email'];


include "dbaseopen.php";
$query1 = "SELECT userid FROM ipc_users WHERE userid='$id'";
$result12=mysql_query($query1) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
$result1 = mysql_num_rows($result12);


if($result1 == "1")
{ 
header ("Location: register.php?err=1");
exit();
}


if ($password== "")
{ 

header ("Location: register.php?R=2");
exit();
}
elseif ($age== "")
{ 

header ("Location: register.php?R=3");
exit();
}
elseif($gender=="")
{
header ("Location: register.php?R=4");
exit();
}
elseif($mob=="")
{
header ("Location: register.php?R=5");
exit();
}
elseif ($email== "")
{ 

header ("Location: register.php?R=7");
exit();
}
elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
{ 
header ("Location: register.php?R=8");
exit();
}

else
{
$result = mysql_query("SELECT * FROM ipc_users order by id");
$temp=0;
while($row = mysql_fetch_array($result))
{
if ($temp<$row['id'])
   $temp=$row['id'];
}
$temp=$temp+1;
$dateval=date("y-m-d H:i:s");
$passwords=  md5($password);

$query="INSERT INTO ipc_users(id,username,password,mobileno,dateofjoin,status,userid,desig,mailid,cell,gender,age)VALUES('$temp','$id','$password','','$dateval','1','$id','2','$email','$mob','$gender','$age')";
$result=mysql_query($query) or die ('<p>Error Code : 117 <b>Pelase Report Error</b><br /><a href="/feedback/">report</a></p>');

include 'dbaseclose.php';

header ("Location:login.php?R=6");
//header ("Location: /profile/?I=$UserssId&N=$fullName");
exit();

}



?>