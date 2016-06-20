<?php include "loginverifiera.php";

include "dbaseopen.php";

$id=$_REQUEST["id"];
$owner=$_REQUEST["owner"];
$file=$_REQUEST["file"];
$detail=$_REQUEST['detail'];

$query2 = "SELECT * FROM ipc_users WHERE userid='$owner'";
$result2=mysql_query($query2) or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 

	if($row2=mysql_fetch_array($result2))
	{
	
	  $to =$row2[8];
	  
	  $query="update ipc_files set model='2' where fileid='$id'";
      $result=mysql_query($query) or die ('<p>Error Code : 117 <b>Pelase Report Error</b><br /><a href="/feedback/">report</a></p>');

	
	    require_once "Mail.php";
        $from = "secure.auditor@gmail.com";
        $subject = "OWNER : DATA INTEGRITY PROOFS IN CLOUD STORAGE";
        $body ="Owner :"."$owner FileName :"."$file"."$detail";
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
		
header("Location: warning.php?R=1");

include "dbaseclose.php";	
	}
	else
	{
	

	}
?>