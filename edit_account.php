<?php 
session_start();
ob_start();
include('includes/scripts/site_maintain.php') ;

if(empty($_SESSION['ndr']) && $_SESSION['adr']!=md5($_SERVER['HTTP_USER_AGENT']))
	{
	 $url=BASE_URL."/";
	 ob_end_clean();
	 header("Location:$url");
	 exit;
    }

$page_title='Change Password';
 include('head.php');
 ?>
 <br /><br />

<div align='center'> <form method='post' action=''>
 <fieldset class='fieldset'> 
 <legend align='center'><h4>Edit Account</h4></legend><br/><br />
   <table cellpadding='1' align='center'>
 <tr><td>Email</td> <td><input type='text' name='email'></input></td></tr>
 <tr><td>Current password</td> <td><input type='password' name='cpwd'></input></td></tr>
 <tr><td>new password</td> <td><input type='password' name='pwd'></input></td><td style='color:red;font-size:10px;font-weight:none;'>min. 8 characters</td></tr>
 <tr><td>Confirm password</td> <td><input type='password' name='pwd1'></input></td></tr>
 <tr></tr><tr></tr><tr></tr>
 <tr><td><input type=reset class='cow'></input></td><td><input type='submit' value='Change password' class='cow'></input></td></tr>
 <input type='hidden' name='xonix' value='1'></input>
	 <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
 </table>
 
 </fieldset>
	 </form></div>
 
<?php

if(!empty($_POST['xonix'])){
	
echo "<br /><hr size='2%' noshade='noshade'>";	
$pattern_pwd='/^[\w]{8,}$/';	


if(!empty($_POST['email'])){
$email=mysqli_real_escape_string($dbc,trim($_POST['email']));	
}	
else{$email=NULL;
	echo "you forgot to enter the email<br />";
	
	
}
	

if(!empty($_POST['cpwd'])){
$cpwd=mysqli_real_escape_string($dbc,trim($_POST['cpwd']));	
}	
else{$cpwd=NULL;
	echo "<p><b>you forgot to enter the current password </b></p>";}

if(!empty($_POST['pwd'])){
  if(preg_match($pattern_pwd,trim($_POST['pwd'])))	
     {$pwd=mysqli_real_escape_string($dbc,trim($_POST['pwd']));	}
  else {echo"<p><b>password should contain atleast 8 characters</b></p>";
       $pwd=NULL;}
}	
else{$pwd=NULL;
	echo "<p><b>you forgot to enter the New password </b></p>";}	
$pwd1=mysqli_real_escape_string($dbc,trim($_POST['pwd1']));	

if($pwd!=$pwd1){
	echo"<p><b>passwords doesn't match, please go back and re-enter</b></p>";
}

if($email && $cpwd && isset($pwd) && $pwd1 && $pwd==$pwd1){
$r1=mysqli_query($dbc,"SELECT @salt:=user_salt from aes_salt");
$q1="SELECT user_uid from user_dbase 
     INNER JOIN user_pwd USING (user_uid)
     where(user_email_id='$email' AND AES_DECRYPT(user_pwd.user_pwd,@salt)='$cpwd') ";
$r1=mysqli_query($dbc,$q1) OR trigger_error("Query 1 edit_account: ".mysqli_error($dbc));
$num=mysqli_num_rows($r1);
if($num>0){ 
$q="UPDATE user_pwd SET user_pwd=aes_encrypt('$pwd',@salt) where user_uid={$_SESSION['udr']}"	;
$r=mysqli_query($dbc,$q);
if($r){echo"<p><b> password changed succesfully </b></p>";}
else{echo"<p><b>Something went wrong </b></p>";}
}
else{echo "<p><b>Incorrect email/Current password</b></p>"; //br is for the hr tag	 
}
}
$_POST=array();
echo "<br />";
echo "<br />";
	
//mysql_free_result($r1);
//mysql_free_result($r);
//mysqli_close($dbc);
}//main IF condition ends here
?>

<?php include('foot.php');	?> 