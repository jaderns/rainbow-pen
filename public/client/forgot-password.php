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
<body>
    <div class="container">
    <div class="row">
                <a class=" center offset-sm-5 col-sm-2" href="/rainbow/public/index.php">
                    <img class="logo_form" src="../photos/logo.png" alt="rainbowlogo">
                </a> 
            </div>  
            
            <div class="row">
            <div class="form_box offset-lg-2 col-lg-8">
                 <h2>Réinitialiser votre mot de passe</h2>

<?php 

use App\Model\Client; 

    $error = null;
    $email = $_POST['email'] ?? null;
    if (null !== $email &&
        false === filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $error = "L'identifiant fourni n'est pas un email valide !\n";
    }
    
    if (null === $error && null!== $email) {
        $client = require __DIR__.'/../../includes/client-par-email.php';
        if ($client instanceof Client) {   
            require __DIR__.'/../../includes/send-mail.php'; 
                header('location: reset/reset-message.php');
                exit();
        } else {
            $error = 'Aucun client avec ces informations, merci de rééssayer.';
        }    
    }

        ?>

<form method="post">
    <label for="email">Enter your email</label>
    <input type="email" name="email" placeholder="Email" value="<?= $email ?>"/>
    <?php if (null !== $error): ?>
    <p><?= $error ?></p>
    <?php endif; ?>
<div class="center">
    <input class="styled" type="submit" name="reset-request" value="Receive a link to reset my password">
    </div>
</form>