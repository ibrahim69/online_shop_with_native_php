<?php 

	include_once("../../function/helper.php");
	include_once("../../function/koneksi.php");

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$level = $_POST['level'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
	$button = $_POST['button'];

	if ($button == 'Update') {
			// mysqli_query($koneksi, "INSERT INTO kategori(kategori, status) VALUES ('$kategori', '$status')");
		$user_id = $_GET['user_id'];

		mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email', phone='$phone', alamat='$alamat', level='$level', status='$status' WHERE user_id='$user_id'");
	}


	header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
?>