<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Produit.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT id_produit, photo, titre, description
    FROM produits
SQL
);

if (false === $statement->execute()) { 
    throw new RuntimeException('Erreur avec la requête !');
}

$produits = [];
while ($ligne = $statement->fetch()) {
    $produits[] = new App\Model\Produit(
        $ligne['id_produit'],
        $ligne['photo'],
        $ligne['titre'],
        $ligne['description']
    );
}

//supprimer produit
if(isset($_GET['delete_produit'])) {
    $id_produit=$_GET['delete_produit'];

    
$pdo = \App\DbConnection::current();     
$statement = $pdo->prepare(
<<<SQL
    DELETE FROM produits
    WHERE id_produit=?;
SQL
);
if (false === $statement->execute([$id_produit])) { 
    throw new RuntimeException('Erreur avec la requête de suppression!');
}
header('location:profile-pro.php');
}

// //ajouter au panier  
// if(isset($_GET['pan'])) {
    

    
// // $pdo = \App\DbConnection::current();     
// // $statement = $pdo->prepare(
// // <<<SQL
// //     IF ( EXISTS (SELECT * FROM panier),
// //     INSERT INTO panier () VALUES(),
// //     CREATE TABLE panier 
// //     ) 




// //      ), 
// //      ) clients
// //     WHERE email=?;
// // SQL
// // );
// // if (false === $statement->execute([$email])) { 
// //     throw new RuntimeException('Erreur avec la requête de suppression!');
// // }
// // header('location:profile-pro.php');

// }