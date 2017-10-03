<?php
	
	// mengecek apakah ada data 'nama_data' jika ada akan digunakan nilainya
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	$kategori = "";
	$status = "";
	$button = "Add";

	// pengecekan kedua
	if ($kategori_id) {

		// digunakan u/mengambil nilai yang ada di URL
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");

		// mengeluarkan datanya
		$row = mysqli_fetch_assoc($queryKategori);

		// merubah variabel dengan nilai dari kolom kategori di dalam tabel (mysql) kategori
		$kategori = $row['kategori'];
		$status = $row['status'];
		$button = "Update";

	}

?>

<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" method= "post">
	
	<div class="element_form">
      <label>Kategori</label>
      <span><input type="text" name="kategori" value="<?php echo $kategori; ?>"></span>
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