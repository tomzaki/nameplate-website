      <?php
         // Open the folder 
         $dir_handle = @opendir($path) or die("Unable to open $path"); 
         $dir_list = array(".","..");
         $file_list = array();
         // Loop through the files 
         while ($file = readdir($dir_handle)) { 
            if($file[0] == "." || $file == "index.php") continue; 
            if(is_dir($file)) array_push($dir_list, $file);
            else array_push($file_list, $file);
         }
         
         asort($dir_list);
         asort($file_list);
         
         echo("<table class='bottomBorder' cellpadding='5px'>
               <colgroup>
                  <col span='1' style='width:  50px;'>
                  <col span='1' style='width: 500px;'>
                  <col span='1' style='width: 200px;'>
                  <col span='1' style='width: 250px;'>
               </colgroup>
               <tr><th colspan='2'>Name</th><th>Size</th><th>Last Modified</th><tr>");
         foreach($dir_list as $key => $file) {
         
            $filename = (strlen($file) < 40 ) ? $file : substr($file, 0, 35)."... ".substr($file, strrpos($file, "."), strlen($file));
            $filesize = "";            
            $datemod  = date ("F d, Y", filemtime($file));
         
            echo "<tr><td><img src='http://64.121.112.21:8082/img/folder.png'></td>
                      <td><a href=\"$file\">$filename</a></td>
                      <td>$filesize</td>
                      <td>$datemod</td></tr>"; 
         }
         foreach($file_list as $key => $file) {
         
            $filename = $file;//(strlen($file) < 40 ) ? $file : substr($file, 0, 35)."... ".substr($file, strrpos($file, "."), strlen($file));
            $filesize = "";
            if(!is_dir($file)) {
               $filesize = filesize($file);
               $suffix   = array("B", "KB", "MB", "GB", "TB");
               $index = 0;
               while($filesize > 1000 && $index < 4){
                  $filesize /= 1000;
                  $index++;
               }
               $filesize = round($filesize,1).$suffix[$index];
            }
            
            $datemod  = date ("F d, Y", filemtime($file));
         
            echo "<tr><td><img src='http://64.121.112.21:8082/img/file.png'></td>
                      <td><a href=\"$file\">$filename</a></td>
                      <td>$filesize</td>
                      <td>$datemod</td></tr>"; 
         }
         echo("</table>");
         // Close 
         closedir($dir_handle); 
      ?>
   </body>
</html>