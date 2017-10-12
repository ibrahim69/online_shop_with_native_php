<?php 

	include_once("../../function/helper.php");
	include_once("../../function/koneksi.php");

	$banner = $_POST['banner'];
	$link = $_POST['link'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$update_gambar = "";

	if (!empty($_FILES["file"]["name"])) {

		// upload file to server
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/slide/".$nama_file);
		
		$update_gambar = ", gambar='$nama_file'";
	}

	if ($button == 'Add') {
			mysqli_query($koneksi, "INSERT INTO banner (banner, link, gambar, status) VALUES ('$banner', '$link', '$nama_file', '$status')");
	} else if ($button == 'Update') {
		$banner_id = $_GET['banner_id'];

		mysqli_query($koneksi, "UPDATE banner SET banner='$banner', link='$link', status='$status' $update_gambar WHERE banner_id='$banner_id'");
	}


	header("location: ".BASE_URL."index.php?page=my_profile&module=banner&action=list");
?>