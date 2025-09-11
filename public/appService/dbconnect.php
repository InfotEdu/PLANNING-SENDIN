<?php

  define('HOST','localhost');

  define('USER','user_planning');

  define('PASS','d3wj8*Q6');

  define('DB','planningSendin');

 

  $con = mysqli_connect(HOST,USER,PASS,DB);
  mysqli_query($con,"SET CHARACTER SET 'utf8'");
  mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");

  /* if (!$con){

     die("Error in connection" . mysqli_connect_error()) ;

  }else{
    echo "zurula";
    
     $sql = "SELECT * FROM inmuebles ";
     $result = mysqli_query($con,$sql);
     

     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     var_dump($row);

     $dniBD = $row['Nif'];
     $anoBD = $row['FechNac'];

     $anoBD = substr($anoBD, 0, 4);

     var_dump($dniBD);
     var_dump($anoBD);
  }*/

?>