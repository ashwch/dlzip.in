<?php
session_start();
ob_start();
include_once("../includes/scripts/site_maintain.php");

if(isset($_GET['refid']) && is_numeric($_GET['refid']) && isset($_GET['ver']) )
	{
		 
		     
		     include_once("../includes/scripts/sqlconnection.php");
		     $ip=$_SERVER['REMOTE_ADDR'];
		     $ip_long=ip2long($ip);
		     $sid=(int)$_GET['refid'];
		     $r=mysqli_query($dbc,"SELECT soft_downloads,file_path,soft_name,soft_version from software_info where soft_id=$sid") OR trigger_error(mysqli_error($dbc));
			    $row=mysqli_fetch_array($r);
			    $old_down=(int)$row[0];
			    $down= $old_down+1;
		        $q="UPDATE software_info SET soft_downloads=$down where soft_id=$sid";		        
		        $r1=mysqli_query($dbc,$q);
		        
		        if(isset($_SESSION['ndr']))
		         {$uid=(int)$_SESSION['udr'];}
		        else $uid=14;
		        
		     $qc= "INSERT into user_downloads (user_uid,soft_id,user_ip)
                   values($uid,$sid,$ip_long)";
             $rc=mysqli_query($dbc,$qc) OR trigger_error('Query error'.mysqli_error($dbc));           	
             	           
		     $file_name=$row[2].$row[3].'.zip'; 
		   
		   //$split=preg_split('/(downloads\/)/', $row[1]);
              if(isset($_SESSION['ndr']))
		{sleep(5);}
	       else
	       sleep(15); 	
	    //header ("X-Sendfile:".$row[1])or trigger_error(mysqli_error()); 
		header("Content-Type:application/octet-stream\n");
	     header("Content-Disposition:attachment;filename=$file_name\n");
	     header("Content-Transfer-Encoding:binary\n");
	     
	        //header("Content-Length:$size\n");
        readfile("{$row[1]}");
       
         exit;
	      
    }
else{
	  $k=md5(rand());
	  $url=BASE_URL."/login.php?refid=".$k;
	  ob_end_clean();
	  header("Location:$url");
	  exit;
    }    
?>