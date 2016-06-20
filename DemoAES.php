<?php
include 'AES.php';
$imputText = "My super smart aes key";
$imputKey = "encryptor key";
$blockSize = 256;
$aes = new AES($imputText, $imputKey, $blockSize);

$enc = $aes->encrypt();
$aes->setData($enc);
$dec=$aes->decrypt();
echo "After encryption: ".$enc."<br/>";
echo "After decryption: ".$dec."<br/>";
?>