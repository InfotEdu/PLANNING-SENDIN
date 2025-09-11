<?php

  define('HOST','localhost');

  define('USER','root_eps');

  define('PASS','0fyx8W4~');

  define('DB','escuelaspromotorassalud');

 

  $con = mysqli_connect(HOST,USER,PASS,DB);
  mysqli_query($con,"SET CHARACTER SET 'utf8'");
  mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");

   /*if (!$con){

     die("Error in connection" . mysqli_connect_error()) ;

  }else{
    echo "zurula";
    
     $sql = "SELECT * FROM eps_autochequeos ";
     $result = mysqli_query($con,$sql);
     

     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     var_dump($row);
  }*/

?>