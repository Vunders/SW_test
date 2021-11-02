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
      <form action="index.php">
        <button type="submit" class="cancel">Cancel</button>
      </form>
      <form id="new_post_form" action="api.php?api-name=new_post" method="post">
        <button type="submit" class="add-product">Save</button>


    </nav>
  </div>
  <div class="top-nav__horizontal-line"></div>
</div>

<div class="main">
  <div class="input-fields" name="new_post">

    <label for="sku">SKU:</label>
    <input name="sku" type="text" id="sku" placeholder="#sku" />

    <label for="name">Name:</label>
    <input name="name" type="text" id="name" placeholder="#name" />

    <label for="price">Price($):</label>
    <input name="price" type="text" id="price" placeholder="#price" />

    

   <label id="DVD_label" for="size">Size:</label>
    <div class="" id="DVD" class="types"> 
      <input name="size" type="text" id="size"  placeholder="#size">
    </div>

    <div id="Furniture" class="types form_Off">
      <label id="Furniture_label" class="form_Off" for="height">Height:</label>
      <input name="height" type="text" id="height" value="" placeholder="#height">

      <label id="Furniture_label1" class="form_Off" for="width">Width:</label>
      <input name="width" type="text" id="width" value="" placeholder="#width">

      <label id="Furniture_label2" class="form_Off" for="lenght">Lenght:</label>
      <input name="lenght" type="text" id="lenght" value="" placeholder="#lenght">
    </div>

    <label class="form_Off" id="Book_label" for="weight">Weight:</label>
    <div class="input-fields__weight form_Off" id="Book" class="types form_Off">
      <input name="weight" type="text" id="weight" value="" placeholder="#weight">
    </div>

  </div>
</form>
    <form action="">
      <label for="TypeSwitcher">Type Switcher:</label>
      <select name="" id="TypeSwitcher" onchange="switchProductType(this)">
        <option class="options DVD" value="DVD">DVD</option>
        <option class="options furniture" value="furniture">Furniture</option>
        <option class="options book" value="book">Book</option>
      </select>
    </form>
  <p class="" id="DVD_p">Please, provide size in Mb</p>
  <p class="form_Off" id="Book_p">Please, provide weight in Kg</p>
  <p class="form_Off" id="Furniture_p">Please, provide HxWxL in Cm</p>
</div>

<div class="container"></div>


<script src="js/request.js"></script>


<script>

function switchProductType(select) {
  if (select.value == "DVD") {
    document.getElementById("DVD").style.display = "block";
    document.getElementById("Furniture").style.display = "none";
    document.getElementById("Book").style.display = "none";
    document.getElementById("Furniture_label").style.display = "none";
    document.getElementById("Book_label").style.display = "none";
    document.getElementById("DVD_label").style.display = "block";
    document.getElementById("Furniture_label2").style.display = "none";
    document.getElementById("Furniture_label1").style.display = "none";
    document.getElementById("Furniture_p").style.display = "none";
    document.getElementById("Book_p").style.display = "none";
    document.getElementById("DVD_p").style.display = "block";
  } else if (select.value == "furniture") {
    document.getElementById("DVD").style.display = "none";
    document.getElementById("Furniture").style.display = "grid";
    document.getElementById("Book").style.display = "none";
    document.getElementById("Furniture_label").style.display = "block";
    document.getElementById("Book_label").style.display = "none";
    document.getElementById("DVD_label").style.display = "none";
    document.getElementById("Furniture_label1").style.display = "block";
    document.getElementById("Furniture_label2").style.display = "block";
    document.getElementById("Furniture_p").style.display = "block";
    document.getElementById("Book_p").style.display = "none";
    document.getElementById("DVD_p").style.display = "none";
  } else if (select.value == "book") {
    document.getElementById("DVD").style.display = "none";
    document.getElementById("Furniture").style.display = "none";
    document.getElementById("Book").style.display = "block";
    document.getElementById("Furniture_label").style.display = "none";
    document.getElementById("Book_label").style.display = "block";
    document.getElementById("DVD_label").style.display = "none";
    document.getElementById("Furniture_label1").style.display = "none";
    document.getElementById("Furniture_label2").style.display = "none";
    document.getElementById("Furniture_p").style.display = "none";
    document.getElementById("Book_p").style.display = "block";
    document.getElementById("DVD_p").style.display = "none";
  }
}

const post_form = document.getElementById("new_post_form");
post_form.onsubmit = function (event) {
  event.preventDefault();
  /** request post paņem elementu this, kas šajā gadījumā ir post form,
   *   un iekš action izsauc api new post*/
  request.post(this, function (response) {
    console.log(response);
    document.getElementById("sku").value = "";
    document.getElementById("name").value = "";
    document.getElementById("price").value = "";
    document.getElementById("size").value = "";
    document.getElementById("width").value = "";
    document.getElementById("lenght").value = "";
    document.getElementById("height").value = "";
    document.getElementById("weight").value = "";

  });
};</script>



</html>
















