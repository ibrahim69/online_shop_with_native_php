<?php
	
	// mengecek apakah ada data 'nama_data' jika ada akan digunakan nilainya
	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

	$nama_barang = "";
	$spesifikasi = "";
	$stok = "";
	$harga = "";
	$status = "";
	$button = "Add";

	// // pengecekan kedua
	// if ($barang_id) {

	// 	// digunakan u/mengambil nilai yang ada di URL
	// 	$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");

	// 	// mengeluarkan datanya
	// 	$row = mysqli_fetch_assoc($queryKategori);

	// 	// merubah variabel dengan nilai dari kolom kategori di dalam tabel (mysql) kategori
	// 	$kategori = $row['kategori'];
	// 	$status = $row['status'];
	// 	$button = "Update";

	// }

?>

<!-- enctype="multipart/form-data" digunakan untuk mengupload sebuah file kedalam server -->

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method= "post" enctype="multipart/form-data">
	
	<div class="element_form">
      <label>Kategori</label>
      <span>
      	<select name="kategori_id" id="">
      		<?php
      			$query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
      			while ($row=mysqli_fetch_assoc($query)) {
      			    echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
      			}
      		?>
      	</select>
      </span>
    </div>

    <div class="element_form">
      <label>Nama Barang</label>
      <span><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>"></span>
    </div>

    <div class="element_form">
      <label>Spesifikasi</label>
      <span><textarea name="spesifikasi"><?php echo $spesifikasi ?></textarea></span>
    </div>

    <div class="element_form">
      <label>Stok</label>
      <span><input type="text" name="stok" value="<?php echo $stok; ?>"></span>
    </div>

    <div class="element_form">
      <label>Harga</label>
      <span><input type="text" name="harga" value="<?php echo $harga; ?>"></span>
    </div>

    <div class="element_form">
      <label>Gambar Produk</label>
      <span><input type="file" name="file"></span>
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