<?php
include("../../includes/scripts/site_maintain.py");
session_start();
$page_title='Google Chrome';
include('../head.py');
?>

<?php
include_once('../../includes/scripts/sqlconnection.py');
$q="SELECT soft_name,soft_version,soft_url FROM software_info WHERE soft_name LIKE '%chrome%'";
$r=mysqli_query($dbc,$q) OR trigger_error("Query error(googleChrome.py):".mysqli_error($dbc));
echo"<h4 align='center'>Google Chrome</h4><br /><img src='http://localhost/images/loading1.gif'  alt='' name='ima' ><br />";
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
	   	$url="javascript:alert(Please Log In first)";
	   	$func='err()';
	   }


echo "<b>".$list[0]." ".$list[1]." <b>  ";
echo "<a href='$url'><input type='button' value='Download' class='cow' onclick=$func ></a><br /><br />";

}
?>
<?php
echo"</div>";
include('../foot.py')
?>
