<?php session_start();
if(isset($_GET['ctr']) && isset($_GET['name']))
{
	


include_once("../includes/scripts/site_maintain.php");
$name=strip_tags($_GET['name']);
$name_cap=strtoupper($name);
$page_title=$name;
include('../head.php');
 
?>

<?php
include_once('../includes/scripts/sqlconnection.php');

if(!isset($_SESSION['udr']))
	{echo"<div><a href='".BASE_URL."/login.py' style='text-decoration:none'>LOGIN</a> TO enable faster Downloads.<br /></div>";
	}
    echo "<span  align ='center' id='status' style='border: 3px solid transparent;border-radius: 3px;font-weight: bold;text-align: center;'></span>";
	$q="SELECT soft_id,soft_name,soft_version,file_path FROM software_info WHERE soft_name LIKE '$name' order by soft_version DESC";
	$r=mysqli_query($dbc,$q) OR trigger_error("Query error($name):".mysqli_error($dbc));
	if(mysqli_num_rows($r)>0){
echo "<span class='hideme'>Download $name_cap</span>
<span class='hideme'>Download $name_cap free</span>
<span class='hideme'> Free Download $name_cap</span>
<span class='hideme'>$name_cap Download </span>
<span class='hideme'>$name_cap Download  windows 7</span>	
<span class='hideme'>$name_cap Download  windows xp</span>
<span class='hideme'>$name_cap Download  windows vista</span>
<span class='hideme'>$name_cap Download for windows 7</span>	
<span class='hideme'>$name_cap Download for windows xp</span>
<span class='hideme'>$name_cap Download for windows vista</span>
<span class='hideme'>$name_cap  for windows 7</span>	
<span class='hideme'>$name_cap  for windows xp</span>
<span class='hideme'>$name_cap  for windows vista</span>
<span class='hideme'>$name_cap  free download for windows 7</span>	
<span class='hideme'>$name_cap  free download for windows xp</span>
<span class='hideme'>$name_cap  free download for windows vista</span>

<span class='hideme'>$name_cap  free download windows 7</span>	
<span class='hideme'>$name_cap  free download windows xp</span>
<span class='hideme'>$name_cap  free download windows vista</span>
";
echo"<h4 align='center'><span class='hideme'>Download </span>$name_cap<span class='hideme'>Free</span></h4><br /><br />";


echo"<div align='center'><table>";
//$modules = apache_get_modules();

while($list=mysqli_fetch_array($r))
{
$refid=$list[0];
	          $ver=$list[2];
	          if(isset($_SESSION['ndr']))
	          {$func='wait_more()';
	          }
	          else $func='wait_less()';
	           $url="download.py?refid=".urlencode($refid)."&ver=".urlencode($list[2]);

echo "<tr><td align='center'><b>".$list[1]." ".$list[2]." </b></td>  ";
echo "<td align='center'><a href=$url><input type='button' value='Download' class='cow' onclick='$func' ></a></td></tr>";

}
echo "</table></div>";
}else {echo "<h3 align='center'>No results found for $name</h3>"; $page_title="Error!"; }
}
else{
	 include_once('../includes/scripts/site_maintain.php');
     header("Location:".BASE_URL) ;
     ob_end_flush();
     exit;
    }
?>
<?php
echo"</div>";
include('../foot.php')
?>