<?php
  // include_once for access all code in folder
  include_once("function/helper.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> weshop | barang-barang elektronik </title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/style.css"; ?>">
  </head>
  <body>
    <div id="container">
      <div id="header">
        <a href="<?php echo BASE_URL."index.php"; ?>">
          <img src="<?php echo BASE_URL.""; ?>" alt="WESHOP">
        </a>

        <div id="menu">
          <div id="user">
            <a href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a>
            <a href="<?php echo BASE_URL."index.php?page=register"; ?>">Register</a>
          </div>

          <a href="<?php echo BASE_URL."index.php?page=cart";?>" id="button_cart">
            <img src="<?php echo BASE_URL."images/cart.png";?>" alt="cart">
          </a>
        </div>
      </div>

      <div id="content"></div>

      <div id="footer">
        <p>copyright wehsop 2016</p>
      </div>
    </div>
  </body>
</html>
