<!DOCTYPE html>
<!--webroot is defined in here so this path must be explicitly written-->
<?php include("inc/bpphp.php"); ?>
<!--add this to make mage secure-->
<?php include($webroot."inc/checklogin.php"); ?>

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
      <?php $pagetitle="PAGE TITLE"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">
         <h2>Section Heading 1</h2><a name="Section-Heading1"></a><br>
            <p>
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. <a href="#Sub-Heading3">paragraph text. </a>paragraph text. 
               paragraph text. paragraph text. paragraph text. paragraph text.
            </p>
         <h2>Section Heading 2</h2><a name="Section-Heading2"></a><br>
            <h3>Sub-Heading 1</h3><a name="Sub-Heading1"></a><br>     
            <p>
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. <a href=" ">paragraph text. </a>paragraph text. 
               paragraph text. paragraph text. paragraph text. paragraph text.
            </p><br><br>
            <h3>Sub-Heading 2</h3><a name="Sub-Heading2"></a><br>         
            <p>
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. <a href=" ">paragraph text. </a>paragraph text. 
               paragraph text. paragraph text. paragraph text. paragraph text.
            </p><br><br>
            <h3>Sub-Heading 3</h3><a name="Sub-Heading3"></a><br>         
            <p>
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. paragraph text. paragraph text. paragraph text.
               paragraph text. <a href=" ">paragraph text. </a>paragraph text. 
               paragraph text. paragraph text. paragraph text. paragraph text.
            </p>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>