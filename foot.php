    
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Monty | <a href="http://www.google.co.in/search?aq=f&cx=c&ie=UTF-8&q=dlzip.in" target='_blank'>Google</a> | <a href="http://www.bing.com/search?q=dlzip.in&go=&qs=n&sk=&form=QBLH&filt=all" target='_blank'>Bing</a> | <a href='<?php echo BASE_URL."/contactme.py'"?> style='color:red' title='Shoot an Email'>Contact Us</a> | <a href='#' title='back to Top'>TOP</a>
    </div>
  </div>
 
</body>
</html>
<?php ob_end_flush();
if(isset($dbc)){mysqli_close($dbc);}
?>