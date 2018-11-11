#!/usr/bin/env php
<?php

   // TODO
   require(__DIR__ . "/../includes/config.php");
   $file = "US.txt";
   if(file_exists($file))
   {
    if(is_readable($file))
    {
     $handle = fopen($file, "r");
     if($handle)
     {
      while($data = fgetcsv($handle, 1000, "\t"))
          {
           CS50::query("INSERT INTO places (country_code, postal_code, place_name, admin_name1, admin_code1, admin_name2, admin_code2, admin_name3, admin_code3, latitude, longitude, accuracy) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]);
          }
          fclose($handle);
     }
    }
   }
?>