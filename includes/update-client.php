
    <?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Client.php';


$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    UPDATE clients 
    SET password=?, name=?, address=?
    WHERE email=?; 
SQL
);


if (false === $statement->execute([
    $hashedPassword,
    $new_name, 
    $new_address, 
    $email
])) { 
    throw new RuntimeException('Erreur avec la requête !');
}


return new App\Model\Client(
    $email,
    $hashedPassword,
    $new_name,
    $new_address,
    new DateTimeImmutable(),
    0
);



//password_hash('password', PASSWORD_ARGON2I); 
//password_hash('motdepasse', PASSWORD_DEFAULT);