<?php 

session_start();
ob_start();
include('includes/scripts/site_maintain.php') ;

if(!isset($_SESSION['ndr']) && ($_SESSION['adr']!=md5($_SERVER['HTTP_USER_AGENT'])))
	{
	  $url=BASE_URL."/";
	  ob_end_clean();
	  HEADER("Location:$url");
	  exit;	
	}
?>
<?php 
$page_title="Edit Account";
include('head.php');?>

	<ul><li><a href='edit_info.py'>Edit Info</a></li>
		<li><a href='edit_account.py'>Change Password</a>	
		</li>
		</ul>

<?php include('foot.php')?>