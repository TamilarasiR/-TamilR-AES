<?php include "loginverifier.php";
 include "show.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include "title.php";?></title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
 
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  


<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
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
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
		
			<div class="nav-divider">&nbsp;</div>
			<a href="logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="index.php"><b>Home</b></a></li></ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="fileupload.php"><b>File Upload</b></a></li></ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="filedetails.php"><b>File Detail</b></a>
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="current"><li><a href="decrypter.php"><b>Decrypt</b></a>
		</li>
		</ul>
		
	
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>File Decrypt</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
<?php

$id=$_REQUEST['id'];
$username=$_SESSION['UserName'];

include "dbaseopen.php";
	$query5="select * from ipc_files where fileid='$id' and userid='$username'";
	   $result5=mysql_query($query5);
	   $row5=mysql_fetch_array($result5);
	   
	   
	$pieces = explode(".", $row5['fileurl']);  
	
$finename  = explode("/", $row5['fileurl']);  
	   
	  
      if ($row5['status'] == 1)
		   {
		   $rowColor="Low";
		   }
		   elseif($row5['status'] == 2)
		   {
           $rowColor = "Medium";
		   	}	
			else
		   {
           $rowColor = "Strong";
		   	}	


	        if ($row5['download'] == 0)
		   {
		   $dowColor="Blocked";
		   }
		   else 
		   {
           $dowColor = "Allowed";
		   	}	



	   		
include "dbaseclose.php";

?>			

<?php
$retval=0;
if(isset($_REQUEST['R']))
{
	$retval=$_REQUEST['R'];
}
if($retval==1)
{
  				echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>Its not a valic key for this file .</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";

}
elseif($retval==2)
{
  				echo "<div id='message-red'><table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td class='red-left'>Error. <a href=''>DATA INTEGRITY PROOFS ALLERT ! YOUR FILE  ACCESSED  BY CLOUD ! .</a></td><td class='red-right'><a class='close-red'><img src='images/table/icon_close_red.gif'   alt='' /></a></td></tr></table></div>";

}

?>
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Choose Decrypted file:</th>
			<td><?php
include 'enc.php';


if(isset($_POST['submit']))
{
    $blockSize = 192;
    $inputKey = "My text to encrypt";



$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "txt", "TXT", "doc", "DOC", "docx", "DOCX");
$fileName = $_FILES['file']['name'];
$mytype=$_REQUEST["type"];
$extension = substr($fileName, strrpos($fileName, '.') + 1); // getting the info about the image to get its extension

if(in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
     echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    $aes = new AES($_FILES["file"]["tmp_name"], $inputKey, $blockSize);
    $enc = $aes->decrypt();
 /*   echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
*/
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
		  
	if($mytype==1)  
	{ 
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $aes = new AES($fileData, $inputKey, $blockSize);
    $encData = $aes->decrypt();	

	
	
    file_put_contents("enc/" . $_FILES["file"]["name"], $encData);
    unlink($_FILES["file"]["tmp_name"]);

    $url="enc/" . $_FILES["file"]["name"];

?><div>
 <h3><a href="<?php echo $url;?>" target="_blank" >Click to Download</a></h3>
<div>

<?php ;
}	 

if($mytype==2)  
	{ 
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $aes = new AES($fileData, $inputKey, $blockSize);
    $encData = $aes->decrypt();	

	$aess = new AES($encData, $inputKey, $blockSize);
    $encDatas = $aess->decrypt();	
	
    file_put_contents("enc/" . $_FILES["file"]["name"], $encDatas);
    unlink($_FILES["file"]["tmp_name"]);

    $url="enc/" . $_FILES["file"]["name"];

?><div>
 <h3><a href="<?php echo $url;?>" target="_blank" >Click to Download</a></h3>
<div>

<?php ;
}	 



      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
?>
<form method="post"  enctype="multipart/form-data" >




<input type="file" name="file" id="file"  class="file_1"/> 

<br /><br />


<select name="type" class="inp-form" placeholder="Security Type">
							<option value="1" selected="selected">Low</option>
							<option value="2">Medium</option>	
                            <option value="3">Strong</option>									
							</select>	
	<br /><br />
	
<input type="submit" name="submit" value="Submit"  class="form-submit" />
</form></td>
			<td></td>
		</tr>
		
	</table>

						
		
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	<?php include "title.php";?> </div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>