<!DOCTYPE html>

<?php include("../inc/bpphp.php"); ?>

<html lang="en">
   <head> 
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      
      <meta name="description" content="Authorization Required">
      <meta name="keywords" content=""> 
      <title>401 - Authorization Required</title>
      <link rel="stylesheet" href="/css/style_res_content.css" type="text/css" media="screen">
      <link rel="icon" href="favicon.ico">      
   </head>

   <body>
      <?php $pagetitle="ERR: 401"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">
         <h2>Authorization Required!</h2><br>
         <p>
            Access is restricted beyond this point. Please <a href="mailto:zakatk857@gmail.com">contact the
            webmaster</a> if you are having trouble
            <a href="/login.php">logging in</a>.
         <br><br>
            You can <a href="/">click here</a> to go back to the main page.
         </p>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>