<?php

  session_start();

  // include_once for access all code in folder
  include_once("function/koneksi.php");
  include_once("function/helper.php");

  // isset -> cek variabel yang sudah diset.
  $page = isset($_GET['page']) ? $_GET['page'] : false;
  // for select menu kategori
  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
  $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
  $totalBarang = count($keranjang);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> weshop | barang-barang elektronik </title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/style.css"; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/banner.css"; ?>">

    <script src='<?php echo BASE_URL."js/jquery-3.2.1.min.js";?>'></script>
    <script src='<?php echo BASE_URL."js/slides/source/jquery.slides.min.js";?>'></script>

    <script>
    $(function() {
      $('#slides').slidesjs({
        height: 350,
        play : {
              auto : true,
              interval : 3000  
        },
        navigation: false
      });
    });
  </script>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <a href="<?php echo BASE_URL."index.php"; ?>">
          <img src="<?php echo BASE_URL.""; ?>" alt="WESHOP">
        </a>

        <div id="menu">
          <div id="user">
            <?php
              if ($user_id) {
                    echo "HI <b>$nama</b>,
                      <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                      <a href='".BASE_URL."logout.php'>Logout</a>";
              } else {
                    echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
                          <a href='".BASE_URL."index.php?page=register'>Register</a>";
              }
             ?>

          </div>

          <a href="<?php echo BASE_URL."index.php?page=cart";?>" id="button_cart">
            <img src="<?php echo BASE_URL."images/cart.png";?>" alt="cart">
            <?php
              if ($totalBarang != 0) {
                echo "<span class='total_barang'>$totalBarang</span>";
              }
            ?>
          </a>
        </div>
      </div>

      <div id="content">

        <?php
          $filename = "$page.php";

          if (file_exists($filename)) {
            include_once($filename);
          } else {
            include_once("main.php");
          }
        ?>

      </div>

      <div id="footer">
        <p>copyright wehsop 2016</p>
      </div>
    </div>
  </body>
</html>
