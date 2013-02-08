<?php
//session must be started, verify that it was started
//  before calling this script.
if (!isset($_SESSION['loggedin'])) {

   if (isset($_COOKIE['logindata'])) {
      //database variables for login
      include($webroot."cfg/mySQLconfig.php");
      //connect to the MySQL server
      mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
      //select database
      mysql_select_db($mySQL_db) or die(mysql_error());
      
      $username  = $_COOKIE['logindata']['username'];
      $series_id = $_COOKIE['logindata']['series_id'];
      $token     = $_COOKIE['logindata']['token'];
      
      //$$$debug
      //echo("username: $username<br>".
      //     "series_id: $series_id<br>".
      //     "token: $token<br><br>");
      
      $sql = "SELECT id FROM members WHERE 
              username  = '$username' AND
              series_id = '$series_id' AND
              token     = '$token'";
      $result = mysql_query($sql) or die(mysql_error());

      if(mysql_num_rows($result) == 1) {
      
         //success, typical login stuff:
         
         $salt = date("F"); // use full month string as salt                     
         $_SESSION['loggedin'] = hash("sha256",$username.$password.$salt); 
         
         //Log out after 15 minutes with no activity 
         setcookie('loginexpire', date("G:i - d/m/y", $expire_time), $expire_time); 
      
         //update token
         $token = hash("sha256", date("G:i"));
         $sql = "UPDATE members 
                 SET token = '$token'
                 WHERE username = '$username'";
         $result = mysql_query($sql) or die("oops".mysql_error());
         setcookie('logindata[token]', $token, $forever);
      }
   } else {
      header("Location: /err/401.php");
      exit;
   }
} else {
	// $$$ the session variable exists - any further checks required?
   //     we *could* query the db again, but that's like logging in
   //     every time you open a page. seems unnecessary. Look into
   //     this later.
   //
   
   if (!isset($_COOKIE['loginexpire'])) {
      header("Location: /logout.php");
      exit;
   }
}
?>