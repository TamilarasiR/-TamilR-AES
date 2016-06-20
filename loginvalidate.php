<?php session_start();

$userid=$_REQUEST["username"];
$password=$_REQUEST["password"];

$userid=stripslashes($userid);
$password=stripslashes($password);

$givenval=$userid.",".$password;


function random_string()
{
    $character_set_array = array();
$character_set_array[] = array('count' => 1, 'characters' => 'abcDEF!@$%#&*GHIJklmnopqrsTUVwxyz');
$character_set_array[] = array('count' => 1, 'characters' => '!@$%#&*0123456789');
$character_set_array[] = array('count' => 1, 'characters' => 'ABCDEF!@$%#&*WXYZ1234567890');
$character_set_array[] = array('count' => 1, 'characters' => 'abcdefGHIJKLMNOPQrstuvWXYZ');
$character_set_array[] = array('count' => 1, 'characters' => '0123456789!@$%#&*');
$character_set_array[] = array('count' => 1, 'characters' => 'abcdefGHI!@$%#&*JKLMNOPQRSTUvwxyz');


    $temp_array = array();
    foreach ($character_set_array as $character_set) {
        for ($i = 0; $i < $character_set['count']; $i++) {
            $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
        }
    }
    
    
    $temp_array = implode($temp_array);
    return $temp_array;
   
}

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
elseif($userid=="tpa")
{
	header("Location: tpalogin.php");
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
		$_SESSION['UserName']=$row1[1];
		$_SESSION['UserType']=$row1[7];
		if(($row1[7]==2)||($row1[7]==1))

		{
		
		

$dateval=date("y-m-d H:i:s");

$func = 'random_string';
$randum = $func();

		
        $query4="update ipc_users set mobileno='$randum',dateofjoin='$dateval' where userid='$userid' and password='$password'";
		$result4=mysql_query($query4)or die ('<p>Error code:105 <b>Please Report Error</b><br/><a href="/feedback">Report Error</a></p>'); 
		
		
		$query5="select * from ipc_users where userid='$userid' and password='$password'";
	   $result5=mysql_query($query5);
	   if($row5=mysql_fetch_row($result5))
		{
    $to =$row5[8];
    $key=$row5[3];
	$mobileNumber=$row5[9];

 }

 /*
$ip = getenv("REMOTE_ADDR");
$httpref = getenv ("HTTP_REFERER");
$httpagent = getenv ("HTTP_USER_AGENT");
        $from = "From : secure.auditor@gmail.com";
        $subject = "Data and Image Security in Public Cloud using Segmentation and Authentication";
        $message ="CSA Login Key "."$key";      	
		mail($to, $subject, $message, $from);*/
		
		

$message = "Key: $key \n 
Your Security key to login to your public cloud
";


//Your authentication key
$authKey = "54693AtlvGcHam566e6412";

//Multiple mobiles numbers separated by comma


//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "DISUME";

//Your message to send, Add URL encoding here.
//$message = urlencode("Test message");

//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="https://control.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);		
		
		
		
		

               
		
			header("Location: key.php");
			exit();	
		}
		else
		{
			header("Location: login.php");
			exit();	
		}	
	}	
	include "dbaseclose.php";
}
?>
