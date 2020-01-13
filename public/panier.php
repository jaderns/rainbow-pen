<?php 

include('header.php');

use App\Model\Commande;
use App\SessionManager;

require_once __DIR__.'/../src/SessionManager.php';
 
 
if(null ==$client = SessionManager::loggedClient()) {
    header('location: client/login.php?message=1');
    exit(); 
}

$email = $_POST['email'] ?? null;
$id_produit = $_POST['id_produit'] ?? null;




if (isset($_POST['commande'])) {

    $stamp = strtotime("now");
    $no_commande = 'RAINBOW-'.$stamp; 
    $no_commande = str_replace(".", "",  $no_commande); 

    $commande = require __DIR__.'/../includes/nouvelle-commande.php';
    if ($commande instanceof Commande) {
            $mail = 0;
            require __DIR__.'/../includes/mail-confirmation-commande.php';
            echo '<div class="row fontcommande">';
            echo '<div class="offset-lg-3 col-lg-6 offset-lg-3 textepanier">';
            echo '<img src="/rainbow/public/photos/icone_panier.png">';
            echo "<p class='' >Commande ".$no_commande." réalisée avec succès</p></div></div>";
             exit(); 
        
    } else {
        echo 'Erreur pendant enregistrement !';
    }
} 

?>
<div class="row">
<h2 class="offset-lg-1 col-lg-10" >Commande</h2>
 <?php 

//echo "le produit id".$id_produit = $_POST['id_produit'];
$produit = require __DIR__.'/../includes/produit-par-id.php';

//echo "<p>".$produit->id_produit()."</p>";
echo '</br><div class="offset-lg-1 col-lg-5" >';
echo '<img class="photopanier" src="/rainbow/public/photos/'.$produit->photo().'"></br>';
echo "<p>Vous souhaitez commander la ".$produit->titre()."</p>";
echo "<p>Despcription produit :".$produit->description()."</p>";

echo "Quantité: ".$amount = $_POST['amount'];

?>
</div>
 </div>
 <div class="row">

<h2 class="offset-lg-1 col-lg-10" >Confirmer vos informations</h2>

<div class="col-lg-12 fontpanier">
<div class="offset-lg-3 col-lg-6 offset-lg-3 textepanier">
 <?php 
    $id_client = $client->email();
    echo "<p>Email: ".$client->email()."</p>";
    echo "<p>Nom: ".$client->name()."</p>";
    echo "<p>Adresse: ".$client->address()."</p>"; 
    ?>
   

<form method="post">
<input type="hidden" name="email" value="<?=$client->email();?>">
<input type="hidden" name="id_produit" value="<?=$produit->id_produit();?>">
<input class="styledpanier" type="submit" name="commande" value="Commander">
</form>

</div>
</div>

<?php 


include('footer.php');
?>
</div>
</div>
</body>
</html>
