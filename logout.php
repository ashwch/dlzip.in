<?php
session_start();
ob_start();
include('includes/scripts/site_maintain.php');
if(!isset($_SESSION['udr']))
	{
		$url=BASE_URL;
		HEADER("Location:$url");
		exit();
	}
else{
	$page_title="Log Out";
	unset($_SESSION['udr']);
    unset($_SESSION['ndr']);
    unset($_SESSION['edr']);
    unset($_SESSION['agent']);
    session_destroy();
    setcookie('Uid','',time()-3600);
        $url=BASE_URL;
		ob_end_clean();
		HEADER("Location:$url");
		exit();
    
    }


?>