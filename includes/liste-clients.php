<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT email, name, password, address, created_at, statut
    FROM clients
    WHERE statut=?
    ORDER BY created_at DESC;
SQL
);

if (false === $statement->execute([0])) { 
    throw new RuntimeException('Erreur avec la requête !');
}

//liste clients
$clients = [];
while ($ligne = $statement->fetch()) {
    $clients[] = new App\Model\Client(
        $ligne['email'],
        $ligne['password'],
        $ligne['name'],
        $ligne['address'],
        new DateTimeImmutable($ligne['created_at']), 
        $ligne['statut']
    );
}

//supprimer client
if(isset($_GET['delete_client'])) {
    $email=$_GET['delete_client'];
    
$pdo = \App\DbConnection::current();     
$statement = $pdo->prepare(
<<<SQL
    DELETE FROM clients
    WHERE email=?;
SQL
);
if (false === $statement->execute([$email])) { 
    throw new RuntimeException('Erreur avec la requête de suppression!');
} else {
header('location:profile-pro.php');
}
}

//modif client 
if(isset($_GET['edit'])) {
    $email=$_GET['edit'];
header("location:../admin/update-user.php?edit=$email");



}
