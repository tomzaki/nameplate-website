<!DOCTYPE html>

<?php include("../inc/bpphp.php"); ?>

<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      
      <meta name="description" content="">
      <meta name="keywords" content=""> 
      <title>Tom Zaki</title>
      <link rel="stylesheet" href="/css/style_res_content.css" type="text/css" media="screen">
      <link rel="icon" href="favicon.ico">      
   </head>

   <body>
      <?php $pagetitle="Tools"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">         
         <h2>Electrical Engineering Design Tools</h2><br>
         <?php 
            //database variables for login
            include($webroot."cfg/mySQLconfig.php");
            //connect to the MySQL server
            mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
            //select database
            mysql_select_db($mySQL_db) or die(mysql_error());
            
            $table_data = mysql_query("SELECT * FROM eetools")
                          or die(mysql_error());
            
            while($row_data = mysql_fetch_array($table_data)){
               echo("<h3><a href='".$row_data['url']."'>".$row_data['name']."</a></h3><br>".
                    "<p>".$row_data['desc']."</p><br><br>");
            } 
         ?>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>