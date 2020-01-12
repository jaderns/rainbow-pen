<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>

<?php
 
 use App\Header;
 use App\SessionManager;
 
 require_once __DIR__.'/../../src/SessionManager.php';
 require __DIR__.'/../../includes/liste-commandes.php';
 require __DIR__.'/../../includes/liste-clients.php';
 require __DIR__.'/../../includes/liste-commentaires.php';
 require __DIR__.'/../../includes/liste-produits.php';

 
 
 if(null ==$client = SessionManager::loggedClient()) {
     header('location: ../client/login.php');
     exit(); 
 }
?>

<html>
    <body>
        <div class="container">
            <?php 
require_once __DIR__.'/../../public/header.php';
?>
            <div class="flex-column row">
                <h2 class="offset-lg-1 col-lg-11">Commandes</h2>
                <div class="offset-lg-2 col-lg-8 ">
                    <div class="ligne">
                        <div>Commande n°</div>
                        <div>Client</div>
                        <div>Produit</div>
                        <div>Commandé le</div>
                        <div>Statut</div>
                    </div>
                    <div class="box">

                    <?php 


                        foreach ($commandes as $value)
                        {
                            echo "<div class='ligne'><div>".$value->no_commande()." </div>";
                            echo "<div>".$value->id_client()." </div>";
                            echo "<div>".$value->id_produit()." </div>";
                            echo "<div>".$value->created_at()->format('d-m-Y')." </div>";
                            

                            if (0 === $value->etat())
                            echo '<div><form method="post" action="profile-pro.php?update_status='.$value->no_commande().'">
                            <input type="hidden" name="email" value="'.$value->id_client().'"><select class="select-css"name="statut" onchange="this.form.submit()">
                            <option value="0" selected>En attente</option>
                            <option value="1">Envoyé</option>
                            </select>
                            </form></div>';
                            else echo '<div><form method="post" action="profile-pro.php?update_status='.$value->no_commande().'">
                            <input type="hidden" name="email" value="'.$value->id_client().'"><select class="select-css"name="statut" onchange="this.form.submit()">
                            <option value="0">En attente</option>
                            <option value="1" selected>Envoyé</option>
                            </select>
                            </form></div>';

                            echo '<div><a href="profile-pro.php?delete_commande='.$value->no_commande().'"><img class="icon_delete" src="/rainbow/public/photos/delete.png" alt="icone supprimer"></a>
                            </div></div>';
                        };

                        ?>
                    </div>
                </div>
            </div>

            <div class="flex-column row color2">
                <h2 class="offset-lg-1 col-lg-11">Utilisateurs</h2>
                <div class="offset-lg-2 col-lg-8 ">
                    <div class="ligne">
                        <div>Adresse client</div>
                        <div>Nom complet</div>
                        <div>Adresse</div>

                    </div>

                    <div class="ligne">
                        <a href="../client/signup.php?new=1"><img class="icon_delete" src="/rainbow/public/photos/add.png" alt="icon new"></a>

                    </div>

                    <div class="box">

                        <?php 
foreach ($clients as $value)
{
    echo "<div class='ligne'><div>".$value->email()." </div>";
    echo "<div>".$value->name()." </div>";
    echo "<div>".$value->address()." </div>"; 
    echo "<div></div>";
    echo '<div><a href="profile-pro.php?edit='.$value->email().'"><img class="icon_delete" src="/rainbow/public/photos/edit.png" alt="icon edit"></a></div>';
    echo '<div><a href="profile-pro.php?delete_client='.$value->email().'"><img class="icon_delete" src="/rainbow/public/photos/delete.png" alt="icon delete"></a></div></div>';
};
?>
                    </div>
                </div>
            </div>

            <div class="flex-column row">
                <h2 class="offset-lg-1 col-lg-11">Commentaires</h2>
                <div class="offset-lg-2 col-lg-8 ">
                    <div class="ligne">
                        <div>Client</div>
                        <div>Crée le</div>
                        <div>Contenu</div>
                        <div></div>
                        <div>Score /5</div>

                    </div>

                    <div class="box">
                        <?php 
foreach ($commentaires as $value)
{
    echo "<div class='ligne'><div>".$value->id_client()." </div>";
    echo "<div>".$value->created_at()->format('d-m-Y à H:i')." </div>";
    echo "<div>".$value->contenu()." </div>";
    echo "<div></div>";
    echo "<div>".$value->score()." </div>";
    echo '<div>
            <a href="profile-pro.php?delete_commentaire='.$value->created_at()->format('Y-m-d/H:i:s').'">
                <img class="icon_delete" src="/rainbow/public/photos/delete.png" alt="icon delete">
            </a>
        </div></div>';
    };
?>
                    </div>
                </div>
            </div>

            <div class="flex-column row color3dark">
                <h2 class="offset-lg-1 col-lg-11">Produits</h2>
                <div class="offset-lg-2 col-lg-8 ">
                    <div class="ligne">
                        <div>Produit</div>
                        <div>Photo</div>
                        <div>Titre</div>
                        <div>Descrption</div>
                        <div></div>
                        <div></div>

                    </div>

                    <div class="box">
                        <?php  
foreach ($produits as $value)
{
    echo "<div class='ligne'><div>".$value->id_produit()." </div>";
    echo '<div><img style="width:75px;height:56px;border:solid 1px black" src="/rainbow/public/photos/'.$value->photo().'"></div>';
    echo "<div>".$value->titre()." </div>";
    echo "<div>".$value->description()."</div>";
    echo "<div></div>";
    echo '<div>
            <a href="profile-pro.php?delete_produit='.$value->id_produit().'">
                <img class="icon_delete" src="/rainbow/public/photos/delete.png" alt="icon delete">
            </a>
        </div></div>';
};

?>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    require_once __DIR__.'/../../public/footer.php';
    ?>
    <body> 