<script type="text/javascript" src="../js/functions.js"></script>
<style>
    #button_comment {
        display: block;
    }
    #form_comment {
        display: none;
    }
</style>

<html>
    <body>
        <div class="container">
            <?php 
include('header.php');
?>
            <div class="item item4">
                <h2>Produit</h2>
            </div>

            <div class="item item5">
                <h2>Connecté</h2>
            </div>

            <div class="item item6">
            <h2>Etuis</h2>
            </div>

            <div class="item item7">
                <h2>Commentaires</h2>

                <?php 

use App\SessionManager;
require_once __DIR__.'/../src/SessionManager.php';

if(null !== $client = SessionManager::loggedClient()) {
    ?>
                <button id="button_comment" onclick="mydisplay()">Nouveau commentaire</button>
                <div id="form_comment">
                    <form method="post">
                        <input type="hidden" name="email" value="<?$client->email()?>">
                        <textarea name="contenu" cols="30" rows="10" required="required"></textarea>
                        <select name="score">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5" selected="selected">5</option>
                        </select>
                        <input
                            type="submit"
                            name="submit"
                            value="commenter"
                            <?php if ($_POST['contenu'] ?? null) { echo 'onclick="hide()"'; }?>>
                    </form>
                </div>
                <?php
} 

if (isset($_POST['submit'])){
    require __DIR__.'/../includes/nouveau-commentaire.php';
$email = null;
$contenu = null;
$score = null;
}

require __DIR__.'/../includes/liste-commentaires.php';


foreach ($commentaires as $value)
{
    echo "<p>".$value->id_client()." ";
    echo $value->created_at()->format('d-m-Y')." ";
    echo $value->contenu()." ";
    switch ($value->score()) {
        case 1:
            echo '●○○○○';
            break;
        
        case 2:
            echo '●●○○○';
            break;

        case 3:
            echo '●●●○○';
            break;
        
        case 4:
            echo '●●●●○';
            break;
        case 5:
            echo '●●●●●';
            break;
    }
    };
    echo "</p>";

?>
            </div>

            <div class="item item8">

<?php 

include('footer.php');
?>
</div>