<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include "title.php";?></title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 

<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
<h1><?php include "title.php";?>&nbsp;</h1>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>

 
 <div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
	
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="current"><li><a href="adminlogin.php"><b>ADMIN</b></a></li></ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul  class="select"><li><a href="login.php"><b>USER</b></a>
		</li>
		</ul>
		
		
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>

<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<!-- end logo -->
	
	<div class="clear"></div>
	<br />

	<div style="height: 55px"> <h1 style="padding-top: 20px; padding-left: 30px;"> ADMIN LOGIN</h1></div>
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	
	<!--  start login-inner -->
	<div id="login-inner">
	
	<form action="adminvalidate.php" method="post">

<?php
$retval=0;
$fullval="";
if(isset($_REQUEST['R']))
{
	$retval=$_REQUEST['R'];
}
if(isset($_REQUEST['fullval']))
{
	$fullval=$_REQUEST['fullval'];
}
if($fullval=="")
{
	$uid="";
	$pass="";
}
else
{
	$arr=explode(",",$fullval);
	$uid=$arr[0];
	$pass=$arr[1];
}
if($retval==1)
{
  
  				echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>Please Fill Userid Field.</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";

	

}
elseif($retval==2)
{

	
				echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>Please Fill password Field .</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";

	
}
elseif($retval==3)
{

			echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>Your Login id or password is wrong .</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";

}
elseif($retval==4)
{
		echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>Please Register and Create your Account .</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";

}
elseif($retval==5)
{
	echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>Please try again to Log In .</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";
}
elseif($retval==6)
{
	echo "<div id='message-green'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='green-left'>User registered 	successful<a href=''> Llease Log In.</a></td><td class='green-right'><a class='close-green'><img src='images/table/icon_close_green.gif'   alt='' /></a></td></tr></table></div>";
}

else
{
}
?>

		<table border="0" cellpadding="0" cellspacing="0" style="height: 159px">
		<tr>
			<th>Username</th>
			<td><input type="text"  value="username" name="username" class="login-inp"  onfocus="this.value=''" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="************"  name="password"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  value="" /></td>
		</tr>
		</table>
		
		</form>
	</div>
 	<!--  end login-inner -->
	<div class="clear">
	</div>
&nbsp;</div>
 <!--  end loginbox -->
 

</div>
<!-- End: login-holder -->
</body>
</html>