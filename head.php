<?php ob_start();
 include_once('includes/scripts/site_maintain.php');
 /* banned ip
 $ippp=$_SERVER['REMOTE_ADDR'];
        	$ip_longgg=(integer)(ip2long($ippp));
    
  if($ip_longgg>=3024879616 && $ip_longgg<=3024945151)      	
      { $ban='http://www.facebook.com/DLzip';
     Header("Location:$ban");
     exit();
   }
  */ 
 // $go_to='http://www.dlzip.in'; 
//  header("Location:$go_to"); 
   
 ?>
 
 
<!DOCTYPE html>
    <html><head>
  <title><?php echo $page_title; ?></title>
  <link REL="SHORTCUT ICON" Href='<?php echo BASE_URL."/favicon.ico'";?>>
  <meta name="description" content="Download any popular software in ZIP Format" >
  <meta name="keywords" content="Internet Browsers,Media players,Antivirus,Programming Tools" >
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" >
  
  <meta property="og:title" content="DLZIP.in | Download Any software in Zip format" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://DLzip.in" />
<meta property="og:image" content="http://dlzip.in/scripts/logo.gif" />
<meta property="og:site_name" content="DLZIP.in" />
<meta property="fb:admins" content="831359885" />
 
  <?php 
  
       if($_SERVER['PHP_SELF']=='/index.php' || $_SERVER['PHP_SELF']=='/')
         {
            $style='style/style.css';       	
   	      }
         
   else
     {
     	 $style='../style/style.css';
     }
     ?>
  
  <link rel="stylesheet" type="text/css" href=<?php echo $style;?> title="style" />
  
  
  <script type='text/javascript'>
    var Muscula = Muscula || {};
    Muscula.settings = {
        logId: 1095
    };
    (function () {
        var m = document.createElement('script'); m.type = 'text/javascript'; m.async = true;
        m.src = (window.location.protocol == 'https:' ? 'https:' : 'http:') +
            '//musculahq.appspot.com/Muscula.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(m, s);
        Muscula.run = function (s) { eval(s); Muscula.run = function () { }; };
    })();
</script>
  
  <style type='text/css'>
  .fieldset{background-color:rgb(240,239,226);padding:20px;}
  .cow{background-color:#3b5998;
  	text-decoration:none;
	border-color:#d8dfea ;
	border-width:1px;
	font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
	font-size:11px;
	margin:0 2px;
	padding:2px 7px;
	color:#fff;
	border-style:solid;
	font-weight:bold;
	
 }
 
 a{text-decoratiom:none;}
 .cow:hover,.cow:focus,.cow:active{background-color:grey;
	
	border-color:#d8dfea ;
	border-width:1px;
	font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
	font-size:11px;
	margin:0 2px;
	padding:2px 7px;
	color:black;
	font-weight:bold;
	border-style:solid;
	cursor:pointer;	
 } 
 .dog 
   {
   	background:white;
   	border-style:none;
   	text-decoration:none;
   	color:#1293EE;
   	font-size:.95em;
   }   
   .dog:hover,.dog:focus,.dog:active
   {
   	background:#cdcdcd;
   	border-style:none;
   	text-decoration:none;
   	color:#1293EE;
   	cursor:pointer;
   }  
 .profile{
   color:black;
   font-weight:bold;	
   margin-left:140px;
   text-align:center;
  }
  .profile-1
    {
    
     font-weight:bold;	
     margin-left:15px;
     text-align:;
    }
    
  input:focus, textarea:focus{outline:none;
background-color:#FAFFBD;
}

#search_box
{
 height:28px;
 border:none;
 width:150px;
 padding:1px;	
 border: 1px solid black;
}
#search_box:hover,#search_box:focus,#search_box:active
{
  border: 1px solid red;
  font-weight:bold;
}
 
 .top_bar_style   
 {
 height:16px;line-height:16px;
 }    



.overgrey:hover,.overgrey:focus,.overgrey:active {   
background:#DCDCDC;
text-decoration:none;
cursor:pointer;

}
.overgrey:hover .dog ,.overgrey:focus .dog,.overgrey:active .dog {   
background:#DCDCDC;
text-decoration:none;

}
.hideme{display:none}


  </style>





