<?php

include_once('../includes/scripts/site_maintain.php');
include_once('../includes/scripts/sqlconnection.php');
$page_title='Upload';
include_once('../head.php');

?>
<br /><br />
<form enctype='multipart/form-data' method='post' action='file_upload.php'>
<input type='file' name='upload'></input><br /> 
<fieldset class='fieldset'>

File name<input type='text'  name='file_name'></input><br />
Version<input type='text'  name='file_version'></input><br />
<input type='hidden' name='xonix' value='1'></input><br />
<?php // $categ=scandir("../../downloads/"); // collect the name of all folders inside downloads folder in //$categ
	//echo print_r($categ);
 $cat=array('torrent','mplayers','inetbrowsers','ptools','compilers','systemtune','images','antivirus','office','compression','chat');
?>

<select name='category'>
<?php 

foreach($cat as $temp_cat)
	   {echo "<option value='$temp_cat'>$temp_cat</option>";}
     
?>
<!--
<option value='mplayers'>mplayers</option>	    
<option value='torrent'>torrent</option>	    
<option value='inetbrowsers'>inetbrowsers</option>	    
<option value='ptools'>ptools</option>	    
<option value='mplayers'>trial</option>	    
<option value='mplayers'>trial</option>	    
<option value='mplayers'>trial</option>	    
<option value='mplayers'>trial</option>	    
<option value='mplayers'>trial</option>	    
-->
</select><br />
<br />
<input type='submit' value='upload' class='cow'>
</fieldset>
</form>	
<br />

<?php
if(!empty($_POST['xonix']))
{
		$trimmed=array_map('trim',$_POST);
		$trimmed['file_name']=mysqli_real_escape_string($dbc,$trimmed['file_name']);
		$trimmed['version']=mysqli_real_escape_string($dbc,$trimmed['file_version']);
		//$trimmed['file_name']=mysqli_real_escape_string($trimmed['file_name']);
		$trimmed['category']=mysqli_real_escape_string($dbc,$trimmed['category']);
					
			
		$upload_path="downloads/";
				                                
				                                                 
						                
				
			
			
			
			
	if($_FILES['upload']['error']==0)
	{
	 
     $file_path="$upload_path".$_FILES['upload']['name'];
     $split=preg_split('/(downloads\/)/', $file_path);
     
     echo $split[1];
     echo "<br />";
     echo $file_path;	 $upload_success=move_uploaded_file($_FILES['upload']['tmp_name'],"$file_path");		
         if($upload_success)
           {
         	 echo "<script type='text/javascript'>alert('upload done')</script>";
         	 
         	 $_POST=array(); // empty post array
	         $_FILES=array(); // empty files array
           }
    
    $q="INSERT into software_info(soft_name,soft_version,soft_category,file_path)
        values('{$trimmed['file_name']}','{$trimmed['version']}','{$trimmed['category']}','$file_path') ";
    $r=mysqli_query($dbc,$q) OR trigger_error(mysqli_error($dbc));
    if(mysqli_affected_rows($dbc)==1)
    {
    	echo "<script type='javascript'>alert('upload is successful')</script>";
    }    	
                   
       
       
    }
else {
	     switch($_FILES['upload']['error']){
	     	
	     	case 1: echo"<script type='text/javascript'>
		     	         
	     	             alert('the file size exceeds the upload_max_size
		     	             setting of php.ini');</script>";
		     	   break;          
		    case 2: echo"<script type='text/javascript'>
	     	             alert('file size error');</script>";
		     	   break; 	   
		    case 3: echo"<script type='text/javascript'>
	     	             alert('the file wasonly partially uploaded');</script>";
		     	   break; 	    	   
		    case 4: 
		            echo"<script type='text/javascript'>
	                     alert('! No file Selected. ');
	     	             </script>";
		     	   break; 	    	    	   
		    case 6: echo"<script type='text/javascript'>
	     	             alert('no temporary folder available');</script>";
		     	   break; 	    	    	   
		    case 7: echo"<script type='text/javascript'>
	     	             alert('unable to write to the disk');</script>";
		     	   break; 	    	    	   
		    case 8: echo"<script type='text/javascript'>
	     	             alert('file upload stopped');</script>";
		     	   break; 	    	    	   
		    default : echo"<script type='text/javascript'>
	     	             alert('something went wrong.We are fixing it');</script>";
		     	   break; 	    	    	   
	     } 
	     
     }
	
			
		
		
}//Main IF condition ends here      
?>	
	







<?php include('../foot.php');?>