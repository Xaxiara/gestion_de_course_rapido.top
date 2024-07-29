<?php
    $user_name = "root";
    $password = "";
    $database = "course";
    $host_name = "localhost";

  $connexion = mysqli_connect($host_name, $user_name, $password, $database) ;

  if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
  }

?>