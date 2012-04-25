<?php

session_start();
include('includes/scripts/site_maintain.php') ;
if(!empty($_SESSION['ndr']))
	{
	 
	 $url=BASE_URL;
	 HEADER("Location:$url");
	 exit;
    }
$page_title="Registration";?>
<?php include('head.php'); echo "<br /> <br />";?>


<div align='center' >
<form method='POST' action='' name='signupForm'>
<fieldset class='fieldset'>
<legend align='center'><b><h4>Sign Up</h4></b></legend>
<small><small>* compulsary fields</small></small>
<table border='0' cellspacing='7' cellpadding='6' align='center' >
<tr>
	<td>First Name</td><td><input type='text' id='signup_name' name='first_name' class='contactme' value=''></input></td><td><sup>*</sup></td><td id='signup_name_notify' style='color:red;width:101px;font-size:10px;font-weight:none;'>min. 3 alphabets</td>
</tr>
<tr>
	<td>Last Name</td><td><input type='text' name='last_name' value='' class='contactme' ></input></td>
	 

<tr>
	<td>password</td><td><input type='password' name='pwd' class='contactme'></input></td><td><sup>*</sup></td><td id='signup_pwd_notify' style='color:red;font-size:10px;font-weight:none;'>min. 8 Characters</td>
	
</tr>
<tr>
	<td>Confirm password</td><td><input type='password' name='pwd1' class='contactme'></input></td><td><sup>*</sup></td>
<td id='signup_pwdd_notify' style='color:red;font-size:10px;font-weight:none;'></td>	
</tr>
<tr>
	<td>Email</td><td><input type='text' name='email' value='' class='contactme'></input>
  </td><td><sup>*</sup></td><td id='signup_email_notify' style='color:red;font-size:10px;font-weight:none;'></td>
</tr>

<tr>    <td>Gender</td><td><select name='gender'>
		<option value='M'>Male</option>
		<option value='F' selected='selected'>Female</option>
		</td>
</tr>

<input type='hidden' name='xonix' value='1'>
<tr><td><input type='Reset' class='cow' value='Reset'></input></td>
<td><input type='submit' class='cow' value='Submit' ></input></td></tr>
</table>
</fieldset>
</form>
</div>
<?php if(empty($_POST['xonix'])){
	       echo "Already have an Account? <a href='login.py?refid=lk534r239c'>Log In</a> Now!";
         }
?>





<div>
<?php 
if(!empty($_POST['xonix'] ))


{
	 $k=md5(uniqid(rand(),true));
	$e=$fn=$ln=$sex=$p1=$p2=NULL;
	
	$pattern_email='/^[\w]+(\.)?[\w]+(\.)?[\w]+(\.)?[\w](@){1}([\w]{2,})(\.){1}(([\w]{2,3})|([\w]{2}(\.)[\w]{2})|(mobi))$/'; //use single quote marks to define pattern
	$pattern_first_name='/^[A-Za-z]{3,}$/ ';
	$pattern_last_name='/^[A-Za-z]{1,}$/';
	$pattern_pwd='/^[\w]{8,}$/';
	require_once('includes/scripts/sqlconnection.php');
	//trim all the submitted vaules
    $trimmed=array_map('trim',$_POST);
    echo "<br /><hr size='2%' noshade='noshade'></hr>";	
	if(!empty($trimmed['first_name']))
	   { if(preg_match($pattern_first_name,$trimmed['first_name']))
	      	 {  
			   $fn=mysqli_real_escape_string($dbc,$trimmed['first_name']);
			 }
	 	 else{ 
	 	 	   echo "<p><b>Invalid name, Name should be of atleast 3 alphabets and no special characters are allowed<b></p>";
	 	     }
	 	   
	   }
    else
	   {
	      echo "<p><b>You Forgot to Enter your First Name</b></p>";
	            
	   }
	   
	 if(!empty($trimmed['last_name']))
	   { if(preg_match($pattern_last_name,$trimmed['last_name']))
	      	 {  
			   $ln=mysqli_real_escape_string($dbc,$trimmed['last_name']);
			 }
	 	 else{ 
	 	 	   echo "<p><b>Invalid Last name, no special characters are allowed</b></p>";
	 	     }
	   }	       
	   
	     
  if(!empty($trimmed['email']))
	  { 
	  	if(preg_match($pattern_email,$trimmed['email']))
	  	{
		 $e=mysqli_real_escape_string($dbc,$trimmed['email']);
	    }
	    else{ echo"<p><b>Email not valid. If you think this is wrong then <a href='/contactme.php'>Contact</a> the Admin.</b></p>";}
		
	  }
  else
    {
      echo "<p><b>you forgot to enter your email</b></p>";
     
    }
	 	 
  if(!empty($trimmed['gender']))
   {
   	$sex=mysqli_real_escape_string($dbc,$trimmed['gender']);
   }
 
if(!empty($trimmed['pwd']))
{
     
	 $p1=mysqli_real_escape_string($dbc,$trimmed['pwd']);
	 
}

else {
      echo "<p><b>you forgot to enter your password</b></p>";
      
     }
$p2=$trimmed['pwd1'];
if($p1!=$p2)
{echo "<p><b>passwords do not match</b></p>";

}
	
	 
if($fn && $e && $sex && $p1==$p2 && $p1)//check all conditons
{
   
	$q1="SELECT user_email_id from user_dbase where user_email_id='$e'";
	$r1=mysqli_query($dbc,$q1);
	$rowcheck=mysqli_fetch_row($r1);// here you can also use mysqli_num_rows() methos to check the email entered.
	if($rowcheck[0]==$e){
		echo "<p><b> email id $e is already present. </b></p> ";
	}
	
	else{
		
	$q="INSERT INTO user_dbase(user_email_id,user_first_name,user_last_name,user_gender,user_reg_dt,activation)
      values ('$e','$fn','$ln','$sex',NOW(),'$k') ";
		 

	$r=mysqli_query($dbc,$q) OR trigger_error("query error:". mysqli_error($dbc));;
	if(mysqli_affected_rows($dbc)==1)
			{
					
				    $q3="SELECT user_uid from user_dbase where user_email_id='$e'";
					$r3=mysqli_query($dbc,$q3);
					$rowcheck1=mysqli_fetch_row($r3);// here you can also use mysqli_num_rows() methos to check the email entered.
						
					$r2=mysqli_query($dbc,"SELECT @salt:=user_salt from aes_salt");	
					$r2=mysqli_query($dbc,"INSERT into user_pwd (user_uid,user_pwd)values('$rowcheck1[0]',AES_ENCRYPT('$p1',@salt))") OR trigger_error('query2:'.mysqli_error($dbc)); 	
				 
			    	echo "Thank you <b>$fn</b> for registering on our website<br />
			    	A mail is Sent to $e please click on the Activation code to activate your account"; 
			    	$body=" username: $fn password :$p1 activation code:http://dlzip.in/activation.py?user=".$fn."&activid=".$k;
			    	
			    	$body=wordwrap($body,70);
	     	        mail("$e","Hello $fn" ,$body,"From:do-not-reply@dlzip.in");
		    	
		       }
		  else {
			     echo "<p><b>Something went Wrong. We're fixing it.</b></p>";  
		       }
 }
mysqli_close($dbc);
 }
 else{$_POST=array();}

}
//if condition closes here
//php closes here?>



</div>
<?php include('foot.php');?>
