<?php
	
	// mengecek apakah ada data 'nama_data' jika ada akan digunakan nilainya
	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;

	$nama = "";
	$email = "";
	$phone = "";
	$level = "";
	$alamat = "";
	$status = "";
	$button = "Update";

	// pengecekan kedua
	if ($user_id) {

		// digunakan u/mengambil nilai yang ada di URL
		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

		// mengeluarkan datanya
		$row = mysqli_fetch_assoc($query);

		// merubah variabel dengan nilai dari kolom kategori di dalam tabel (mysql) kategori
		$nama = $row['nama'];
		$email = $row['email'];
		$phone = $row['phone'];
		$alamat = $row['alamat'];
		$level = $row['level'];
		$status = $row['status'];
		// $button = "Update";

	}

?>

<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"; ?>" method= "post">
	
	<div class="element_form">
      <label>Nama Lengkap</label>
      <span><input type="text" name="nama" value="<?php echo $nama; ?>"></span>
    </div>

	<div class="element_form">
      <label>Email</label>
      <span><input type="email" name="email" value="<?php echo $email; ?>"></span>
    </div>

	<div class="element_form">
      <label>Phone</label>
      <span><input type="text" name="phone" value="<?php echo $phone; ?>"></span>
    </div>

	<div class="element_form">
      <label>Alamat</label>
      <span><input type="text" name="alamat" value="<?php echo $alamat; ?>"></span>
    </div>

    <div class="element_form">
      <label>Level</label>
      <span>
      		<input type="radio" name="level" value="superadmin" <?php if ($level == "superadmin") {echo 'checked="true"';} ?> >superadmin
      		<input type="radio" name="level" value="customer" <?php if ($level == "customer") {echo "checked='true'"; } ?> >customer
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