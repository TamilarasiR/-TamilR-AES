<?php
include 'enc.php';


if(isset($_POST['submit']))
{
    $blockSize = 192;
    $inputKey = "My text to encrypt";



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
    $enc = $aes->decrypt();
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $aes = new AES($fileData, $inputKey, $blockSize);
    $encData = $aes->decrypt();
	
	
	
	$aess = new AES($encData, $inputKey, $blockSize);
    $encDatas = $aess->decrypt();
	
	
	
    file_put_contents("enc/" . $_FILES["file"]["name"], $encDatas);
    unlink($_FILES["file"]["tmp_name"]);
    echo "Stored in: " . "enc/" . $_FILES["file"]["name"];
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

<label for="file"><span>Filename:</span></label>

<input type="file" name="file" id="file" /> 

<br />
<input type="submit" name="submit" value="Submit" />
</form>