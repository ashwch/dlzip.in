<?php 
session_start();
ob_start();
include_once('includes/scripts/site_maintain.php');

if(!isset($_SESSION['ndr']) && $_SESSION['adr']!=md5($_SERVER['HTTP_USER_AGENT']))
	{
	 
	 $url=BASE_URL;
	 ob_end_clean();
	 header("Location:$url");
	 exit;	
	}
$page_title='Edit Account Info';

include('head.php');
include_once('includes/scripts/sqlconnection.php');
?>
<br /><br />
      

	   <div  align='center'>	
       <form method='post' action=''>
	    <fieldset class='fieldset'><legend align='center'><h4>Edit Info</h4></legend>
		 
	   <table cellpadding='3' cellspacing='3'>
	   <tr>
		   <td>First Name</td><td><input type='text' name='new_name' <?php echo" value='"."{$_SESSION['ndr']}'";?>></input></td>
			<td><input type='checkbox' value='1' name='name_check'>&nbsp;Edit&nbsp;</input></td><td style='color:red;font-size:10px;font-weight:none;'>min.3 alphabets</td>
		   </tr >
		<tr>
		   <td>Email</td><td><input type='rext' name='new_email' <?php echo" value='"."{$_SESSION['edr']}'";?>></input></td>
		   <td><input type='checkbox' value='1' name='email_check'>&nbsp;Edit</input></td>
		</tr>
		<tr><td></td><td>
		 <div align='center'>
		 <input type='reset' class='cow'><input type='submit' value='Change' class='cow'></input>
		 <input type='hidden' value='1' name='xonix'></input>
		 </div></td></tr>
		 
		 
	 </table></div>
		
		</fieldset>
		 </form>
		 <p id='edit_profile_notify' align='center' style='color:red'></p>
		  </div>


