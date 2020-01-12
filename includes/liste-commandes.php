<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT no_commande, id_client, id_produit, etat, created_at
    FROM commandes
    ORDER BY created_at DESC;
SQL
);

if (false === $statement->execute()) { 
    throw new RuntimeException('Erreur avec la requête !');
}

$commandes = [];
while ($ligne = $statement->fetch()) {
    $commandes[] = new App\Model\Commande(
        $ligne['no_commande'],
        $ligne['id_client'],
        $ligne['id_produit'],
        $ligne['etat'],
        new \DateTimeImmutable($ligne['created_at'])
    );
}

//modifier statut commande
if (isset($_GET['update_status'])) {
    $no_commande=$_GET['update_status'];
    if (0 == $_POST['statut']){
$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    UPDATE commandes 
    SET etat=0
    WHERE no_commande=?; 
SQL
);


if (false === $statement->execute([$no_commande])) {
    throw new RuntimeException('Erreur avec la requête !');
} else {
header('location:profile-pro.php');
}

    } elseif (1 == $_POST['statut']) {
    $pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    UPDATE commandes 
    SET etat=1
    WHERE no_commande=?; 
SQL
);

//envoyer mail à client si commande envoyé
if (false === $statement->execute([$no_commande])) {
    throw new RuntimeException('Erreur avec la requête !');
} else {
$mail = 1;
$email = $_POST['email'];
require 'mail-confirmation-commande.php';
header('location:profile-pro.php');
}
}
}

//supprimer commande
if(isset($_GET['delete_commande'])) {
    $no_commande=$_GET['delete_commande'];

    
$pdo = \App\DbConnection::current();     
$statement = $pdo->prepare(
<<<SQL
    DELETE FROM commandes
    WHERE no_commande=?;
SQL
);
if (false === $statement->execute([$no_commande])) { 
    throw new RuntimeException('Erreur avec la requête de suppression!');
}
header('location:profile-pro.php');
}