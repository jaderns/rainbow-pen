
    <?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Client.php';


// if( null === $email) {
//     throw new RuntimeException('La variable $email doit être définie!');
// }

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    INSERT INTO clients (email, password, name, address) 
    VALUES (?, ?, ?, ?);
SQL
);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if (false === $statement->execute([
    $email, 
    $hashedPassword,
    $name, 
    $address
])) { 
    throw new RuntimeException('Erreur avec la requête !');
}


return new App\Model\Client(
    $email,
    $hashedPassword,
    $name,
    $address,
    new DateTimeImmutable(),
    0
);



//password_hash('password', PASSWORD_ARGON2I); 
//password_hash('motdepasse', PASSWORD_DEFAULT);