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
      <?php $pagetitle="RESISTOR GAIN"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">
         <div class="left">                
               <?php include("resistorgaincalcscript.php"); ?>
         </div>
         <div class="right">
            <table style="box-shadow: none;">
               <colgroup>
                  <col span="1" style="width: 250px;">
               </colgroup>
               <tr><td style="vertical-align: top;">
                  <form method="post">
                  
                  <?php 
                     $gain   = isset($_POST['gain'])   ? $_POST['gain']   : "100"; 
                     $thresh = isset($_POST['thresh']) ? $_POST['thresh'] : "5";
                     $r1l    = isset($_POST['r1l'])    ? $_POST['r1l']    : "0";
                     $r1h    = isset($_POST['r1h'])    ? $_POST['r1h']    : "999";
                     $tol    = isset($_POST['tol'])    ? $_POST['tol']    : "E48";
                     $inv    = isset($_POST['inv'])    ? $_POST['inv']    : 1;
                     echo("
                     Op Amp Configuration:<br><select type='text' name='inv'>
                        <option value=1".(($inv == 1) ? " selected" : "").">Non-Inverting</option>
                        <option value=0".(($inv == 0) ? " selected" : "").">Inverting</option>
                     </select><br><br>
                     Gain:<br>              <input  type='text' size='5' name='gain'   value=$gain><br><br>
                     Gain Threshold(%):<br> <input  type='text' size='5' name='thresh' value=$thresh><br><br>
                     R1 Low:<br>            <input  type='text' size='5' name='r1l'    value=$r1l><br><br>
                     R1 High:<br>           <input  type='text' size='5' name='r1h'    value=$r1h><br><br>      
                  
                     Resistor Tolerance:<br><select type='text' name='tol'>
                        <option value='E6'".  (!strcmp($tol,"E6")   ? " selected" : "").">20%</option>
                        <option value='E12'". (!strcmp($tol,"E12")  ? " selected" : "").">10%</option>
                        <option value='E24'". (!strcmp($tol,"E24")  ? " selected" : "").">5%</option>
                        <option value='E48'". (!strcmp($tol,"E48")  ? " selected" : "").">2%</option>
                        <option value='E96'". (!strcmp($tol,"E96")  ? " selected" : "").">1%</option>
                        <option value='E192'".(!strcmp($tol,"E192") ? " selected" : "").">0.5%</option>
                     </select><br><br>
                     ");
                  ?>
                     <input type="submit" value="Calculate" onclick="calc()"><br>
                  </form>
            </table>
         </div>  
      </div>
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
  
</html>