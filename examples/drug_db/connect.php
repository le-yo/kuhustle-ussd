<?php

$hostname = "localhost";
$username = "username";//root
$password = "password";//""
$connection =  mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db("drug_db");

//id,name,verification_code

?>
