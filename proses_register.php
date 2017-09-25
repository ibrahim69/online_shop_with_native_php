<?php

  include_once ("function/koneksi.php");
  include_once ("function/helper.php");

  $level = "customer";
  $status = "on";
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $alamat = $_POST['alamat'];
  $password = $_POST ['password'];
  $re_password = $_POST['re_password'];

  // untuk meghnacurkan nilai di http
  unset($_POST['password']);
  unset($_POST['re_password']);

  // mengembalikan data ke http
  $dataForm = http_build_query($_POST);

  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");

  // untuk mengecek isi form jika kosong nilainya akan dikembalikan di http
  if (empty($nama_lengkap) || empty($email) OR empty($phone) OR empty($alamat) || empty($password) || empty($re_password) ) {
    header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm");
  } elseif ($password != $re_password) {
    /* untuk mengecek apakah password sama dengan re_password atau tidak */
    header("location: ".BASE_URL."index.php?page=register&notif=password&$dataForm");
  } elseif (mysqli_num_rows($query) == 1) {
    /* untuk mengecek apakah email sudah digunakan atau tidak */
    header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm");
  } else {
        // md5() -> untuk menyembunyikan password di mysql
        $password = md5($password);
        mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                                            VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");
        // setelah data isi maka user akan masuk ke halaman login
        header("location: ".BASE_URL."index.php?page=login");
  }


?>
