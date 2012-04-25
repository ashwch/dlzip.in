<?php
session_start();

$page_title="Home";

include('head.php');


?>

        <h1>Welcome to dlZIP</h1>
        <p<strong>Here you can download any software in a much safer ZIP format...</strong></p>
        <?php
        if(isset($_SESSION['udr']))
        {$name_user=strtoupper($_SESSION['ndr']);
        
        echo "Welcome, $name_user";}
        else
        echo "<a href='login.py' style='text-decoration:none'>LOGIN</a> TO enable faster Downloads.<br />"; 
        ?>
           <br />
           
        
        <br />
        <h2 align='center'>Categories</h2>
        <div id='Categories' align='center'>
        	
        	<?php
        	
        	 $q_inetbrowsers="SELECT  soft_name,soft_category,soft_version from software_info group by soft_name
                              having software_info.soft_category='inetbrowsers' order by rand() LIMIT 4";  
            $r_inetbrowsers=mysqli_query($dbc,$q_inetbrowsers) OR trigger_error("r_inetbrowsers".mysqli_error($dbc));                                    
            ?>

             
            <?php
        	
        	 $q_mplayers="SELECT soft_name,soft_category,soft_version from software_info group by soft_name
                              having software_info.soft_category='mplayers' order by rand() LIMIT 4";  
            $r_mplayers=mysqli_query($dbc,$q_mplayers) OR trigger_error("r_mplayers".mysqli_error($dbc));                                    
            ?>  
                    	
                
            <?php
        	
        	 $q_ptools="SELECT soft_name,soft_category,soft_version from software_info group by soft_name
                              having software_info.soft_category='ptools' order by rand() LIMIT 4";  
            $r_ptools=mysqli_query($dbc,$q_ptools) OR trigger_error("r_ptools".mysqli_error($dbc));                  
            ?>  
             <?php
        	
        	 $q_torrent="SELECT soft_name,soft_category,soft_version from software_info group by soft_name
                              having software_info.soft_category='torrent' order by rand() LIMIT 4";  
            $r_torrent=mysqli_query($dbc,$q_torrent) OR trigger_error("r_torrent".mysqli_error($dbc));                  
            ?>  
            
            <?php
             $q_compilers="SELECT soft_name,soft_category,soft_version from software_info group by soft_name
                              having software_info.soft_category='compilers' order by rand() LIMIT 4";  
            $r_compilers=mysqli_query($dbc,$q_compilers) OR trigger_error("r_torrent".mysqli_error($dbc));                  
            ?>  
            
              <?php
             $q_images="SELECT soft_name,soft_category,soft_version from software_info group by soft_name
                              having software_info.soft_category='images' order by rand() LIMIT 4";  
            $r_images=mysqli_query($dbc,$q_images) OR trigger_error("r_torrent".mysqli_error($dbc));                  
            ?>  
        	
        	
        	<table><tr><th ><a href='showcategory.py?ctr=inetbrowsers' style='color:white'>Internet Browsers</a></th><th><a href='showcategory.py?ctr=mplayers' style='color:white'>Media Players</a></th><th ><a href='showcategory.py?ctr=torrent' style='color:white'>Torrent Clients</a></th></tr>
        	<tr>
        		<td><ul><?php while($res_inet=mysqli_fetch_array($r_inetbrowsers)){ echo"<li><a href='/scripts/browse.py?ctr=".urlencode($res_inet[1])."&name=".urlencode($res_inet[0])."'>{$res_inet[0]}</a></li>";}?></td>
        	
				<td><ul><?php while($res_mplayers=mysqli_fetch_array($r_mplayers)){ echo"<li><a href='/scripts/browse.py?ctr=".urlencode($res_mplayers[1])."&name=".urlencode($res_mplayers[0])."'>{$res_mplayers[0]}</a></li>";}?></td>
			
					<td><ul><?php while($res_torrent=mysqli_fetch_array($r_torrent)){ echo"<li><a href='/scripts/browse.py?ctr=".urlencode($res_torrent[1])."&name=".urlencode($res_torrent[0])."'>{$res_torrent[0]}</a></li>";}?></td>
        				
        	</tr>
        	
        	<tr><th><a href='showcategory.py?ctr=compression' style='color:white'>Compression</a></th><th><a href='showcategory.py?ctr=ptools' style='color:white'>Programming Tools</a></th><th><a href='showcategory.py?ctr=antivirus' style='color:white'>Antivirus and Security</a></th></tr>	
        	<tr><td><ul><li><a href='#'>7-zip</a></li><li><a href='#'>WinRar</a></li><li><a href='#'>WinZip</a></li></td><td><ul><?php while($res_ptools=mysqli_fetch_array($r_ptools)){ echo"<li><a href='/scripts/browse.py?ctr=".urlencode($res_ptools[1])."&name=".urlencode($res_ptools[0])."'>{$res_ptools[0]}</a></li>";}?></td><td><ul><li><a href='#'>Eset NOD32</a></li><li><a href='#'>Avira Antivirus</a></li><li><a href='#'>Kaspersk</a></li></td></tr>		
        	
        	<tr><th>Chat Clients</th><th><a href='showcategory.py?ctr=images' style='color:white'>Image Viewers&Editors </a></th><th>Office</th></tr>	
        	<tr><td><ul><li><a href='#'>Gtalk</a></li><li><a href='#'>Skype</a></li><li><a href='#'>Win Live Messenger</a></li></td><td><ul><li><a href='#'>Picasa</a></li><li><a href='#'>Paint.NET</a></li><li><a href='#'>iView</a></li></td><td><ul><li><a href='ooo.php'>Open Office.org</a></li><li><a href='#'>Adobe Reader</a></li><li><a href='#'>Foxit reader</a></li></td></tr>			
        	
        	<tr><th><a href='showcategory.py?ctr=compilers' style='color:white'>Compilers & Interpreters</a></th><th>Image Viewers&Editors </th><th><a href='showcategory.py?ctr=office' style='color:white'>Office</a></th></tr>	
        	<tr>
        		<td>
        			<ul><?php while($res_compilers=mysqli_fetch_array($r_compilers)){ echo"<li><a href='/scripts/browse.py?ctr=".urlencode($res_compilers[1])."&name=".urlencode($res_compilers[0])."'>{$res_compilers[0]}</a></li>";}?>
        				
        			</td>
        			<td>
        				<ul><?php while($res_images=mysqli_fetch_array($r_images)){ echo"<li><a href='/scripts/browse.py?ctr=".urlencode($res_images[1])."&name=".urlencode($res_images[0])."'>{$res_images[0]}</a></li>";}?>
        				
        			</td>
        			<td>
        				<ul><li><a href='#'>Open Office.org</a></li><li><a href='#'>Adobe Reader</a></li><li><a href='#'>Foxit reader</a></li></td></tr>				
        			
        	</table>
        	<p align=''right><a href='showall.py'>See more Categories >>></a></p>	
        	     <script type="text/javascript"><!--
google_ad_client = "ca-pub-5271879033668536";
/* dlzip */
google_ad_slot = "8627250562";
google_ad_width = 120;
google_ad_height = 240;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
        	<p>
        	<?php  
        	//echo $_SERVER['REMOTE_ADDR'];
        	//$ip_longg=(integer)(ip2long($ipp));
        	//echo ip2long('180.76.0.0')."<br />".ip2long('180.76.255.255')."<br/>".$ip_longg;;       	 ?>
        	</p>
        	       </div>    		 	
        	
        
<?php include('foot.php')?>