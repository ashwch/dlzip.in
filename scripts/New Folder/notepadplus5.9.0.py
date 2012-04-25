<?php
include_once("../../includes/scripts/site_maintain.py");
session_start();

if(isset($_GET['refid']) && is_numeric($_GET['refid']) && isset($_SESSION['ndr']) && $_SESSION['adr']==md5($_SERVER['HTTP_USER_AGENT']) )
	{
		 $size=filesize("../../downloads/ptools/npp.5.9.zip");
		     
		     include_once("../../includes/scripts/sqlconnection.py");
		     $sid=(int)$_GET['refid'];
		     $r=mysqli_query($dbc,"SELECT soft_downloads from software_info where soft_id=$sid") OR trigger_error(mysqli_error($dbc));
			    $row=mysqli_fetch_array($r);
			    $old_down=(int)$row[0];
			    $down= $old_down+1;
		        $q="UPDATE software_info SET soft_downloads=$down where soft_id=$sid";		        
		        $r1=mysqli_query($dbc,$q);
		          $uid=(int)$_SESSION['udr'];
		     $qc= "INSERT into user_downloads (user_uid,soft_id)
                   values($uid,$sid)";
             $rc=mysqli_query($dbc,$qc) OR trigger_error('Query error'.mysqli_error($dbc));     
		        
		      
		        
		 sleep(10);
	     header("Content-Type:application/octet-stream\n");
	     header("Content-Disposition:attachment;filename=npp.5.9.zip\n");
	     header("Content-Transfer-Encoding:binary\n");
	     //header("Content-Length:$size\n");
         readfile("../../downloads/ptools/npp.5.9.zip");
	      
    }
else{
	  $k=md5(rand());
	  $url="http://localhost/login.py?refid=".$k;
	  ob_end_clean();
	  header("Location:$url");
	  exit;
    }    
?>