
    <?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';



$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    INSERT INTO commandes (no_commande, id_client, id_produit) 
    VALUES (?, ?, ?);
SQL
);

if (false === $statement->execute([
    $no_commande,
    $email, 
    $id_produit
])) { 
    throw new RuntimeException('Erreur avec la requête !');
}


return new App\Model\Commande(
    $no_commande,
    $email,
    $id_produit,
    0,
    new DateTimeImmutable()  
);

