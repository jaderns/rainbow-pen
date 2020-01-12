
    <?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commentaire.php';

$email = $_POST['email'] ?? null;
$contenu = $_POST['contenu'] ?? null;
$score = $_POST['score'] ?? null;

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    INSERT INTO commentaires (id_client, contenu, score) 
    VALUES (?, ?, ?);
SQL
);

if (false === $statement->execute([
    $email,
    $contenu, 
    $score
])) { 
    throw new RuntimeException('Erreur avec la requête !');
}


return new App\Model\Commentaire(
    $email,
    new DateTimeImmutable(),
    $contenu,
    $score
);

