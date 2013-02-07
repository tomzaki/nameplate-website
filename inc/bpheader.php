<div class="boxstyle">
   <div class="header"></div>
   <div class="title">
      <ul>
         <li><?php echo($pagetitle);?></li>
         <?php $inout = isset($_SESSION['loggedin']); ?>
         <li><?php echo("<a href='/".($inout ? "logout" : "login").".php'>".($inout ? "Log Out" : "Log In")."</a>");?></li>
         <li><a href="/tools/">TOOLS</a></li>
         <li><a href="/~public/">FILES</a></li>
      </ul>
   </div>
   
   