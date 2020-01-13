<?php 
include('header.php');
?>



<?php

require __DIR__.'/../includes/liste-produits.php';

$id_produit = $_GET['id_produit'];

$produit = require __DIR__.'/../includes/produit-par-id.php';
echo '<div class="row fontfiche">';
echo "<h2 class='offset-lg-1 col-lg-9'>".$produit->titre()."</h2>";
echo " <div class='offset-lg-1 col-lg-5'>";
echo '<img class="photoproduit" src="/rainbow/public/photos/'.$produit->photo().'">';
echo " <div class='col-lg-12 imgfiche'>";
echo '<img class="imgminiature" src="/rainbow/public/photos/'.$produit->photo().'">';
echo '<img class="imgminiature" src="/rainbow/public/photos/'.$produit->photo().'">';
echo '<img class="imgminiature" src="/rainbow/public/photos/'.$produit->photo().'">';
echo '<img class="imgminiature" src="/rainbow/public/photos/'.$produit->photo().'"></div></div>';
echo " <div class='offset-lg-1 col-lg-5'>";
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
<input class="styled2" type="submit" value="Commander">
</form>

</div>
</div>

<div class="row">
        
        <h2 class="offset-lg-2 col-lg-8">Les autres...</h2>
        <div class="caroussel_box offset-lg-2 col-lg-8 offset-lg-2">
        
     
            <a class="menu caroussel_image" href=""><img 
               src="../public/photos/photo8_carre.jpg"
                alt="photo produit 1"/>
            <h3>Box spéciale peinture</h3></a>
                
             
            <a class="menu caroussel_image" href=""><img 
              src="../public/photos/photo8_carre.jpg"
                alt="photo produit 1"/>
                <h3>Box spéciale acrylique</h3></a>
        
        
            <a class="menu caroussel_image" href=""><img 
            src="../public/photos/photo8_carre.jpg"
                alt="photo produit 1"/>
                <h3>Box spéciale calligraphie</h3></a>
        </div>
    </div>

<div class="row">

<?php 

include('footer.php');
?>
</div>
</div>
</body>
</html>