<?php 
session_start();
$page_title="Contact Us";
include('head.php');
?><br /><br />

<div align='center'>
<form action='' method='POST'>
<fieldset class='fieldset'><legend align='center'><h4>Contact Us</h4></legend>	
<table align='center'>
	<tr><td>Email</td><td><input type='text' name='email' id="email_contact" size='50' onclick="contactme_email()" onblur="contactme_email_blur()" class="contactme"></input></td></tr>
	<tr><td>Subject</td><td><input class="contactme" type='text' name='subject' size='50' id='subject_contact'></input></td></tr>
	<tr><td>Message</td><td><textarea  class="contactme" id ='textarea_contact' name='textarea' rows='5' cols='40' ">Message Body....</textarea></td></tr>
	<tr></tr>
	<tr><td></td><td><input type='submit' value='send' class='cow'></td></tr>
	<input type='hidden' value='1' name='submitted'></input>

</table>
</fieldset>	
</form>
<p id='contactme_notify' style="color:red"></p>
</div>	


<?php
if(!empty($_POST['submitted'])){
	if( $_POST['email']!="email@example.com" && $_POST['textarea']!="Message Body....")
		{
		
function spam_stopper($value)
   {
   	$bad_chars=array('bcc:','to:','cc:','content-type:','mime-version:','multipart-mixed:','content-transfer-encoding:' );
   	foreach($bad_chars as $b)
	   	 {
	   	 if(stripos($value,$b)==true)
	   	  return '';	
	   	 }
   	$value=str_replace(array('\r','\n','%0a','%0d'),'',$value);
	   	return trim($value);
   }

 $scrub=array_map('spam_stopper',$_POST);	
 if(!empty($scrub['email']) && !empty($scrub['subject']) && !empty($scrub['textarea']))
     {
     	$body="Message:{$scrub['textarea']}";
     	$body=wordwrap($body,70);
     	mail('monty.sinngh@gmail.com',$scrub['subject'],$body,"From:{$scrub['email']}");
        echo "your mail is sent succesfully. We'll reply ASAP! ";     	
        $_POST=array();
     }
else echo"<br /><br /><b><big>Error!</big> Please fill out the form Completely</b>";




}
else echo"<br /><br /><b><big>Error!</big> Please fill out the form Completely</b>";
}


?>


<?php include('foot.php')?>