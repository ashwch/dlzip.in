<?php function top_downloads()
 {
  require_once('sqlconnection.php');
  require_once('site_maintain.php');
  $q="SELECT soft_name,soft_version,soft_url from software_info ORDER BY soft_downloads DESC LIMIT 2";
  $r=mysqli_query($dbc,$q) OR trigger_error(mysqli_error($dbc));
  $row=mysqli_fetch_array($r);
  return $row;
  	
 }
 
?> 