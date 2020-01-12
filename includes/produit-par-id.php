<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Produit.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT id_produit, photo, titre, description
    FROM produits
    WHERE id_produit=?;
SQL
);

if (false === $statement->execute([$id_produit])) { 
    throw new RuntimeException('Erreur avec la requête !');
}

if($ligne = $statement->fetch()) {
    return new App\Model\Produit(
        $ligne['id_produit'],
        $ligne['photo'],
        $ligne['titre'],
        $ligne['description']
    );
} else {
    return null;
}