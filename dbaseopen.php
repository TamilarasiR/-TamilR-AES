<?php

include 'dbase_config.php';

$conn = mysql_connect($dbhost, $dbusername, $dbpassword) or die ('OOPS we are facing some error(code=100), please report to our Tech team <br /><a href="/error_report/"> Report Error</a>');

mysql_select_db($dbname);

?>
