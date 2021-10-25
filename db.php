<?php 
  define("HOST","localhost");
  define("UNAME","root");
  define("PASSWORD","");
  define("DBNAME","admin");
  $conn=mysqli_connect(HOST,UNAME,PASSWORD,DBNAME) or die("Connection Error");
?>