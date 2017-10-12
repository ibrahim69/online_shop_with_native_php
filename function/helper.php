<?php

  define('BASE_URL', 'http://localhost/toko_online_wegodev/');

  function rupiah($nilai = 0)
  {
  	$string = "Rp," . number_format($nilai);
  	return $string;
  }


?>
