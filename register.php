<div id="container_user_akses">

  <form action="<?php echo BASE_URL."proses_register.php" ?>" method="post">

    <div class="element_form">
      <label>Nama lengkap</label>
      <span><input type="text" name="nama_lengkap"></span>
    </div>

    <div class="element_form">
      <label>Email</label>
      <span><input type="text" name="email"></span>
    </div>

    <div class="element_form">
      <label>Nomor Telepon/ Handphone</label>
      <span><input type="text" name="phone"></span>
    </div>

    <div class="element_form">
      <label>Alamat</label>
      <span><textarea name="alamat"></textarea></span>
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
