<?php
// mengembalikan nilai jika user belum login or register
  if ($user_id) {
    header("location: ".BASE_URL);
  }
?>

<div id="container_user_akses">

  <form action="<?php echo BASE_URL."proses_register.php" ?>" method="post">

  <?php 
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
    $email = isset($_GET['email']) ? $_GET['email'] : false;
    $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
    $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

    if ($notif == "require") {
      echo '<div class="notif">Maaf, kamu harus melengkapi form di bawah ini</div>';
    }else if ($notif == "password") {
      echo '<div class="notif">Maaf, password yang kamu masukkan tidak sama</div>';
    }else if ($notif == "email") {
      echo '<div class="notif">Maaf, email yang kamu masukkan sudah terdaftar</div>';
    }
  ?>

    <div class="element_form">
      <label>Nama lengkap</label>
      <span><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap ?>" ></span>

    </div>

    <div class="element_form">
      <label>Email</label>
      <span><input type="text" name="email" value="<?php echo $email ?>"></span>
    </div>

    <div class="element_form">
      <label>Nomor Telepon/ Handphone</label>
      <span><input type="text" name="phone" value="<?php echo $phone ?>"></span>
    </div>

    <div class="element_form">
      <label>Alamat</label>
      <span><textarea name="alamat"><?php echo $alamat ?></textarea></span>
    </div>

    <div class="element_form">
      <label>Password</label>
      <span><input type="password" name="password"></span>
    </div>

    <div class="element_form">
      <label>Re-type Password</label>
      <span><input type="password" name="re_password"></span>
    </div>

    <div class="element_form">
      <span><input type="submit" value="register"></span>
    </div>

  </form>
</div>
