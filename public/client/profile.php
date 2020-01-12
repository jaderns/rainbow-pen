<?php 
 
use App\Header;
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';


if(null ==$client = SessionManager::loggedClient()) {
    header('location: login.php');
    exit(); 
}

?>

<html>
    <body>
        <div class="container">
            <?php 
require_once __DIR__.'/../../public/header.php';
?>
            <div class="row flex-column">
                <h2 class="offset-lg-1 col-lg-8">Mes informations</h2>
                <div class="offset-xs-1 offset-sm-2 col-sm-10 ">
                    <div class="box">
                        <?php 

echo "<p>Email: ".$client->email()."</p>";
echo "<p>Mot de passe: ************</p>";
echo "<p>Nom: ".$client->name()."</p>";
echo "<p>Adresse: ".$client->address()."</p>"; 
echo "<a class='styled' href='../admin/update-user.php?edit=".$client->email()."'>Modifier</a>"

?>

                    </div>
                </div>
            </div>

            <div class="row flex-column color1dark">
                <?php
$email = $client->email();
require __DIR__.'/../../includes/commande-par-client.php'; 
 

if (!(empty($commandes))){

    echo "<h2 class='offset-lg-1 col-lg-8'>Mes commandes</h2>
    <div class='offset-lg-1 col-lg-10'>
    <div class='ligne'>
                        <div>Commande n°</div>
                        <div>Adresse de livraison</div>
                        <div>Titre produit</div>
                        <div>Image produit</div>
                        <div>Commandé le</div>
                        <div>Statut</div>
                    </div>
    <div class='box'>";

foreach ($commandes as $value)
{
    echo "<div class='ligne'><div>".$value->no_commande()." </div>";
    echo "<div>".$client->address()." </div>";
    $id_produit=$value->id_produit();
    $produit = require __DIR__.'/../../includes/produit-par-id.php';
    echo "<div>".$produit->titre()." </div>";
    echo "<div>".$produit->photo()." </div>";
    echo "<div>".$value->created_at()->format('d-m-Y')." </div>";
    if (0 === $value->etat())
    echo "<div>En cours</div></div>";
    else echo "<div>En route</div></div>";

};
} 
?>
            </div>
            </div>
            </div>

            <div class="row color3dark align-items-start">
                <h2 class="offset-lg-1 col-lg-8">Nous contacter</h2>

                <div class="form_box offset-sm-1 col-lg-4 col-sm-10">
                    <p>
                        <em>Email :</em>
                        rainbow-pen@alwaysdata.net</p>
                    <p>
                        <em>Téléphone</em>
                        : +337 08 09 10 11</p>
                    <p>
                        <em>Réseaux sociaux</em>
                        <a href=""><img class="icon_delete" src="/rainbow/public/photos/icon_social-01.png" alt=""></a>
                        <a href=""><img class="icon_delete" src="/rainbow/public/photos/icon_social-02.png" alt=""></a>
                        <a href=""><img class="icon_delete" src="/rainbow/public/photos/icon_social-03.png" alt=""></a>
                    </p>
                </div>
                <form class="form_box offset-sm-1 col-lg-5 col-sm-10" method="post">

                    <label for="name">Nom</label>
                    <input
                        type="text"
                        name="name"
                        value="<?= $client->name() ?>"
                        required="required"/>

                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?= $client->email() ?? null ?>" required="required"/>

                    <label for="subject">Subjet</label>
                    <select id="subject" required="required">
                        <option value="">Choisissez un sujet..</option>
                        <option value="question">J'ai une question</option>
                        <option value="question">J'ai un problème</option>
                        <option value="question">J'ai un avis</option>
                        <option value="question">Je veux travailler chez vous</option>
                        <option value="question">Autres</option>
                    </select>

                    <label for="message">
                        Message</label>
                    <textarea id="message" rows="8" cols="80" placeholder="Votre message.."></textarea>

                    <div class="row justify-content-around">
                        <input class="styled" type="submit" name="submit" value="Send">
                        <input class="styled" type="reset" name="reset" value="Reset">
                    </div>
                </div>
            </div>
        </div>
            <?php 
require_once __DIR__.'/../../public/footer.php';
?>
        </div>