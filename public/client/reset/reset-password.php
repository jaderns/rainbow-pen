<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link
            href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="/rainbow/bootstrap-4.4.1-dist/css/bootstrap-grid.css">
        <link rel="stylesheet" href="/rainbow/style/css/style_spe_3.css" media="screen">
    </head>
<?php 

// $selector=$_GET['selector'];
// $validator=$_GET['validator'];
$selector=$_GET['selector'];
$validator=$_GET['validator'];

if (null === $selector || null === $validator) {
    echo "La demande de réinitialisation n'a pas fonctionnée, veuillez réessayer";
} else {
    if (false !== ctype_xdigit($selector) && false !== ctype_xdigit($validator)) {
        ?>

    <body>
        <div class="container">
            <div class="row">
                <a class=" center offset-sm-5 col-sm-2" href="/rainbow/public/index.php">
                    <img class="logo_form" src="../../photos/logo.png" alt="rainbowlogo">
                </a>
            </div>
            <div class="row">
                <div class="form_box offset-lg-2 col-lg-8">
                    <h2>Reset your password</h2>
                    <form method="post">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe"/>
                        <label for="cpassword">Confirmation nouveau mot de passe</label>
                        <input
                            type="password"
                            name="cpassword"
                            placeholder="Confirmez le mot de passe"/>
                        <?php if (isset($error['password'])){
            echo "<p>".$error['password']."</p>";
            } ?>
                        <div class="row justify-content-around">
                            <input class="styled" type="submit" value="Valider"/>
                        </div>
                    </form>

                <?php

        $password = $_POST['password'] ?? null;
        $cpassword = $_POST['cpassword'] ?? null;
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        
        
        if (null !== $password || null !== $cpassword) {
            if ($password !== $cpassword) {
                $error['password'] = "La confirmation du mot de passe ne correpond pas !\n";
            } else {
                require __DIR__.'/../../../includes/reset-password.php'; 
                header('location: reset-confirmation.php');
            }   
        }
    } else {
        echo "Attention, La demande de réinitialisation n'a pas fonctionnée, veuillez réessayer";
    }
}
?>