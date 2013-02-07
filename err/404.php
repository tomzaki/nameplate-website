<!DOCTYPE html>

<?php include("../inc/bpphp.php"); ?>

<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      
      <meta name="description" content="Authorization Required">
      <meta name="keywords" content=""> 
      <title>404 - File Not Found</title>
      <link rel="stylesheet" href="/css/style_res_content.css" type="text/css" media="screen">
      <link rel="icon" href="favicon.ico">      
   </head>

   <body>
      <?php $pagetitle="ERR: 404"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">
         <h2>File Not Found :(</h2><br>
         <p>
            Hmm, looks like the page you were trying to reach was either
            removed or does not exist. Please <a href="mailto:zakatk857@gmail.com">
            contact the webmaster</a> if you were expecting something to be here.
         <br><br>
            You can <a href="/">click here</a> to go back to the main page.
         </p>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>