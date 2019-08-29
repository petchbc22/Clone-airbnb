<?php
  session_start();

  $config_set = "local";
  if ($config_set == "local"){
      $config_server = "localhost";
      $config_database = "sb_realestate";
      $config_username = "root";
      $config_password = "";
      $config_port = "" ;
  }

  $conn = new mysqli( $config_server, $config_username, $config_password, $config_database);
  mysqli_set_charset( $conn, 'utf8');
  mysqli_query($conn , "SET NAMES 'utf8';");
  mysqli_query($conn , "SET CHARACTER SET 'utf8';");
  mysqli_query($conn , "SET COLLATION_CONNECTION = 'utf8_general_ci';");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed : ");
  }
?>
