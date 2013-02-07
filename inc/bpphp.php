<?php
   session_start();
   ini_set('display_errors', 0);
   error_reporting(~0);
   
   $webroot = "/home/tzaki/public_html/";
   
   //update page activity cookie for logged in users
   $expire_time = time()+900;
   if (isset($_COOKIE['loginexpire'])) {   
      //reset cookie due to activity
      setcookie('loginexpire', date("G:i a", $expire_time), $expire_time);
   }
?>