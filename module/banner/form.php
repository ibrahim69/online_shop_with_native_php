<?php
	
	// mengecek apakah ada data 'nama_data' jika ada akan digunakan nilainya
	$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;

	$banner = "";
	$barang = "";
	$link = "";
	$gambar = "";
	$keterangan_gambar = "";
	$status = "";
	$button = "Add";

	// pengecekan kedua
	if ($banner_id) {

		// digunakan u/mengambil nilai yang ada di URL
		$query = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");

		// mengeluarkan datanya
		$row = mysqli_fetch_assoc($query);

		// merubah variabel dengan nilai dari kolom banner di dalam tabel (mysql) banner
		$banner = $row['banner'];
		$link = $row['link'];
		$gambar = $row['gambar'];
		$status = $row['status'];
		$button = "Update";
		$keterangan_gambar = "( Klik pilih gambar jika ingin mengganti gambar )";
		$gambar = "<img src='".BASE_URL."images/slide/$gambar' style='width: 300px; vertical-align: middle;'>";

	}

?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"; ?>" method= "post" enctype="multipart/form-data">
	
	<div class="element_form">
      <label>Banner</label>
      <span><input type="text" name="banner" value="<?php echo $banner; ?>"></span>
    </div>

	<div class="element_form">
      <label>Link</label>
      <span><input type="text" name="link" value="<?php echo $link; ?>"></span>
    </div>

	<div class="element_form">
      <label>Gambar <?php echo $keterangan_gambar; ?></label>
      <span>
      	<input type="file" name="file"> <?php echo $gambar; ?>
      </span>
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