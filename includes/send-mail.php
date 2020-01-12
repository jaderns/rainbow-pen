<?php 
$selector =rand(1,10000000); 
$validator =rand(1,10000000);
$link = "http://rainbow-pen.alwaysdata.net/client/reset/reset-password.php?selector=".$selector."&validator=".$validator;

$expire = date ("U") + 900; 

require_once __DIR__.'/../src/DbConnection.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    DELETE FROM password_reset 
    WHERE password_email=?;
SQL

);
if (false === $statement->execute([$email])) {
    throw new RuntimeException('Erreur avec la requête !');
}

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare( 
<<<SQL
    INSERT INTO password_reset (password_email, password_selector, 
    password_validator, password_expires) 
    VALUES (?, ?, ?, ?);
SQL
);

$hashed_validator = password_hash($validator, PASSWORD_DEFAULT);


if (false === $statement->execute([
    $email, 
    $selector,
    $hashed_validator, 
    $expire
])) { 
    throw new RuntimeException('Erreur avec la requête insert into!');
}

$to = $email;
$subject = 'Le lien pour réinitialiser votre mot de passe rainbow'; 
$message = utf8_encode('
<p>Vous avez demandez la reinitialisation de votre mot de passe. Pour choisir un nouveau mot de passe, merci de cliquer sur le lien ci-dessous. Si cette demande ne vient pas de vous, veuillez ignorer cet email. </p>
<p><a href= "'.$link.'">'.$link.'</a></p>'); 

$headers = "From: rainbow <rainbow-pen@alwaysdata.net>\r\n";
$headers .= "Reply-To: rainbow-pen@alwaysdata.net\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";


if (null === mail($to,$subject,$message,$headers)){
    throw new RuntimeException('Erreur avec le mail !');
}