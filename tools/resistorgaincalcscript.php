<?php
// Given POST data for the following variables, this code will calculate
//   a set of optimal resistor choices for a desired gain, taking into
//   account a handful of typical contraints:
//
//    POST     Name        Description
//  ----------------------------------------------------------------------------------
//  - gain     Gain        Desired DC gain from resistor combination 
//  - thresh   Threshold   Acceptable error range expressed as a percent of nominal gain 
//  - r1l      Res1 Low    Lowest acceptable value for feedback resistor 
//  - r1h      Res1 High   Highest acceptable value for feedback resistor
//  - tol      Tolerance   Resistor Tolerance (typical values between 20%-0.5%)
//  - inv      Inverting   Feedback configuration: inverting or non-inverting
//

   // Check if gain is set. If it's not then theres no point
   // going through the rest of the script.
   $gain = isset($_POST['gain']) ? $_POST['gain'] : 0;    

   if($gain != 0){
      
      // Basic compare function for PHP's usort()
      //  - Sorting precedence: Gain, R1, R2
      //  - No longer used, but is still a valid alternative
      //    to the current sorting method, d_cmp()
      //
      //function cmp($a, $b) {
      //   if ($a[0] == $b[0]) {
      //      if ($a[1] == $b[1]) {
      //         return 0;
      //      }
      //      return ($a[1] < $b[1]) ? -1 : 1;
      //   }
      //   return ($a[0] < $b[0]) ? -1 : 1;
      //}
      
      // More sophisticated sorting method based on delta
      // between nominal gain and real gain
      //  - Sorting precedence: Delta gain, R1
      //
      function d_cmp($a, $b) {
         $gain = isset($_POST['gain']) ? $_POST['gain'] : 0; 
         if(dist_cmp($a[0], $b[0], $gain) == 0){
            return ($a[1] < $b[1]) ? -1 : 1;
         }
         return dist_cmp($a[0], $b[0], $gain);
      }
      
      // Helper method for d_cmp()
      //   - usort() compare methods can only take two
      //     parameters so this method is called from
      //     d_cmp() to allow for a third argument
      //      
      function dist_cmp($a, $b, $loc){   
         $d_a = abs($a - $loc);  
         $d_b = abs($b - $loc);
         if($d_a == $d_b) return 0;
         return ($d_a < $d_b) ? -1 : 1;   
      }
      
      // Define resistor values. This could be done
      // dynamically, but with such a large amount 
      // of data and nearly unlimited memory on the
      // server, this is much more efficient.
      $e192 = array(1.00,1.01,1.02,1.04,1.05,1.06,1.07,1.09,1.10,1.11,1.13,1.14,1.15,1.17,1.18,1.20,
                    1.21,1.23,1.24,1.26,1.27,1.29,1.30,1.32,1.33,1.35,1.37,1.38,1.40,1.42,1.43,1.45,
                    1.47,1.49,1.50,1.52,1.54,1.56,1.58,1.60,1.62,1.64,1.65,1.67,1.69,1.72,1.74,1.76,
                    1.78,1.80,1.82,1.84,1.87,1.89,1.91,1.93,1.96,1.98,2.00,2.03,2.05,2.08,2.10,2.13,
                    2.15,2.18,2.21,2.23,2.26,2.29,2.32,2.34,2.37,2.40,2.43,2.46,2.49,2.52,2.55,2.58,
                    2.61,2.64,2.67,2.71,2.74,2.77,2.80,2.84,2.87,2.91,2.94,2.98,3.01,3.05,3.09,3.12,
                    3.16,3.20,3.24,3.28,3.32,3.36,3.40,3.44,3.48,3.52,3.57,3.61,3.65,3.70,3.74,3.79,
                    3.83,3.88,3.92,3.97,4.02,4.07,4.12,4.17,4.22,4.27,4.32,4.37,4.42,4.48,4.53,4.59,
                    4.64,4.70,4.75,4.81,4.87,4.93,4.99,5.05,5.11,5.17,5.23,5.30,5.36,5.42,5.49,5.56,
                    5.62,5.69,5.76,5.83,5.90,5.97,6.04,6.12,6.19,6.26,6.34,6.42,6.49,6.57,6.65,6.73,
                    6.81,6.90,6.98,7.06,7.15,7.23,7.32,7.41,7.50,7.59,7.68,7.77,7.87,7.96,8.06,8.16,
                    8.25,8.35,8.45,8.56,8.66,8.76,8.87,8.98,9.09,9.19,9.31,9.42,9.53,9.65,9.76,9.88);
      $e096 = array(1.00,1.02,1.05,1.07,1.10,1.13,1.15,1.18,1.21,1.24,1.27,1.30,1.33,1.37,1.40,1.43,
                    1.47,1.50,1.54,1.58,1.62,1.65,1.69,1.74,1.78,1.82,1.87,1.91,1.96,2.00,2.05,2.10,
                    2.15,2.21,2.26,2.32,2.37,2.43,2.49,2.55,2.61,2.67,2.74,2.80,2.87,2.94,3.01,3.09,
                    3.16,3.24,3.32,3.40,3.48,3.57,3.65,3.74,3.83,3.92,4.02,4.12,4.22,4.32,4.42,4.53,
                    4.64,4.75,4.87,4.99,5.11,5.23,5.36,5.49,5.62,5.76,5.90,6.04,6.19,6.34,6.49,6.65,
                    6.81,6.98,7.15,7.32,7.50,7.68,7.87,8.06,8.25,8.45,8.66,8.87,9.09,9.31,9.53,9.76);
      $e048 = array(1.00,1.05,1.10,1.15,1.21,1.27,1.33,1.40,1.47,1.54,1.62,1.69,1.78,1.87,1.96,2.05,
                    2.15,2.26,2.37,2.49,2.61,2.74,2.87,3.01,3.16,3.32,3.48,3.65,3.83,4.02,4.22,4.42,
                    4.64,4.87,5.11,5.36,5.62,5.90,6.19,6.49,6.81,7.15,7.50,7.87,8.25,8.66,9.09,9.53);
      $e024 = array(1.00,1.10,1.20,1.30,1.50,1.60,1.80,2.00,2.20,2.40,2.70,3.00,3.30,3.60,3.90,4.30,
                    4.70,5.10,5.60,6.20,6.80,7.50,8.20,9.10);
      $e012 = array(1.00,1.2,1.5,1.8,2.2,2.7,3.3,3.9,4.7,5.6,6.8,8.2);
      $e006 = array(1.00,1.5,2.2,3.3,4.7,6.8);
      
      // arr will be assigned to one of the previously
      // generated arrays based on tol      
      $arr  = array();   
      $tolerance = $_POST['tol'];
      switch ($tolerance){
         case 'E6':   $arr = $e006; break;
         case 'E12':  $arr = $e012; break;
         case 'E24':  $arr = $e024; break;
         case 'E48':  $arr = $e048; break;
         case 'E96':  $arr = $e096; break;
         case 'E192': $arr = $e192; break;
      }    
      
      
      // keeps track of divisions so that the calculated 
      // gain can be multiplied back to the right order 
      // of magnitude at the end
      $pow = 0;
      $inv  = isset($_POST['inv'])  ? $_POST['inv']  : 1; // assume non-inverting if not set
      $gain_inv = $inv;
      while($gain >= 10) {
         $gain /= 10;
         $gain_inv /= 10;
         $pow++;
      }
      
      // good will store all of the successful resistor combinations
      // $$$ todo: optimize the loops below. They're already very fast
      //           becasue of the limited data that needs to be processed
      //           but they could be *MUCH* faster
      $thresh = $_POST['thresh']/100*$gain;
      $r1_low = $_POST['r1l'];
      $r1_high = $_POST['r1h'];                   
      $good = array();
      foreach ($arr as $i => $value_i){
         foreach ($arr as $j => $value_j) {
            //echo("r1: ".$value_i." r2: ".$value_j." gain: ".($value_i/$value_j + $gain_inv)."<br>");
            if(abs(($value_i/$value_j + $gain_inv) - $gain) < $thresh) {
               $r1 = $value_i*pow(10, $pow);
               $r2 = $value_j;
               $real_gain = (($r1/$r2) + $inv);
               array_push($good, array($real_gain, $r1, $r2));
            }
         }
      }
      
      // If there were successful resistor combinations, draw 
      // a table with those values. If not, print failure
      // message in its place.
      if(count($good) > 0) {
         usort($good, "d_cmp");
         echo("<div class='title'>
               <table>    
                  <colgroup>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 80px;'>
                     <col span='1' style='width: 80px;'>
                  </colgroup>
                  <tr>
                     <th style='text-align: left'>Gain</th>
                     <th style='text-align: left'>(dB)</th>
                     <th style='text-align: left'>&Delta;</th>
                     <th style='text-align: left'>R1</th>
                     <th style='text-align: left'>R2</th>
                  </tr>
               </table>
            </div>
            <div class='table'>
               <table class='bottomBorder'>    
                  <colgroup>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 80px;'>
                     <col span='1' style='width: 80px;'>
                  </colgroup>");          
         foreach($good as $index => $ans){
            if($r1_high >= $ans[1] && $r1_low <= $ans[1]){   // check r1 range, print:
               echo("<tr><td>". round(-pow(-1,$inv)*$ans[0],4).              // gain
                    "</td><td>".round(-pow(-1,$inv)*20*log($ans[0],10),4).   // r1
                    "</td><td>".round(abs($gain*pow(10, $pow) - $ans[0]),4). // r2
                    "</td><td>".$ans[1]."</td><td>".$ans[2]."</td></tr>");   // end row
            }
         }
         
         echo("</table></div>");
      } else {
         echo("No combinations meet a gain of <b><span style='color: #993300;'>".$gain*pow(10, $pow).
              "</span></b> within the specified threshold using <b><span style='color: #993300;'>".
              $tolerance."</span></b> resistors");
      }
   }
?>