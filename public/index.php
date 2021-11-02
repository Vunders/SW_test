<!DOCTYPE html>

<?php
define('PRIVATE_DIR', __DIR__ . "/../private");
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>ScandiWebTest</title>
<link rel="stylesheet" href="css/style.css" id="stylesheet" />



<div class="top-nav">
  <div class="top-nav__menu">
    <div class="top-nav__left">
      <h2>Product list</h2>
    </div>
    <nav class="top-nav__right">
      <form action="add_product_page.php">
        <button type="submit" class="add-product">ADD</button>
      </form>
      <form action="">
        <button type="submit" action="api.php?api-name=mass_delete" class="mass-delete">MASS DELETE</button>
      </form>
    </nav>
  </div>
  <div class="top-nav__horizontal-line"></div>
</div>


<div class="container">

  <?php
  include(PRIVATE_DIR . '/parts/post_template.php');
  ?>

</div>

<script src="js/request.js"></script>
<script src="js/script.js"></script>



<footer></footer>

</html>