<?php
if(!empty($_POST['xonix'])) 
{
$pattern_first_name='/^[A-Za-z]{3,}$/ ';
$pattern_email='/^[\w]+(\.)?[\w]+(\.)?[\w]+(\.)?[\w](@){1}([\w]{2,})(\.){1}(([\w]{2,3})|([\w]{2}(\.)[\w]{2})|(mobi))$/';
//$local_new_email=mysqli_real_escape_string($dbc,trim($_POST['new_email']));
echo "<br /><hr size='2%'noshade='noshade'></hr><br /> ";
         if(empty($_POST['new_name']))
                {
                  echo "Name field is empty";	
         	      $local_new_name=NULL;
                }
        else
           {
           	if(preg_match($pattern_first_name,trim($_POST['new_name'])))
	           	{
	           		$local_new_name=mysqli_real_escape_string($dbc,trim($_POST['new_name']));
	           	}
	        else{ echo "<p><b>Invalid name, Name should be of atleast 3 alphabets and no special characters are allowed<b></p>";   	
           	         $local_new_name=NULL;
                   }
           }        
         
         if(empty($_POST['new_email']))
               {
      	          $local_new_email=NULL;
               }
        else
          {
          	if(preg_match($pattern_email,trim($_POST['new_email'])))
	           	{
	           		$local_new_email=mysqli_real_escape_string($dbc,trim($_POST['new_email']));
	           	}
	         else{ echo "<p><b>Email not valid. If you think this is wrong then <a href='/contactme.php'>Contact</a> the Admin.</b></p>";  	
          	         $local_new_email=NULL;
                  }
          }         
         
    if($local_new_name && $local_new_email)
      { 
            	if(!empty($_POST['name_check']) && !empty($_POST['email_check'])) //if both email and name are checked
    	           { 
		                $q2="SELECT user_email_id from user_dbase where user_email_id='$local_new_email' ";
		    
					    $r2=mysqli_query($dbc,$q2) OR trigger_error("Query 1 (edit_info): ".mysqli_error($dbc));
					    $row2=mysqli_fetch_row($r2);
					     if($row2) // if email id is already present.
					         {
					         	echo"<br/><br /><b>Email address you entered is already registered.</b><br /><br />";
					             $_POST=array();                 
					               
				              }
					     else
					     {	
							$q1="UPDATE user_dbase SET user_first_name='$local_new_name',user_email_id='$local_new_email' where user_uid={$_SESSION['udr']} "	;
							$r1=mysqli_query($dbc,$q1)  OR trigger_error("Query 2 (edit_info): ".mysqli_error($dbc));
							    
							$num=mysqli_affected_rows($dbc);
					        if($r1){
					    	         echo"<br/><br /><b>user name and email are changed succesfully</b>";
					                 $_SESSION['ndr']=$local_new_name;    	             
					                 $_SESSION['edr']=$local_new_email;    	             
					    	         $q="SELECT user_uid,user_first_name,user_email_id from user_dbase where user_uid={$_SESSION['udr']}";
						             $r=mysqli_query($dbc,$q)  OR trigger_error("Query 3 (edit_info): ".mysqli_error($dbc));
						             $row=mysqli_fetch_row($r);
						             echo"<br /><br /><div align='center'><p><b>
						             <ul><li>Name :  {$row[1]}</li>
							         <li>Email :  {$row[2]}</li>
							         </ul></b></p></div>";
					    	         $_POST=array();
					                }
					        else
					         {
					         	echo"<br/><br /><b>something went wrong</b>";
					            $_POST=array();
					         }         
    }
}
elseif(empty($_POST['name_check']) && empty($_POST['email_check']))
       {
       	echo "<br/><br /><b>Nothing was selected to edit.</b>";
       	
       	$_POST=array();
       }

elseif(!empty($_POST['name_check'])) // if only name is checked
	      {      $q3="UPDATE user_dbase SET user_first_name='$local_new_name' where user_uid={$_SESSION['udr']}";	
	             $r3=mysqli_query($dbc,$q3)  OR trigger_error("Query 4 (edit_info): ".mysqli_error($dbc));
	              if(mysqli_affected_rows($dbc)==1){ echo "<br/><br /><b>name changed succcesfully</b>";
	                     $_SESSION['ndr']=$local_new_name;
	                      $q="SELECT user_uid,user_first_name,user_email_id from user_dbase where user_uid={$_SESSION['udr']}";
		                  $r=mysqli_query($dbc,$q)  OR trigger_error("Query 5 (edit_info): ".mysqli_error($dbc));
		                  $row=mysqli_fetch_row($r);
		                  echo"<br /><br /><div align='center'><p><b>
		                  <ul><li>Name :  {$row[1]}</li>
			              <li>Email :  {$row[2]}</li>
			              </ul></b></p></div>";
			              $_POST=array();
	                      }
	                      else {echo"<br/><br /><b>something went wrong! Name not changed.</b>";
	                       $_POST=array();}
          
            }

elseif(!empty($_POST['email_check'])) //if only email is checked
  {      
    $q4="SELECT user_email_id from user_dbase where user_email_id='$local_new_email' ";
    
    $r4=mysqli_query($dbc,$q4)  OR trigger_error("Query 6 (edit_info): ".mysqli_error($dbc));
    $row4=mysqli_fetch_row($r4);
     if($row4){echo"<br/><br /><b>email address you entered is already registered</b>";
     
         $_POST=array(); }
     else{ 
              $q6="UPDATE user_dbase SET user_email_id='$local_new_email' where user_uid={$_SESSION['udr']} "	;
              $r6=mysqli_query($dbc,$q6)  OR trigger_error("Query 7 (edit_info): ".mysqli_error($dbc));
              
              if(mysqli_affected_rows($dbc)==1)
                         {
				          echo"email changed successfuly ";
				          $_SESSION['edr']=$local_new_email;    	             
				          $q="SELECT user_uid,user_first_name,user_email_id from user_dbase where user_uid={$_SESSION['udr']}";
				                  $r=mysqli_query($dbc,$q)  OR trigger_error("Query 8 (edit_info): ".mysqli_error($dbc));
				                  $row=mysqli_fetch_row($r);
				                  echo"<br /><br /><div align='center'><p><b>
				                  <ul><li>Name :  {$row[1]}</li>
					              <li>Email :  {$row[2]}</li>
					              </ul></b></p></div>";
					              $_POST=array();    
				          }
              else{echo "<br/><br /><b>something went wrong!email not changed.</b>";
               $_POST=array();
              
                  }   
         }
  }
 else {$_POST=array();} 

}// if nothin is NULL condition's IF
else echo "<p><b> please Fill the fields correctly</b></p>"; 
       
} //submitted's IF ends here
    



         	


?>


		 
<?php
// mysqli_free_result($r);   
include('foot.php');	    
?>
