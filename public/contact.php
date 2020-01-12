<html>
    <body>

        <?php 
include('header.php');

if (isset($_POST['submit'])) {
$email = $_POST['email'] ?? null; 
$subject = $_POST['subject'] ?? null; 
$message = $_POST['message'] ?? null; 
$mail = 2;
require __DIR__.'/../includes/mail-confirmation-commande.php';
}

?>
        <div class="container">
            <div class="row color3dark align-items-start">
                <h2 class="offset-lg-1 col-lg-8">Nous contacter</h2>

                <div class="form_box offset-sm-1 col-lg-4 col-sm-10">
                    <p>Email</p>
                    <p>rainbow-pen@alwaysdata.net</p>
                    <p>Téléphone</p>
                    <p>+337 08 09 10 11</p>
                    <p>Réseaux sociaux</p>
                    <p><a target="_blank" href="https://twitter.com/"><img class="icon_delete" src="/rainbow/public/photos/icon_social-01.png" alt=""></a>
                    <a target="_blank" href="https://www.instagram.com/"><img class="icon_delete" src="/rainbow/public/photos/icon_social-02.png" alt=""></a>
                    <a target="_blank" href="https://www.facebook.com/"><img class="icon_delete" src="/rainbow/public/photos/icon_social-03.png" alt=""></a>
                </p>
            </div>
            <form class="form_box offset-sm-1 col-lg-5 col-sm-10" method="post">

                <label for="name">Nom</label>
                <input
                    type="text"
                    name="name"
                    value="<?php if ($client) echo $client->name(); ?> "
                    required="required"/>

                <label for="email">Email</label>
                <input
                    type="text"
                    name="email"
                    value="<?php if ($client) echo $client->email() ?? null ?>"
                    required="required"/>

                <label for="subject">Subjet</label>
                <select name="subject" required="required">
                    <option value="">Choisissez un sujet..</option>
                    <option value="question">J'ai une question</option>
                    <option value="question">J'ai un problème</option>
                    <option value="question">J'ai un avis</option>
                    <option value="question">Je veux travailler chez vous</option>
                    <option value="question">Autres</option>
                </select>

                <label for="message">
                    Message</label>
                <textarea name="message" rows="8" cols="80" placeholder="Votre message.."></textarea>

                <div class="row justify-content-around">
                    <input class="styled" type="submit" name="submit" value="Send">
                    <input class="styled" type="reset" name="reset" value="Reset">
                </div>
            </div>
        </div>

    </div>
    <?php 
include('footer.php');
?>
</body>
</html>