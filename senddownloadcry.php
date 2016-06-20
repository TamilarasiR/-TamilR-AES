<?php include "loginverifiertpa.php";


$id=$_REQUEST["id"];

include "dbaseopen.php";
$query1 = "SELECT * FROM ipc_files WHERE fileid='$id'";
$result1=mysql_query($query1) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
if($row1=mysql_fetch_array($result1))
{

$user=$row1[2];
$cry=$row1[5];

$query2 = "SELECT * FROM ipc_users WHERE userid='$user'";
$result2=mysql_query($query2) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 

	if($row2=mysql_fetch_array($result2))
	{
	
	  $to =$row2[8];
	  
	  $query="update ipc_crypt set status='1' where fileid='$id'";
      $result=mysql_query($query) or die ('<p>Error Code : 117 <b>Pelase Report Error</b><br /><a href="/feedback/">report</a></p>');

	
	    require_once "Mail.php";
        $from = "secure.auditor@gmail.com";
        $subject = "DATA INTEGRITY PROOFS IN CLOUD STORAGE";
        $body ="DATA INTEGRITY PROOFS IN CLOUD STORAGE  SECRET KEY : "."$cry";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));

        $mail = $smtp->send($to, $headers, $body);              
		
header("Location: filedetailstpa.php?R=1");
	
	}
	else
	{
	

	}

}
else
{
header("Location: filedetailstpa.php?R=3");
}
?>