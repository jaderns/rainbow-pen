<html>
    <body>
        <div class="container">
        <?php 
include('header.php');
?>


<div class="item item4">
                <h2>Box</h2>
            </div>

           <div class="item item6">
                <h2>Mines</h2>
          

<?php

require __DIR__.'/../includes/liste-produits.php';

foreach ($produits as $value)
{
    echo "<p>".$value->id_produit()." ";
    echo '<img style="width:150px;height:112px;border:solid 1px black" src="/rainbow/public/photos/'.$value->photo().'">';
    echo $value->titre()." ";
    echo $value->description()."<p/>";
    echo '<a href="fiche.php?id_produit='.$value->id_produit().'"> En savoir plus </a>';
    // echo '<a href="store.php?pan='.$value->id_produit().'"> Ajouter au panier </a>';
};


?>
  </div> 

  <div class="item item8">

<?php 

include('footer.php');
?>
</div>