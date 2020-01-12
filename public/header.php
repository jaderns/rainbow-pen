<html>
    <head>
        <title>Rainbow</title>
        <link rel="icon" type="image/png" href="/rainbow/public/logo.php">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link
            href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="/rainbow/bootstrap-4.4.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="/rainbow/style/css/style_main.css">
        <link rel="stylesheet" href="/rainbow/style/css/mediaqueries.css">
        <link rel="stylesheet" href="/rainbow/style/css/style_spe_3.css">

    </head>
    <body>
        <div class="container">
            <div class="navbar row">
                <a class="offset-sm-1 col-sm-2 logo" href="/rainbow/public/index.php">
                    <img src="/rainbow/public/photos/logo.png" alt="rainbowlogo">
                </a>
                <div class="col-md-3 row justify-content-md-between menu-inline">
                    <a class=" menu" href="/rainbow/public/index.php">Accueil</a>
                    <a class=" menu" href="/rainbow/public/produit.php">Produit</a>
                    <a class=" menu" href="/rainbow/public/store.php">Store</a>
                </div>

                <?php 

            use App\client\Login;
            use App\client\Logout;
            use App\SessionManager;


            require_once __DIR__.'/../src/SessionManager.php';

            if(null ==$client = SessionManager::loggedClient()) {
                ?>

                <div class="offset-sm-6 offset-md-3 col-sm-2 row justify-content-end">
                    <div class="dropdown dropdown2">
                        <button class="dropdown_button dropdown_button2 menu-burger"></button>

                        <div class="dropdown_content dropdown_content2">
                            <a class="dropdown_content_in" href="index.php">Accueil</a>
                            <a class="dropdown_content_in" href="produit.php">Produit</a>
                            <a class="dropdown_content_in" href="store.php">Store</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropdown_button "></button>
                        <div class="dropdown_content">
                            <a class="dropdown_content_in" href="client/login.php">Se connecter</a>
                            <a class="dropdown_content_in" href="client/signup.php">Créer un compte</a>
                        </div>
                    </div>
                </div>
            <?php
            } 
            else {
                ?>
                <div class="offset-sm-6 offset-md-3 col-sm-2 row justify-content-end">
                    <div class="dropdown dropdown2">
                        <button class="dropdown_button dropdown_button2 menu-burger"></button>

                        <div class="dropdown_content dropdown_content2">
                            <a class="dropdown_content_in" href="index.php">Accueil</a>
                            <a class="dropdown_content_in" href="produit.php">Produit</a>
                            <a class="dropdown_content_in" href="store.php">Store</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropdown_button"></button>
                        <div class="dropdown_content">
                        <?php 
                            echo "<p>Bonjour, ".$client->name()."</p>";
                            if (1 == $client->statut()) {
                                echo '<a href="/rainbow/public/admin/profile-pro.php">Mon compte</a>';
                            } else {
                                echo '<a href="/rainbow/public/client/profile.php">Mon compte</a>';
                            }

                        echo "<a href='/rainbow/includes/logout.php'>Se déconnecter</a>";
            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

        </body>

    </html>