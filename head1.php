<?php ob_start();
 //include_once('../includes/scripts/site_maintain.py');?>
<!DOCTYPE HTML>
<html>

<head>
  <title><?php echo $page_title; ?></title>
  <meta name="description" content="Download any software in ZIP" />
  <meta name="keywords" content="Download all Windows softwares" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <script type='text/javascript'>
  function notify()
   {
   	  var display=document.getElementById("status");
        display.style.backgroundColor="#fff1a8";
       display.innerHTML=" Your download will begin in 5 seconds.. ";
       
  setTimeout(function() {
    
     display.innerHTML="";
     display.style.backgroundColor="#fff";
  }, 5000);
   }
   
   function err()
    {
      alert('You Must LOG In First');
     	
    }
   </script>
  <?php 
  
       if($_SERVER['PHP_SELF']=='/index.py' || $_SERVER['PHP_SELF']=='/')
         {
            $style='style/style.css';       	
   	      }
         
   else
     {
     	 $style='../style/style.css';
     }
     ?>
  
  <link rel="stylesheet" type="text/css" href=<?php echo $style;?> title="style" />
  
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
	
 }
 
 a{text-decoratiom:none;}
 .cow:hover,.cow:focus,.cow:active{background-color:grey;
	
	border-color:#d8dfea ;
	border-width:1px;
	font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
	font-size:11px;
	margin:0 2px;
	padding:2px 7px;
	color:#fff;
	border-style:solid;
	cursor:pointer;
	
 }
 

 
 .dog 
   {
   	background:white;
   	border-style:none;
   	text-decoration:underline;
   	color:#1293EE;
   	font-size:.95em;
   }
   
   .dog:hover,.dog:focus,.dog:active
   {
   	background:white;
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
    
    
    
    
  </style>


<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="head1_files/css3menu1/style.css" type="text/css" />
<!-- End css3menu.com HEAD section -->

</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="http://localhost/"><span class="logo_colour">dlZIP</span></a></h1>
          <h4>montyScript</h4>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li <?php if(($_SERVER['PHP_SELF']=='/')||($_SERVER['PHP_SELF']=='/index.py'))echo "class='selected'";?>><a href="http://localhost/">Home</a></li>
          
          	<li <?php if($_SERVER['PHP_SELF']=='/index.py')echo "class=''";?>><a href='#'>Windows</a></li>
          
          	<li <?php if($_SERVER['PHP_SELF']=='/edit.py' || $_SERVER['PHP_SELF']=='/edit_info.py'|| $_SERVER['PHP_SELF']=='/edit_account.py' || $_SERVER['PHP_SELF']=='/signup.py' )echo "class='selected'";?>><?php if(isset($_SESSION['ndr']))echo "<a href='http://localhost/edit.py'>Edit</a></li>";
           else echo"<a href='http://localhost/signup.py'>Sign Up</a></li>";?>
          
             <li <?php if($_SERVER['PHP_SELF']=='/index.py')echo "class=''"; elseif($_SERVER['PHP_SELF']=='/profile.py')echo "class='selected'";?>><?php if(isset($_SESSION['ndr'])){echo "<a href='http://localhost/profile.py'>{$_SESSION['ndr']}</a></li>";}
              else echo"<a href='#'>Guest</a></li>";?>
         
                 <li <?php if($_SERVER['PHP_SELF']=='/login.py')echo "class='selected'";?> ><?php if(isset($_SESSION['ndr']) && !strpos($_SERVER['PHP_SELF'],'logout.py'))
				echo "<a href='http://localhost/logout.py'>Log out</a>";
			
					 else echo "<a href='http://localhost/login.py'>LogIn</a>";
			?></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <?php 
        if($_SERVER['PHP_SELF']=='/index.py' || $_SERVER['PHP_SELF']=='/login.py' || $_SERVER['PHP_SELF']=='/signup.py' || $_SERVER['PHP_SELF']=='/edit.py' || $_SERVER['PHP_SELF']=='/edit_info.py' || $_SERVER['PHP_SELF']=='/edit_account.py' || $_SERVER['PHP_SELF']=='/contactme.py' || $_SERVER['PHP_SELF']=='/profile.py'){
          include_once('../includes/scripts/sqlconnection.py');
          include_once('../includes/scripts/site_maintain.py');}
   else
     {
     	  include_once('../../includes/scripts/sqlconnection.py');
          include_once('../../includes/scripts/site_maintain.py');
     }
  $q="SELECT soft_name,soft_version,soft_category from software_info ORDER BY soft_downloads DESC LIMIT 7";
  $r=mysqli_query($dbc,$q) OR trigger_error(mysqli_error($dbc));
  //$row=mysqli_fetch_array($r);
  //$top=$row;
         ?>
        <h4><big>Top Downloads</big></h4>
        <ul>
        	<?php
        	while($top=mysqli_fetch_array($r))
            {  
				 $url="/scripts/browse.py?ctr=".urlencode($top[2])."&name=".urlencode($top[0]);
            	
        	 echo "<li><a href='$url'><input type='button' class= 'dog' value='{$top[0]} {$top[1]}' ></a></li>";
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
				 
				     $url1=$url="/scripts/browse.py?ctr=".urlencode($top1[2])."&name=".urlencode($top1[0]);
				
            	
            	
        	 echo "<li><a href='$url1'><input type='button' class= 'dog' value='{$top1[0]} {$top1[1]}' ></a></li>";
    	    }
        	?>
        </ul>
        
        
    
        <h4><big>Recently Downloaded</big></h4>
        <ul>
     <?php
        	  
			  $rt=mysqli_query($dbc,"SELECT soft_id from user_downloads order by down_dt desc LIMIT 7 ") OR trigger_error("query2error: profile.py".mysqli_error($dbc));
			  $num=mysqli_num_rows($rt);
			  if($num>0){
			  while($softid=mysqli_fetch_array($rt)) //select soft_id one by one and display their names+base_url from software_info table.
			  {	
			  $rx=mysqli_query($dbc,"SELECT soft_name,soft_version,soft_category from software_info where soft_id={$softid[0]}") OR trigger_error(mysqli_error($dbc));
			  
		?>
        
        
         <?php
        	while($topp=mysqli_fetch_array($rx))
            {  
				 
			 $url2="/scripts/browse.py?ctr=".urlencode($topp[2])."&name=".urlencode($topp[0]);
				            	
        	 echo "<li><a href='$url2'><input type='button' class= 'dog' value='{$topp[0]} {$topp[1]}' ></a></li>";
    	    }
	    } //end of while loop 
    }  //end of if loop 
    ?>
        </ul>
        
     </div>
     <div id="content">
     
     	
        <!-- insert the page content here -->
