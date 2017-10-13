<?php
	
	// mengecek apakah ada data 'nama_data' jika ada akan digunakan nilainya
	$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	// pengecekan kedua
	if ($kota_id) {

		// digunakan u/mengambil nilai yang ada di URL
		$query = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");

		// mengeluarkan datanya
		$row = mysqli_fetch_assoc($query);

		// merubah variabel dengan nilai dari kolom kota di dalam tabel (mysql) kota
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		$button = "Update";

	}

?>

<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"; ?>" method= "post">
	
	<div class="element_form">
      <label>Kota</label>
      <span><input type="text" name="kota" value="<?php echo $kota; ?>"></span>
    </div>


    <div class="element_form">
    	<label>Tarif</label>
      	<span><input type="text" name="tarif" value="<?php echo $tarif; ?>"></span>
    </div>

    <div class="element_form">
      <label>Status</label>
      <span>
      		<input type="radio" name="status" value="on" <?php if ($status == "on") {echo 'checked="true"';} ?> >On
      		<input type="radio" name="status" value="off" <?php if ($status == "off") {echo "checked='true'"; } ?> >Off
      </span>
    </div>

    <div class="element_form">
      <span><input type="submit" name="button" value="<?php echo $button; ?>"></span>
    </div>

</form>