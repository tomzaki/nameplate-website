<!DOCTYPE html>

<?php include("inc/bpphp.php"); ?>

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
      <?php $pagetitle="Register"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">
         <h2>
         <?php //validation script 
            if(isset($_POST["username"]) && isset($_POST["password"])){ 
               
               if (!ereg("^[A-Za-z0-9]", $_POST['username'])) {
                  echo("<span style='color: #993300;'>Invalid characters in username. 
                        Please use only letters and numbers and try again.</span>");
               } elseif(strlen($_POST['username']) < 4) {
                  echo("<span style='color: #993300;'>Must have at least four characters
                        in your username. Try again.</span>");
               } else {
                                 
                  //database variables for login
                  include($webroot."cfg/mySQLconfig.php");
                  //connect to the MySQL server
                  mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
                  //select database
                  mysql_select_db($mySQL_db) or die(mysql_error());
                  
                  $username = mysql_real_escape_string($_POST["username"]);
                  $email = mysql_real_escape_string($_POST["email"]);
                  $password = hash("sha256", $_POST["password"]);
                  
                  //$$$ todo: set up email verification of account creation,
                  //    related: forgot password tool via email
                  
                  $sql = "SELECT id FROM members WHERE username = '$username'";
                  $result = mysql_query($sql) or die(mysql_error());
               
                  if(mysql_num_rows($result) == 1) {
                     //found a match, username already exists in database
                     // $$$ - todo: forgot password tool
                     echo("Sorry, this username already exists. Try another one.");
                  } else if (mysql_num_rows($result) > 1) {
                     //something fishy is going on cause multiple rows matched.
                     //maybe notify sysadmin by email?
                     // $$$ - todo: make mailer function to simplify sending emails
                  } else {
                     //username doesn't match anything in the database, ok to add
                     $sql = "INSERT INTO members (username, password, email)
                             VALUES ('$username', '$password', '$email')";
                     $result = mysql_query($sql) or die(mysql_error());
                     echo("New account successfully created!");
                  }
               }
            } else {
               echo("Enter your desired username and password:");
            }
         ?></h2>
         <form action="register.php" method="post">
            Username:<br><input type="text" name="username" required><br><br>
            Email:<br><input type="text" name="email" required><br><br>
            Password:<br><input type="password" name="password" required><br><br>      
            <input type="submit" value="Register">
         </form>
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>  
  
<html>
