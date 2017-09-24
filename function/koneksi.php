<?php

  $server = "localhost";
  $username = "root";
  $password = "root";
  $database = "toko_online_wegodev";

  $koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal");

?>
