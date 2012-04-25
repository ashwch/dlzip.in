<?php
include("../includes/scripts/site_maintain.py");
session_start();
$page_title='Open Office Org';
include('head.py');
?>

<?php
include_once('../includes/scripts/sqlconnection.py');
	$q="SELECT soft_name,soft_version,soft_url FROM software_info WHERE soft_name LIKE 'open office%'";
	$r=mysqli_query($dbc,$q) OR trigger_error("Query error(ooo.py):".mysqli_error($dbc));
echo"<h4 align='center'>Open office Org</h4><br /><span id='status' style='background-color:yellow;font-weight:bold' align='center'><span><br />";
echo"<div align='center'>";
while($list=mysqli_fetch_array($r))
{	

if(isset($_SESSION['ndr']))
	{
$url=$list[2];
$func='notify()';
}
 else
	   {
	   	$url='#';
	   	$func='err()';
	   }


echo "<b>".$list[0]." ".$list[1]." <b>  ";
echo "<a href=$url><input type='button' value='Download' class='cow' onclick=$func ></a><br /><br />";

}
?>
<?php
echo"</div>";
include('foot.py')
?>