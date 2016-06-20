<?php

/*
$fileContents = file_get_contents('enc/name.txt');

$length=strlen($fileContents);

$halflength= $length / 2 ;

$arr = str_split($fileContents, $halflength);

$first=$arr[0];
$second=$arr[1];

$myfile1 = fopen("enc/1.txt", "w") or die("Unable to open file!");
fwrite($myfile1, $first);
fclose($myfile1);

$myfile2 = fopen("enc/2.txt", "w") or die("Unable to open file!");
fwrite($myfile2, $second);
fclose($myfile2);
*/


$myfile1 = fopen("enc/1.txt", "r") or die("Unable to open file!");
$filesuper1=fread($myfile1,filesize("enc/1.txt"));
fclose($myfile1);

$myfile2 = fopen("enc/2.txt", "r") or die("Unable to open file!");
$filesuper2=fread($myfile2,filesize("enc/2.txt"));
fclose($myfile2);

$filesuper=$filesuper1.$filesuper2 ;


echo $filesuper;

?>