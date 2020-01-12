<html>
<head>
<title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/rainbow/bootstrap-4.4.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="/rainbow/style/css/style_spe_3.css" media="screen">   
</head>
<?php

use App\Model\Client; 
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';

if(SessionManager::loggedClient() instanceof Client) {
    header('location: ../index.php');
    exit(); 
}

    $error = null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $message = $_GET['message'] ?? null; 
    //ou alors=> $email = isset($_POST['email']) ? $_POST['email'] : null;
    
    if (null !== $message) {
        switch ($message) {
            case 1:
                echo "Vous devez vous connecter pour effectuer une commande";
                break;
            case 2:
                echo "i equals 1";
                break;
            case 3:
                echo "i equals 2";
                break;
        }
    }
    
    if (null !== $email &&
        false === filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $error = "L'identifiant fourni n'est pas un email valide !\n";
    }

    if (null === $error && null!== $email) {
        $client = require __DIR__.'/../../includes/client-par-email.php';
        if ($client instanceof Client) {
             //Verif mdp 
             if (true === password_verify($password, $client->password())) {
                SessionManager::loginClient($client);
                header('location: ../index.php');
                exit();
             } else {
                $error = "Mauvais mdp";
            } 
        } else {
            $error = 'Aucun client avec ces informations, merci de rééssayer.';
        }    
    }
?>
    <body>
        <div class="container">
            <div class="row">
                <a class=" center offset-sm-5 col-sm-2" href="/rainbow/public/index.php">
                    <img class="logo_form" src="../photos/logo.png" alt="rainbowlogo">
                </a> 
            </div>
            <div class="row">
                <div class="form_box offset-lg-2 col-lg-8">
                    <h2>Se connecter</h2>
                    <form method="post">
                        <label for="email" class="form_lab">E-mail</label>
                            <input type="email" name="email" placeholder="Utilisateur@Rainbow.com" value="<?= $email ?>"/>
                        <label for="password" class="form_lab">Mot de passe</label>
                            <input type="password" name="password" placeholder="MonMotDePasseSécurisé"/>
                    
                        <?php if (null !== $error): ?>
                                <p><?= $error ?></p>
                        <?php endif; ?>
                        <p class='center'><a href="forgot-password.php">Mot de passe oublié ?</a></p>
                    
                        <p class='center'><a href="signup.php">Créer un compte</a></p>
<div class='row justify-content-around'>
                        
                   
                        <input class="styled" type="submit" value="Login" />
                        <a class="styled" href="javascript:history.go(-1)">Annuler</a>        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
