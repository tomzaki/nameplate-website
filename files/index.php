<!DOCTYPE html>

<!DOCTYPE html>

<?php include("../inc/bpphp.php"); ?>
<!--add this to make page secure-->
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
      <?php $pagetitle="File Browser"; include($webroot."inc/bpheader.php"); ?>
      <div class="content">  
         <div class="center">   
            <div class="title">
               <table class='bottomBorder' cellpadding='5px'>
                  <colgroup>
                     <col span='1' style='width:  50px;'>
                     <col span='1' style='width: 450px;'>
                     <col span='1' style='width: 200px;'>
                     <col span='1' style='width: 250px;'>
                  </colgroup>
                  <tr><th colspan='2'>Name</th><th>Size</th><th>Last Modified</th><tr>
               </table>
            </div>
            <div class="table">            
               <?php
                  // Define the full path to your folder from root                   
                  if(!isset($_GET['path'])) {
                     $path = '/home/public/public';
                  } else {
                     $path = $_GET['path'];
                     $path = '/home/public/public'.$path;
                  }
                  
                  //handle moving up a directory
                  if(strpos($path, '..')) {
                     $path = implode(explode('/', $path, -2), '/');
                  }
                  
                  $urlpath = str_replace("/home/public/public", "", $path);
                  $dlpath = str_replace("/home/public/public", "/~public", $path);

                  // Open the folder 
                  $dir_handle = @opendir($path) or die("<br>Unable to open selected file or directory"); 
                  $dir_list = array();
                  $file_list = array();
                  // Loop through the files 
                  while ($file = readdir($dir_handle)) {
                     if($file[0] == "." || $file == "index.php") continue; 
                     if(is_dir($path.'/'.$file)) array_push($dir_list, $file);
                     else array_push($file_list, $file);
                  }
                  
                  asort($dir_list); 
                  array_unshift($dir_list, "..");
                  asort($file_list);
                  
                  echo("<table class='bottomBorder' cellpadding='5px'> 
                        <colgroup>
                           <col span='1' style='width:  50px;'>
                           <col span='1' style='width: 450px;'>
                           <col span='1' style='width: 200px;'>
                           <col span='1' style='width: 250px;'>
                        </colgroup>");
                        //<tr><th colspan='2'>Name</th><th>Size</th><th>Last Modified</th><tr>");
                  foreach($dir_list as $key => $dir) {
                     $dirname = $dir;
                     $dirname_full = $path.'/'.$dir;    
                     $dirname_shrt = strlen($dir) < 30 ? $dir : substr($dir, 0, 30).'...';
                     $datemod = date ("F d, Y", filemtime($dirname_full));
                     
                     $href = strpos($dir, '..') !== false ? implode(explode('/', $urlpath.'/'.$dirname, -2), '/') : $urlpath.'/'.$dirname;
                     
                     echo "<tr><td><a href='?path=$href'><img src='/img/folder.png'></a></td>
                               <td><a href='?path=$href'>$dirname_shrt</a></td>
                               <td></td>
                               <td>$datemod</td></tr>"; 
                  } 
                  foreach($file_list as $key => $file) {
                  
                     $path_data = pathinfo($file);
                     $filename = strlen($file) < 30 ? $file : substr($file, 0, 25)."... .".$path_data['extension'];
                     $filename_full = $path.'/'.$file;

                     //calculate file size        
                     $filesize = filesize($filename_full);
                     if($filesize < 0) {
                        $filesize = ">2GB";
                     } else {
                        $suffix = array("B", "KB", "MB", "GB");
                        $index = 0;
                        while($filesize > 1000 && $index < 3){
                           $filesize /= 1000;
                           $index++;
                        }
                        $filesize = round($filesize,1).$suffix[$index];
                     }
                  
                     $datemod  = date ("F d, Y", filemtime($filename_full)); 
                  
                     echo "<tr><td><a href='$dlpath/$file'><img src='/img/file.png'></a></td>
                               <td><a href='$dlpath/$file'>$filename</a></td>
                               <td>$filesize</td>
                               <td>$datemod</td></tr>"; 
                  }
                  echo("</table>");
                  // Close 
                  closedir($dir_handle); 
               ?>
            </div>
         </div>      
      </div>      
      <?php include($webroot."inc/bpfooter.php");?>
   </body>
</html>
