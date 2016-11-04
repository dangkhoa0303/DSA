<?php 
require("wdllib.php"); 

//main 
  $site = $_REQUEST["site"]; // http://www.meteomaspalomas.com
  $rawdatafile = $site . "/clientraw.txt"; 
  $csv = file_get_contents($rawdatafile); 
  $data = explode(' ',$csv); 

  $data[SUMMARY] = str_replace('_', ' ',$data[SUMMARY]);
  $data[WINDDIRECTION] = degree_to_compass_point($data[WINDDIRECTION]);
    
// generate the RSS  
print <<<EOT
<?xml version="1.0"?>  
<rss version="2.0"> 
  <channel> 
      <title>{$data[STATION]}</title> 
      <link>{$site}</link> 
      <item> 
         <title>Weather at {$data[TIMEHH]}:{$data[TIMEMM]}</title> 
         <description> {$data[SUMMARY]} . Wind {$data[WINDSPEED]} knots from {$data[WINDDIRECTION]} . 
         Temperature {$data[TEMPERATURE]} &#0176;C . 
          Barometric pressure {$data[BAROMETRIC]} hPa
         </description> 
      </item> 
  </channel> 
 </rss> 
EOT;
?>