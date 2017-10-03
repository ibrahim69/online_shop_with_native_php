<?php

    include_once("function/helper.php");
    include_once("function/koneksi.php");


    $level = "customer";
    $status = "on";
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    

    // destory value from URL
    unset($_POST['password']);
    unset($_POST['re_password']);

    $dataForm = http_build_query($_POST);

    // mengecek apakah email sudah terdaftar
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

     // cek nilai yang kosong
    if (empty($nama_lengkap) OR empty($email) || empty($phone) OR empty($alamat) || empty($password)) {
       header("location: ".BASE_URL."index.php?page=register&notif=require&dataForm");
     }elseif ($password != $re_password) {
       header("location: ".BASE_URL."index.php?page=register&notif=password&dataForm");
     }elseif (mysqli_num_rows($query) == 1) {
       header("location: ".BASE_URL."index.php?page=register&notif=email&dataForm");
     } else {
        // encrypt password on mysql
        $password =md5($password);
        mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status) VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");
       header("location: ".BASE_URL."index.php?page=login");
     }



 ?>