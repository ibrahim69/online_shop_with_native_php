<?php
// protect halaman
  if ($user_id) {
    header("location: ".BASE_URL);
  }
?>


<div id="container_user_akses">

  <form action="<?php echo BASE_URL."proses_login.php" ?>" method="post">

    <?php

      $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

      if ($notif == true) {
        echo "<div class='notif'> Maaf, email atau password yang kamu masukkan tidak cocok</div>";
      }

    ?>

    <div class="element_form">
      <label>Email</label>
      <span><input type="text" name="email"></span>
    </div>

    <div class="element_form">
      <label>Password</label>
      <span><input type="password" name="password"></span>
    </div>

    <div class="element_form">
      <span><input type="submit" value="login"></span>
    </div>

  </form>
</div>
