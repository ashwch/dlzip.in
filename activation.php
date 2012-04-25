<?php
session_start();

include('includes/scripts/site_maintain.php');
include('includes/scripts/sqlconnection.php');
if(empty($_SESSION['ndr']))
{
		$page_title="Account Activation";
		include('head.php');
		
			
		if(!empty($_GET['activid']) && !empty($_GET['user']))
		
		{   
			$splituser=preg_split('/(user\/)/', $_GET['user']);			
			//echo $splituser[0];
			//echo "<br />";
			$split=preg_split('/(avtivid\/)/', $_GET['activid']);
 			//echo $split[0];
 			echo "<br />";
 			$q="SELECT user_first_name, user_uid, user_email_id,activation
			FROM user_dbase
			WHERE activation='$split[0]'
			AND user_first_name='$splituser[0]'";
  	    $r=mysqli_query($dbc,$q) OR trigger_error("Query 1:".mysqli_error($dbc));
  	    
  	    if(mysqli_affected_rows($dbc)==1)
  	    {
  	    $q1="UPDATE user_dbase SET activation='1' where activation='$split[0]' and user_first_name='$splituser[0]'";
        $r1=mysqli_query($dbc,$q1);
  	    echo "Your account has been activated Succesfully, You can now LOGIN and start downloading";	
  	    }
  	    else
  	    echo "Incorrect Activation id or user";	
		}
		
		else{
					$url=BASE_URL;
				header("Location:$url");
					            exit;
            }
}
else{
	$url=BASE_URL;
header("Location:$url");
	            exit;
            }
?>

<?php

include('foot.php');
?>