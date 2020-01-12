<?php 
include('header.php');
?>


<h1>Fiche</h1>

<?php

require __DIR__.'/../includes/liste-produits.php';

$id_produit = $_GET['id_produit'];

$produit = require __DIR__.'/../includes/produit-par-id.php';

echo "<p>".$produit->id_produit()."</p>";
echo '<img style="width:755px;height:565px;border:solid 1px black" src="/photos/'.$produit->photo().'">';
echo "<p>".$produit->titre()."</p>";
echo "<p>".$produit->description()."</p>";

?> 
<form action="panier.php" method="post">
<input type="hidden" name="id_produit" value="<?= $produit->id_produit() ?>">
<select name="amount">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
</select>
<input type="submit" value="Commander">
</form>