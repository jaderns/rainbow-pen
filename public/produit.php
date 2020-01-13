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

<div class="container">
        <div class="row">
                
                <h2 class="offset-lg-1 col-lg-9 titre_couleur1">Produit</h2>
                
                <div class="offset-lg-1 col-lg-5">
                   
                    <img class="imgombre2" src="../public/photos/photo8.jpg" alt="photo produit 1"/>
                </div> 

                <div class="offset-lg-1 col-lg-4 offset-lg-1">
                   
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.</p>
                        <a class="styled2">En savoir +</a>
                </div>    
                    
                
        </div>

            <div class="cropImgbandeau_produit">
                    <div>
                        <div class="objet2"> 
                            <h2 class="offset-lg-2 slogan2">Connecté</h2>
                            <p class="offset-lg-2 col-lg-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.</p>
                            
                            </div>
                        <img class=""src="../public/photos/photo8.jpg" alt="photo produit 1"/>
                         
                    </div>                                     
                        
             </div>

             <div class="row">
                
                <h2 class="offset-lg-1 col-lg-9 titre_couleur1">Etuis</h2>
                
                    <div class="offset-lg-1 col-lg-5">
                        <img class="imgombre1" src="../public/photos/photo8.jpg" alt="photo produit 1"/>
                    </div> 

                 <div class="offset-lg-1 col-lg-4 offset-lg-1">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, modi consequuntur reiciendis cum a earum minima vel eum velit magnam molestiae similique quidem quia ex quod deserunt quam provident architecto.</p>   
                 </div>    
            </div>

        <div class="row fontcom">
            <!-- background vert -->
            <div class="offset-lg-2 col-lg-8 offright-2">
                <h2>Commentaires</h2>

                <?php 

use App\SessionManager;
require_once __DIR__.'/../src/SessionManager.php';

if(null!==$client=SessionManager::loggedClient()) {
    ?>
                <button id="button_comment" onclick="display()">Nouveau commentaire</button>
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