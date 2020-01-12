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
            echo "<p>Commande ".$no_commande." réalisée avec succès</p>";
             exit(); 
        
    } else {
        echo 'Erreur pendant enregistrement !';
    }
} 

?>

 <h1>Panier</h1>
<h2>Commande</h2>
 <?php 

echo "le produit id".$id_produit = $_POST['id_produit'];
$produit = require __DIR__.'/../includes/produit-par-id.php';

//echo "<p>".$produit->id_produit()."</p>";
echo '<img style="width:755px;height:565px;border:solid 1px black" src="/../../rainbow/photos/'.$produit->photo().'">';
echo "<p>".$produit->titre()."</p>";
echo "<p>".$produit->description()."</p>";

echo "Quantité: ".$amount = $_POST['amount'];

?>
 
 <h2>Confirmer vos informations</h2>

 <?php 
    $id_client = $client->email();
    echo "<p>Email: ".$client->email()."</p>";
    echo "<p>Nom: ".$client->name()."</p>";
    echo "<p>Adresse: ".$client->address()."</p>"; 
    ?>

<form method="post">
<input type="hidden" name="email" value="<?=$client->email();?>">
<input type="hidden" name="id_produit" value="<?=$produit->id_produit();?>">
<input type="submit" name="commande" value="Commander">
</form>


<?php 
