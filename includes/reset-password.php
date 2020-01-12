<?php

$currentdate = date ("U");

require_once __DIR__.'/../src/DbConnection.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT password_email, password_validator, password_expires 
    FROM password_reset
    WHERE password_selector=?;
SQL
);
if (false === $statement->execute([$selector])) { 
    throw new RuntimeException('Erreur avec la requête select!');
}

if(null == ($ligne = $statement->fetch())) {
    echo "You do need to resubmit your request didnt work!";
    echo "selector=".$selector;
} else { 
    $tokencheck = password_verify($validator,$ligne['password_validator']);  
    if (false == $tokencheck) {
        echo "validator ".$validator;
        echo " lignes ".$ligne['password_validator'];
        echo "token".$tokencheck = password_verify($validator,$ligne['password_validator']);  
        echo "You need to resubmit your requesttt";
    }
    elseif (true == $tokencheck) {
        $token_email = $ligne['password_email'];
$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    UPDATE clients
    SET password =?
    WHERE email=?;

SQL
);

 if (false === $statement->execute([ 
    $new_password,
    $token_email
])) { 
    throw new RuntimeException('Erreur avec la requête update!');
    }
    }

}

