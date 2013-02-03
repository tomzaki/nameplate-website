<!DOCTYPE html>

<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      
      <meta content="hello world." name="description">
      <title>Tom Zaki</title>
      <link rel="stylesheet" href="css/style_res_index.css" type="text/css" media="screen">
      <link rel="icon" href="favicon.ico">      
      
      <!--Konami Code-->
      <script type="text/javascript" src="https://raw.github.com/snaptortoise/konami-js/master/konami.js"></script>
      <script type="text/javascript">
         var konami = new Konami('http://64.121.112.21:8082/~public');  
      </script>
      
   </head>

   <body>  
   
      <!--Dynamic Icon Lables-->
      <script type="text/javascript">
         function show_text(id, text) {
            document.getElementById(id).innerHTML = text;
         }
         function hide_text(id) {
            document.getElementById(id).innerHTML = '';
         }
      </script>

      <!--Page Content-->
      <div class="container">
         <div class="banner"></div>
         <div class="content">
            <div class="name">
               Tom<br>Zaki
            </div>
            <div class="socialmedia">
               <div id="addr_text"></div>
               <ul>
                  <li>                     
                     <a href="http://www.facebook.com/tom.zaki" target="_blank">
                        <img
                           src="img/facebook.png"
                           alt="www.facebook.com/tom.zaki"
                           onmouseover="show_text('addr_text', 'facebook')"
                           onmouseout="hide_text('addr_text')">
                     </a>
                  </li>
                  <li>
                     <a href="http://www.linkedin.com/in/tomzaki" target="_blank">
                        <img
                           src="img/linkedin.png"
                           alt="http://www.linkedin.com/in/tomzaki"
                           onmouseover="show_text('addr_text', 'linkedin')"
                           onmouseout="hide_text('addr_text')">
                     </a>
                  </li>
                  <li>
                     <a href="http://www.reddit.com/u/omgasquirrel" target="_blank">
                        <img
                           src="img/reddit.png"
                           alt="http://www.reddit.com/u/omgasquirrel"
                           onmouseover="show_text('addr_text', 'reddit')"
                           onmouseout="hide_text('addr_text')">
                     </a>
                  </li>
                  <li>
                     <a href="https://github.com/tomzaki" target="_blank">
                        <img
                           src="img/git.png"
                           alt="https://github.com/tomzaki"
                           onmouseover="show_text('addr_text', 'github')"
                           onmouseout="hide_text('addr_text')">
                     </a>                     
                  </li>
                  <li>
                     <a href="http://www.last.fm/user/tomzaki" target="_blank">
                        <img
                           src="img/lastfm.png"
                           alt="www.last.fm/user/tomzaki"
                           onmouseover="show_text('addr_text', 'last.fm')"
                           onmouseout="hide_text('addr_text')">
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      
      
      <!--Google Analytics-->
      <?php include_once("analyticstracking.php") ?>
      
   </body>
</html>