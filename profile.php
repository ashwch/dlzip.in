<?php
session_start();
ob_start();
include('includes/scripts/site_maintain.php');


if(!isset($_SESSION['ndr']) && !isset($_SESSION['agent']) && ($_SESSION['agent']!=md5($_SERVER['HTTP_USER_AGENT'])))
	{ 	$url = BASE_URL."/";
            header("Location: $url");
	    exit();
}

?>

<?php

$page_title="{$_SESSION['ndr']} | Profile";


include('head.php');

?>
<?php 
require_once('includes/scripts/sqlconnection.php');
$q="SELECT user_last_name,user_gender from user_dbase where user_uid={$_SESSION['udr']}";
$r=mysqli_query($dbc,$q) OR trigger_error("Query1 profile:". mysqli_error($dbc));
if($r){
$row=mysqli_fetch_row($r);

?>
<?php /*?>
<div id='profile'  style='float:;position:relative;top:30px;'>

	
	<div id='account_data'  style='float:center;position:relative;top:-100px'>
	<p align= 'center'><b>Welcome, <?php echo "{$_SESSION['ndr']} ".$row[0];?></p>
	<p></p>	
	<br />
	<br />
	<p align='center'>Your Account History</b></p>
	<br/><br /><br/>
	<br />
	
	<div>
	<p align='right'><a href='edit.php' align='right' title='change account details and Password' class='cow'><b>Edit Account</b></a>	</p>
	<fieldset class='fieldset'><legend align='center'><h4><?php echo strtoupper($_SESSION['ndr']);?></h4></legend>
		<p><span class='profile' align='right'>First Name:</span><span class='profile-1'><?php echo $_SESSION['ndr'] ?></span></p>
		<p><span class='profile'>Last Name:</span> <span class='profile-1'><?php echo $row[0];  ?></span></p>
		<p><span class='profile'>  Email:</span> <span class='profile-1'><?php echo $_SESSION['edr'];?></span></p>
		<p><span class='profile'>Sex:</span> <span class='profile-1'><?php echo $row[1];?></span></p>
	</fieldset>
	
	</div>
	</div>
		</div>< */?>
		<br /><br /><br /><br />
<div align='center'>
	<?php } else echo "Something Went Wrong. We're fixing it.";?>	
	
	<h4><big>Your Recent Activity</big></h4>
        <ul>
	  <?php
        	  
			  $rt=mysqli_query($dbc,"SELECT DISTINCT soft_id from user_downloads where user_uid={$_SESSION['udr']} order by down_dt desc LIMIT 5 ") OR trigger_error("query2error: profile.php".mysqli_error($dbc));
			  $num=mysqli_num_rows($rt);
			  if($num>0){
			  while($softid=mysqli_fetch_array($rt)) //select soft_id one by one and display their names+base_url from software_info table.
			  {	
			  $rx=mysqli_query($dbc,"SELECT soft_name,soft_version,soft_category from software_info where soft_id={$softid[0]}") OR trigger_error(mysqli_error($dbc));
			  
		?>
        
        
         <?php
        	while($topp=mysqli_fetch_array($rx))
            {  
				 
				 $url2=$url="scripts/browse.php?ctr=".urlencode($topp[2])."&name=".urlencode($topp[0]);
				            	
        	 echo "<a href='$url2'><input type='button' class= 'dog' value='{$topp[0]} {$topp[1]}' ></a><br /><br />";
    	    }
	    } //end of while loop 
    }  //end of if loop 
    
    else echo "NO recent Downloads by You!<br />"; 	?>
        </ul>
	
</div>	
	
	


<?php include('foot.php'); ?>





	


 
