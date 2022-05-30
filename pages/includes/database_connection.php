<?php
  try{
    $connect = new PDO("sqlsrv:Server=10.39.0.179; Database=QAPQC01", "qapqc", "qapqc01");
    //$connect = new PDO("mysql:host=localhost;dbname=database", 'username', 'password');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die(print_r($e->getMessage()));
  }
?>
