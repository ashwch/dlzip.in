<?php
session_start();
include_once("includes/scripts/site_maintain.php");
include_once("includes/scripts/sqlconnection.php");
$url=BASE_URL;

	
	$page_title="Categories";
	include_once('head.php');
	echo "<div></div><h2 align='center'> All Categories</h2><div align='center'>";
	
	
	
	$q="SELECT Distinct soft_category FROM software_info order by soft_category";
	$r=mysqli_query($dbc,$q);
	echo "<table id='showcall'>";
	while($list=mysqli_fetch_array($r))
		{
		          			
			
		$url=BASE_URL."/showcategory.py?ctr=".urlencode($list[0]);	
		
		echo "<tr><td align='center'>".$list[0]."</td><td align='center'><a href='$url'><input type='button' value='See All' class='cow' ></a></td></tr>";
		}
		echo "</table></div>";
		

?>

<?php
include_once('foot.php');
?>