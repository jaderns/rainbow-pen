<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT no_commande, id_produit, etat, created_at
    FROM commandes
    WHERE id_client=?;
SQL
);

if (false === $statement->execute([$email])) { 
    throw new RuntimeException('Erreur avec la requête !');
}

$commandes = [];
while ($ligne = $statement->fetch()) {
    $commandes[] = new App\Model\Commande(
        $ligne['no_commande'],
        $email,
        $ligne['id_produit'],
        $ligne['etat'],
        new \DateTimeImmutable($ligne['created_at'])
    );
}