<?php 
define('DB_HOST','localhost');
define('DB_PWD','@9997829951#');
define('DB_USER','root');
define('DB_NAME','montyscript');

$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) OR die('couldn\'t connect' . mysqli_connect_error());
//qecho $dbc;
?>