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
      <?php //$$$ - TODO: recall this data from a database ?>
      <div class="content">
         <h2>Electrical Engineering Design Tools</h2><br>
            <h3><a href="resistorgaincalc.php">Resistor Gain Tool</a></h3><br>     
            <p>
               Helps determine the best ratio of
               <a href="http://en.wikipedia.org/wiki/Preferred_number#E_series">standard-valued</a>
               resistors for achieving a desired gain. Takes into account a variety of helpful
               user-specified constraits.   
               <br><br>
               <i>Note: There is a known sorting bug in this applicaiton. The results are first sorted by
               &Delta; and then by R1. The sorting is </i>almost<i> perfect, but for some reason
               the last item in the list is always out of place. As far as I can tell this is a
               bug with php5's usort function and not my &Delta; comparison function.</i>
            </p><br><br>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>