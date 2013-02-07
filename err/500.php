<!DOCTYPE html>

<?php include("../inc/bpphp.php"); ?>

<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      
      <meta name="description" content="Authorization Required">
      <meta name="keywords" content=""> 
      <title>500 - Internal Server Error</title>
      <link rel="stylesheet" href="/css/style_res_content.css" type="text/css" media="screen">
      <link rel="icon" href="favicon.ico">      
   </head>

   <body>
      <?php $pagetitle="ERR: 500"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">
         <h2>Internal Server Error :(</h2><br>
         <p>
            Womp, look's like something's wrong over here on the server. 
            Sorry about that. An email has been sent* to the webmaster about
            this problem and hopefully it will be resolved soon. 
            <!--$$$ TODO: send email from this error page-->
            <br><br>
            You can <a href="/">click here</a> to go back to the main page.
            <span style="font-size: 75%; position: absolute; bottom: 40px; left: 40px;">*email hasn't been set up yet,
            so that's a lie... ssssh!</span>
         </p>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>