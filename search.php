<?php

	
	include_once('includes/scripts/site_maintain.php');
	include_once('includes/scripts/sqlconnection.php');
	
?>
<?php

    $page_title="Search : {$_GET['q']}";
	include_once('head.php');
	
	
	if(isset($_GET['q']) && !empty($_GET['q'])){
	if(!isset($_SESSION['udr']))
	{echo"<div><a href='login.py' style='text-decoration:none'>LOGIN</a> TO enable faster Downloads.<br /></div>";
	}
	
	echo "<div>
	<p></p>
	<span  align ='center' id='status' style='border: 3px solid transparent;border-radius: 3px;font-weight: bold;text-align: center;'></span><br /><br /></div><div align='center'>";
	
	$search=strip_tags(mysqli_real_escape_string($dbc,$_GET['q']));
	$number=0;
	$q="SELECT soft_id,soft_name,soft_version,file_path FROM software_info WHERE soft_name like'%$search%' order by soft_name";
	$r=mysqli_query($dbc,$q);
	if(mysqli_num_rows($r)>0){
	$tot_results=(int)mysqli_num_rows($r);
	echo "<p><h3 align='center'> Voila! $tot_results results found for '$search'</h3></p><br />";
	echo "<table id='search'>";
	while($list=mysqli_fetch_array($r))
		{$number++;
	          $refid=$list[0];
	          $ver=$list[2];
	          if(isset($_SESSION['ndr']))
	          {$func='wait_more()';
	          }
	          else $func='wait_less()';
		 $url="scripts/download.py?refid=".urlencode($refid)."&ver=".urlencode($list[2]);
		echo "<tr><td align='center'>".$list[1]." ".$list[2]."</td><td align='center'><a href='$url'><input type='button' value='Download' class='cow' onclick='$func' ></a></td></tr>";
		}
		echo "</table></div>";
	
	

}else echo "<h3 align='center'>No results found for $search</h3></div>";
}
else echo "<h3 align='center'>oops!! you Entered nothing</h3>";
?>



<?php
include_once('foot.php');
?>