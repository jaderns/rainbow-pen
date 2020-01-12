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

$error = [];
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$cpassword = $_POST['cpassword'] ?? null;
$name = $_POST['name'] ?? null;
$address = $_POST['address'] ?? null;

if (null !== $email &&
false === filter_var($email, FILTER_VALIDATE_EMAIL)
) {
$error['email'] = "L'identifiant fourni n'est pas un email valide !\n";
}
if ($password !== $cpassword) {
    $error['password'] = "La confirmation du mot de passe ne correpond pas !\n";
}

if (!isset($error['email']) && null !== $email) {
    $client = require __DIR__.'/../../includes/client-par-email.php';
    if ($client instanceof Client) {
        $error['email'] = 'Email déjà utilisé !';
    }
}

if (count($error) === 0 && null !== $email) {
    $client = require __DIR__.'/../../includes/nouveau-client.php';
    if ($client instanceof Client) {
        if (1 == $_GET['new']) {
            header('location: ../admin/profile-pro.php');
            exit(); 
        } else {
            SessionManager::loginClient($client);
            header('location: ../index.php');
            exit();
        }
    } else {
        $error['enregistrement'] = 'Erreur pendant enregistrement !';
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
                    <h2>Création de votre compte</h2>
                    <!--<?php if(!empty($arr_message['msg'])) { ?>
                        <div class="alert <?php echo $arr_message['class']; ?>"><?php echo $arr_message['msg']; ?></div>
                    <?php } ?>-->
                    <form method="post">
                            <label for="exampleInputFullname">Nom</label>
                            <input class="champ_form" type="text" name="name" placeholder="Nom" value="<?= $name; ?>" required>

                            <label for="exampleInputEmail1">Adresse Email</label>
                            <input type="email" name="email" placeholder="Email" value="<?= $email; ?>" required>
                           <!-- <?php if (isset($error['email'])): ?>
                                <p><?= $error['email'] ?></p>
                            <?php endif; ?>-->
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" id="exampleInputPassword1" name="password" placeholder="ex: Motdepasse123" required>
                            <!--<?php if (isset($error['password'])): ?>
                                <p><?= $error['password'] ?></p>
                            <?php endif; ?>-->
                            <label for="exampleInputPassword2">Confirmation Mot de passe</label>
                            <input type="password" name="cpassword" placeholder="Confirmation de votre mot de passe" required>

                            <label for="exampleInputAddress">Adresse postale</label>
                            <input type="text" name="address" placeholder="ex: 12 avenue du rainbow, 69000 Lyon" value="<?= $address; ?>" required>

                                <div class="row justify-content-around">
                        <button type="submit" name="submit" class="btn btn-default styled">Créer mon compte</button>
                        <a class="styled" href="index.php">Annuler</a>
</div>

                   
                    </form>
                </div>
            </div>
        </div>