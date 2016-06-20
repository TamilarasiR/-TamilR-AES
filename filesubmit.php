<?php include "loginverifier.php";
include 'enc.php';
    $blockSize = 192;
    $inputKey = "My text to encrypt";
	
include "dbaseopen.php";
$title=$_REQUEST["title"];
$name=$_REQUEST["name"];
$mytype=$_REQUEST["type"];
$description=$_REQUEST["description"];
$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileSize = $_FILES['file']['size']; 
$fileSizefull = round(filesize($_FILES['file'] ['tmp_name'])/1024,1) ;
$filesizetext=$fileSizefull."Kb";

if($mytype==1)
	
	{

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "txt", "TXT", "doc", "DOC", "docx", "DOCX");
$fileName = $_FILES['file']['name'];
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
    $enc = $aes->encrypt();
   

    if (file_exists("Uploads/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $aes = new AES($fileData, $inputKey, $blockSize);
    $encData = $aes->encrypt();
    file_put_contents("Uploads/" . $_FILES["file"]["name"], $encData);
    unlink($_FILES["file"]["tmp_name"]);
    $filelink= "Uploads/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }


        $dateval=date("y-m-d H:i:s");
		$query2="select max(id) from ipc_files";
		$result2=mysql_query($query2);
		$row2=mysql_fetch_row($result2);
		$temp=$row2[0]+1;
		$id = '111'.$temp;
		

	
 
 
 		$cry=$pieces[0].$filesizetext.$id;
		$cry=  md5($cry);

	
		
		
		$query3="INSERT INTO ipc_files(id,fileid,userid,filename,filedesc,cry,fileurl,filedate,filesize,validate,model,download,status)VALUES('$temp','$id','$name','$title','$description','$cry','$filelink','$dateval','$filesizetext','0','0','0','$mytype')";
		$result3=mysql_query($query3)or  die ('<p>Error Code : 117 <b>Pelase Report Error</b><br />'.mysql_error().'<a href="/errorrep">report</a></p>');



        	
		header("Location: fileupload.php?R=5");
		exit();

	include "dbaseclose.php";
}

elseif($mytype==2)
{
	

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "txt", "TXT", "doc", "DOC", "docx", "DOCX");
$fileName = $_FILES['file']['name'];
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
    $enc = $aes->encrypt();
   

    if (file_exists("Uploads/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $aes = new AES($fileData, $inputKey, $blockSize);
    $encData = $aes->encrypt();
	
	
	$aess = new AES($encData, $inputKey, $blockSize);
    $encDatas = $aess->encrypt();
	
	
    file_put_contents("Uploads/" . $_FILES["file"]["name"], $encDatas);
    unlink($_FILES["file"]["tmp_name"]);
    $filelink= "Uploads/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }


        $dateval=date("y-m-d H:i:s");
		$query2="select max(id) from ipc_files";
		$result2=mysql_query($query2);
		$row2=mysql_fetch_row($result2);
		$temp=$row2[0]+1;
		$id = '111'.$temp;
		

	
 
 
 		$cry=$pieces[0].$filesizetext.$id;
		$cry=  md5($cry);

	
		
		
		$query3="INSERT INTO ipc_files(id,fileid,userid,filename,filedesc,cry,fileurl,filedate,filesize,validate,model,download,status)VALUES('$temp','$id','$name','$title','$description','$cry','$filelink','$dateval','$filesizetext','0','0','0','$mytype')";
		$result3=mysql_query($query3)or  die ('<p>Error Code : 117 <b>Pelase Report Error</b><br />'.mysql_error().'<a href="/errorrep">report</a></p>');



        	
		header("Location: fileupload.php?R=5");
		exit();

	include "dbaseclose.php";
}

else{
	
	
$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "txt", "TXT", "doc", "DOC", "docx", "DOCX");
$fileName = $_FILES['file']['name'];
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
    $enc = $aes->encrypt();
   

    if (file_exists("Uploads/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $aes = new AES($fileData, $inputKey, $blockSize);
    $encData = $aes->encrypt();
	
	
	$aess = new AES($encData, $inputKey, $blockSize);
    $encDatas = $aess->encrypt();
	
	
    file_put_contents("Uploads/" . $_FILES["file"]["name"], $encDatas);
    unlink($_FILES["file"]["tmp_name"]);
    $filelink= "Uploads/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
  
        $dateval=date("y-m-d H:i:s");
		$query2="select max(id) from ipc_files";
		$result2=mysql_query($query2);
		$row2=mysql_fetch_row($result2);
		$temp=$row2[0]+1;
		$id = '111'.$temp;
		
  
  
$fileContents = file_get_contents($filelink);

$length=strlen($fileContents);

$halflength= $length / 2 ;

$arr = str_split($fileContents, $halflength);

$first=$arr[0];
$second=$arr[1];

$myfile1 = fopen("Uploads/$id-1.txt", "w") or die("Unable to open file!");
fwrite($myfile1, $first);
fclose($myfile1);

$myfile2 = fopen("Uploads/$id-2.txt", "w") or die("Unable to open file!");
fwrite($myfile2, $second);
fclose($myfile2);

$myfile3 = fopen($filelink, "w") or die("Unable to open file!");
fwrite($myfile3, '');
fclose($myfile3);

	
 
 
 		$cry=$pieces[0].$filesizetext.$id;
		$cry=  md5($cry);

	
		
		
		$query3="INSERT INTO ipc_files(id,fileid,userid,filename,filedesc,cry,fileurl,filedate,filesize,validate,model,download,status)VALUES('$temp','$id','$name','$title','$description','$cry','$filelink','$dateval','$filesizetext','0','0','0','$mytype')";
		$result3=mysql_query($query3)or  die ('<p>Error Code : 117 <b>Pelase Report Error</b><br />'.mysql_error().'<a href="/errorrep">report</a></p>');



        	
		header("Location: fileupload.php?R=5");
		exit();

	include "dbaseclose.php";
	
}

?>