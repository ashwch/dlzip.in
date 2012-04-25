<?php

session_start();
ob_start();
include('includes/scripts/site_maintain.php') ;
if(isset($_SESSION['ndr']) ) 
	{ 	$url =BASE_URL;
	header("Location: $url");
	exit();
}

?>

<?php

$page_title="Log In";

include('head.php');

?>
<?php 
include_once('includes/scripts/sqlconnection.php');

	         //if(isset($_GET['redirect']))
	         //   $url="http://localhost".urldecode($_GET['redirect']);
	         //else $url="http://localhost/";

?>
<br /><br />

<div align='center' border='0' cellspacing='3' cellpadding='3'>
<form method='POST' action=''>
<fieldset class='fieldset'>
<legend align='center'><b><h4>Log In</h4></b></legend>
<table>
<tr><td>
Email</td><td><input type='text' name='email' class="contactme" id='login_email'> </td></tr>
<tr><td>Password</td><td><input type='password' name='pwd' class="contactme" id='login_pwd'></td></tr>
<tr></tr> <strong></strong>
<input type='hidden' name='xonix' value='1'>
<tr><td><input type="reset" class="cow"></span></span></td>
<td><input type="submit" value="Log In" class="cow"></span></span></td></tr>
</table>
</fieldset>
</form>
<p id='login_notify' style="color:red;"></p>
</div>


<?php if(empty($_POST['xonix'])){
                
	       echo "Don't have an account? <a href='";echo BASE_URL."/signup.py"; echo "?refid=sdghfwi832'>Register</a> Now! it's Free.";
         }
?>
<?php if(!empty($_POST['xonix']))

  {
  	echo "<br /><hr size='2%' noshade='noshade'></hr>";
    $e=$p1=NULL;
    
    $trimmed=array_map('trim',$_POST);
    
    if(!empty($trimmed['email']))
    {
     $e=mysqli_real_escape_string($dbc,$trimmed['email']);
    }    
    	
  	else echo"<p><b>You Forgot to Enter the Email</b></p>";
  	
  	if(!empty($trimmed['pwd']))
  	
  	{
  	 $p1=mysqli_real_escape_string($dbc,$trimmed['pwd']);	
  	}
  	
  	else echo"<p><b>You Forgot to Enter the Password</b></p>";
  	
  	if($e && $p1)
  	
  	  {
  	  	$r=mysqli_query($dbc,"SELECT @salt:=user_salt from aes_salt");
  	    $q="SELECT user_first_name, user_uid, user_email_id,activation
			FROM user_dbase
			INNER JOIN user_pwd
			USING ( user_uid ) 
			WHERE user_email_id = '$e'
			AND activation='1'
			AND AES_DECRYPT( user_pwd.user_pwd, @salt) = '$p1'";
  	    $r=mysqli_query($dbc,$q) OR trigger_error("Query 1:".mysqli_error($dbc));
  	    if((mysqli_num_rows($r))==1)
  	    {
  	    	$row=mysqli_fetch_array($r);
  	    	$_SESSION['ndr']=$row[0];
	  	    $_SESSION['udr']=$row[1];
            $_SESSION['edr']=$row[2];
            $_SESSION['adr']=md5($_SERVER['HTTP_USER_AGENT']);
                 
             
               $url=BASE_URL;
               ob_end_clean();
	            echo"<script type='text/javascript'>
                gob();
	               function gob(){
	               window.history.go(-2);}
	               </script>";
	           //HEADER("Location:$url");
	            //exit;
  	    }
  	    else echo "<p><b>Incorrect Email/Password</b></p>";
  	    
  	  
  	     	
  	  }
  	    else echo"<p><b>Please try again!</b></p>" 	;
  }

?>
	

<?php include('foot.php'); ?>