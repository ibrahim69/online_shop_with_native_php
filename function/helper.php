<?php

  define('BASE_URL', 'http://localhost/toko_online_wegodev/');

  $arrayStatusPesanan = ["Menunggu Pembayaran", "Pembayaran Sedang di Validasi", "Lunas", "Pembayaran di Tolak"];

  function rupiah($nilai = 0)
  {
  	$string = "Rp," . number_format($nilai);
  	return $string;
  }

  function kategori($kategori_id = false)
  {

  	// Untuk mengaccess variabel diluar fungsi
  	global $koneksi;

  	$string = "<div id='menu_kategori'>";

		$string .= "<ul>";

				$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

				while ($row = mysqli_fetch_assoc($query) ) {
				$kategori = strtolower($row['kategori']);

					if ($kategori_id == $row['kategori_id']) {
						$string .= "<li>
								<a href='".BASE_URL."$row[kategori_id]/$kategori.html' class='active'>$row[kategori]</a>
							</li>";
					} else {
					    $string .= "<li>
								<a href='".BASE_URL."$row[kategori_id]/$kategori.html'>$row[kategori]</a>
					    	</li>";
					}

				}

		$string .= "</ul>";

	$string .="</div>";

	return $string;
  }


?>