<script src="<?php echo BASE_URL.'/includes'?>/javascript/jscript.js" type='text/javascript'></script>
<link rel='stylesheet' href='<?php echo BASE_URL."/style/stylee.css'";?> type='text/css' />
<!-- End css3menu.com HEAD section -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25141280-1']);
  _gaq.push(['_setDomainName', 'dlzip.in']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>
<?php if(!isset($_SESSION['ndr']))
	{
       $current_url=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
       $redirect=urlencode($current_url);
    } ?> 
</head>
<body>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div id="main">
  
    <div id="header">
      
      <div id="menubar">
      	<div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href='<?php echo BASE_URL;?>'><span class="logo_colour">dlZIP</span></a></h1>
          </div>
      </div>
        <ul id="css3menu1" class="topmenu">
        <li class="topmenu"><form name='search' action='<?php ECHO BASE_URL?>/search.py?' ><input type='text' id='search_box' name='q' placeholder='search'></input><input class='cow' type='submit' value='search'></input></form></li>    	
	<li class="topmenu"><a href="/index.py" class='top_bar_style'>HOME</a></li>
	<li class="topmenu"><a href="#"  class="top_bar_style"><span>CATEGORY</span></a>
	<ul>
	        
		<li class="subfirst"><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=torrent' title="">Torrent Clients</a></li>
		<li><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=ptools' title="">Programming Tools</a></li>
		<li><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=systemtune' title="">System Tuning</a></li>
		<li><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=compilers' title="">Compilers&Interpreters</a></li>
		<li><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=mplayers' title="">Media Players</a></li>
		<li><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=inetbrowsers' title="">Internet Browsers</a></li>
		<li><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=chat' title="">Chat Clients</a></li>
		<li class="sublast"><a href='<?php echo BASE_URL."/";?>showcategory.py?ctr=images' title="">Image Viewers&Editors</a></li>
	</ul>
	

	</li>
	
	<li class="topmenu"><?php if(!isset($_SESSION['ndr'])){echo "<a href='";echo BASE_URL."/signup.py'"; echo " class='top_bar_style'>SIGN UP</a></li>";}
              else echo"<a href='".BASE_URL."/edit.py'"; echo " class='top_bar_style'>		
		<span>EDIT</span></a>
	<ul>
		<li class='subfirst'><a href='";echo BASE_URL."/edit_info.py'"; echo ">Profile
		<li class='sublast'><a href='";echo BASE_URL."/edit_account.py'"; echo ">Password</a></li>
	</ul>
     ";?>
	</li>
	<li class="topmenu"><?php if(isset($_SESSION['ndr'])){echo "<a href='";echo BASE_URL."/profile.py'"; echo " class='top_bar_style'>{$_SESSION['ndr']}";}
              else echo"<a href='javascript:;' style='height:16px;line-height:16px;'>GUEST";?></a></li>
	<li class="topmenu"><?php if(isset($_SESSION['ndr'])){echo "<a href='";echo BASE_URL."/logout.py'"; echo " class='top_bar_style'>LOG OUT";}
              else { if(($_SERVER['PHP_SELF']!="/index.py"))
                       {echo"<a href='";echo BASE_URL."/login.py'"; echo " class='top_bar_style'>LOG IN";}
                       else {           
	         echo"<a href='";echo BASE_URL."/login.py'"; echo " class='top_bar_style'>LOG IN";}}?></a></li>
</ul>
        </ul>
      </div>
     <img src='/images/main.jpg' height='130' width='237' title='dlzip logo' alt='error'>
     <br />
     <script type="text/javascript"><!--
google_ad_client = "ca-pub-5271879033668536";
/* dlzip_side */
google_ad_slot = "1788303284";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

     </div>
    <div id="site_content">
   
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <?php 
        if($_SERVER['PHP_SELF']=='/index.php' || $_SERVER['PHP_SELF']=='/login.php' || $_SERVER['PHP_SELF']=='/signup.php' || $_SERVER['PHP_SELF']=='/edit.php' || $_SERVER['PHP_SELF']=='/edit_info.php' || $_SERVER['PHP_SELF']=='/edit_account.php' || $_SERVER['PHP_SELF']=='/contactme.php' || $_SERVER['PHP_SELF']=='/profile.php' || $_SERVER['PHP_SELF']=='/showcategory.php' || $_SERVER['PHP_SELF']=='/showall.php' || $_SERVER['PHP_SELF']=='/activation.php' || $_SERVER['PHP_SELF']=='/search.php' ){
         
          include_once('includes/scripts/sqlconnection.php');
          include_once('includes/scripts/site_maintain.php');}
   else
     {
     	  include_once('../includes/scripts/sqlconnection.php');
          include_once('../includes/scripts/site_maintain.php');
     }
  $q="SELECT soft_name,soft_version,soft_category from software_info ORDER BY soft_downloads DESC LIMIT 7";
  $r=mysqli_query($dbc,$q) OR trigger_error(mysqli_error($dbc));
  //$row=mysqli_fetch_array($r);
  //$top=$row;
         ?>
         
         <ul>
         <li>
         <div class="fb-like" data-href="https://www.facebook.com/pages/Dlzipin/152790538138555" data-send="false" data-layout="button_count" data-width="70" data-show-faces="true" data-font="lucida grande"></div>
         </li
         
         </ul>
        
        <h4><big>Top Downloads</big></h4>
        <ul>
        	<?php
        	while($top=mysqli_fetch_array($r))
            {  
				 $url=BASE_URL."/scripts/browse.py?ctr=".urlencode($top[2])."&name=".urlencode($top[0]);
            	
        	 echo "<li class='overgrey'><a href='$url'><input type='button' class= 'dog' value='{$top[0]} {$top[1]}' ></a></li>";
    	    }
        	?>
        	
        	<?php
        	  
			  $q1="SELECT soft_name,soft_version,soft_category from software_info ORDER BY soft_add_date DESC LIMIT 7";
			  $r1=mysqli_query($dbc,$q1) OR trigger_error(mysqli_error($dbc));
			  //$row=mysqli_fetch_array($r);
			  //$top=$row;
         ?>
        	
        	
        </ul>					
        <h4><big>Latest Uploads</big></h4>
        <ul>
         <?php
        	while($top1=mysqli_fetch_array($r1))
            {  
				 
				     $url1=BASE_URL."/scripts/browse.py?ctr=".urlencode($top1[2])."&name=".urlencode($top1[0]);
				
            	
            	
        	 echo "<li class='overgrey'><a href='$url1'><input type='button' class= 'dog' value='{$top1[0]} {$top1[1]}' ></a></li>";
    	    }
        	?>
        </ul>
        
        
    
        <h4><big>Recently Downloaded</big></h4>
        <ul>
     <?php
        	  
			  $rt=mysqli_query($dbc,"SELECT DISTINCT soft_id from user_downloads order by down_dt desc LIMIT 7 ") OR trigger_error("query2error: profile.php".mysqli_error($dbc));
			  $num=mysqli_num_rows($rt);
			  if($num>0){
			  while($softid=mysqli_fetch_array($rt)) //select soft_id one by one and display their names+base_url from software_info table.
			  {	
			  $rx=mysqli_query($dbc,"SELECT soft_name,soft_version,soft_category from software_info where soft_id={$softid[0]}") OR trigger_error(mysqli_error($dbc));
			  
		?>
        
        
         <?php
        	while($topp=mysqli_fetch_array($rx))
            {  
				 
			 $url2=BASE_URL."/scripts/browse.py?ctr=".urlencode($topp[2])."&name=".urlencode($topp[0]);
				            	
        	 echo "<li class='overgrey'><a href='$url2'><input type='button' class= 'dog' value='{$topp[0]} {$topp[1]}' ></a></li>";
    	    }
	    } //end of while loop 
    }  //end of if loop 
    ?>
        </ul>
        
     </div>
     <div id="content">
     
     	
        <!-- insert the page content here -->