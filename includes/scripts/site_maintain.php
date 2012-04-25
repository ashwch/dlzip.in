<?php
define('LIVE',true);//variable to check site's status.
define('ADMIN_MAIL','monty.sinngh@gmail.com');
define('BASE_URL','http://dlzip.in');


function error_handler($error_num,$error_msg,$error_file,$error_line,$error_vars)
	 {
	   if(LIVE)
	   	 {
	   	 
	   	 	echo "<p class='error'> Something Went Wrong.</p>";
	   	 
         }    
	   elseif(!LIVE)
	      {	
				
				$message="error # :{$error_num} on line {$error_line} and of the file {$error_file}, and variables are {$error_vars}<br />error message :{$error_msg} ";
				echo "<b>".$message."</b><br />";
				
	    
          }
    }
set_error_handler('error_handler');
//error_reporting(E_ALL & ~E_NOTICE );

//ndr== user_name
//edr== user_email
//udr==user_id


?>


