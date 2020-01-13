<html>
    <body>
        <div class="container">
        <?php 
include('header.php');
?>



<div class="row">
                
                <h2 class="offset-lg-1 col-lg-9 titre_couleur1">Box</h2>
</div>     

           
                     
          
<?php

require __DIR__.'/../includes/liste-produits.php';

foreach ($produits as $value)
{
    echo '<div class="row fontstore ">';
    echo '<div class="offset-lg-1 col-lg-5">';
    echo '<img class="imgombre'.$value->id_produit().'" src="/rainbow/public/photos/'.$value->photo().'">';
    echo '</div>';
    echo '<div class="offset-lg-1 col-lg-4 offset-lg-1 ">';
    echo "<p>".$value->id_produit(). " </br>";
    echo $value->titre()." ";
    echo $value->description()."<p/>";
    echo '<a class="styled'.$value->id_produit().'" href="fiche.php?id_produit='.$value->id_produit().'"> En savoir plus </a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    // echo '<a href="store.php?pan='.$value->id_produit().'"> Ajouter au panier </a>';
};


?>
  </div>    

 
  <div>

<?php 

include('footer.php');
?>
</div>