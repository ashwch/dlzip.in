<?php
session_start();
include_once("includes/scripts/site_maintain.php");
include_once("includes/scripts/sqlconnection.php");
$url=BASE_URL;
if(!empty($_GET['ctr']))
{
	
	$page_title=$_GET['ctr'];
	include_once('head.php');
	if(!isset($_SESSION['udr']))
	{echo"<div><a href='login.py' style='text-decoration:none'>LOGIN</a> TO enable faster Downloads.<br /></div>";
	}
	
	echo "<div><span  align ='center' id='status' style='border: 3px solid transparent;border-radius: 3px;font-weight: bold;text-align: center;'></span><br /><br /></div><div align='center'>";
	
	$categ=$_GET['ctr'];
	
	$q="SELECT soft_id,soft_name,soft_version,file_path FROM software_info WHERE soft_category = '$categ' order by soft_name";
	$r=mysqli_query($dbc,$q);
	if(mysqli_num_rows($r)>0){
	echo "<table id='showcategory'>";
	while($list=mysqli_fetch_array($r))
			{
	                  $refid=$list[0];
	          $ver=$list[2];
	          if(isset($_SESSION['ndr']))
	          {$func='wait_more()';
	          }
	          else $func='wait_less()';
		 $url="scripts/download.py?refid=".urlencode($refid)."&ver=".urlencode($list[2]);
		
		echo "<tr><td align='center'>".$list[1]." ".$list[2]."</td><td align='center'><a href='$url'><input type='button' value='Download' class='cow' ></a></td></tr>";
		}
		echo "</table></div>";
		}
		else 
		{  
		echo "<h3 align='center'>No results found for $categ</h3></div>"; 
		    
		}
}		
else
	{
		HEADER("Location:$url");
		exit;
	}
	
	    
?>

<?php
include_once('foot.php');
?>