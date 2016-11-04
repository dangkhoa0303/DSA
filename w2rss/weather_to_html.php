<!DOCTYPE html>
<html>  
<?php 
require("wdllib.php"); 

//main 
  $site = $_REQUEST["site"]; 
  $rawdatafile = $site . "/clientraw.txt"; 
  $csv = file_get_contents($rawdatafile); 
  $data = explode(' ',$csv); 

  $data[SUMMARY] = str_replace('_', ' ',$data[SUMMARY]);
  $data[WINDDIRECTION] = degree_to_compass_point($data[WINDDIRECTION]);
 ?>

<head></head>
<body>
    <h2><?php echo $data[STATION]; ?></h2> 
    <link><?php echo $site; ?></link> 
      <item> 
         <title>Weather at <?php echo $data[TIMEHH] . ":" .$data[TIMEMM] ?></title> 
         <description> <?php echo $data[SUMMARY] . "Wind ". $data[WINDSPEED] ." knots from ".$data[WINDDIRECTION] . 
         "Temperature ". $data[TEMPERATURE] . "&#0176;C" . 
         " Barometric pressure ".$data[BAROMETRIC]. " hPa"; ?>
         </description> 
      </item> 
  </body>
 </html>