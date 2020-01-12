<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commentaire.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT id_client, created_at, contenu, score
    FROM commentaires
    ORDER BY created_at DESC;
SQL
);

if (false === $statement->execute([])) { 
    throw new RuntimeException('Erreur avec la requête !');
}

    
//liste commentaires
$commentaires = [];
while ($ligne = $statement->fetch()) {
    $commentaires[] = new App\Model\Commentaire(
        $ligne['id_client'],
        new DateTimeImmutable($ligne['created_at']), 
        $ligne['contenu'],
        $ligne['score']
    );
}

// //supprimer commentaire
if(isset($_GET['delete_commentaire'])) {
    echo "first".$created_at=strval($_GET['delete_commentaire']);
    echo "second".$created_at=strval(str_replace('/', ' ', $created_at));

$pdo = \App\DbConnection::current();     
$statement = $pdo->prepare(
<<<SQL
    DELETE FROM commandes
    WHERE created_at=?;
SQL
);
if (false === $statement->execute([$created_at])) { 
    throw new RuntimeException('Erreur avec la requête de suppression!');
}
header('location:profile-pro.php');
}