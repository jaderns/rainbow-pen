<?php 

namespace App; 

require_once __DIR__.'/../config.php';

class DbConnection
{
    private static $pdo; 

    public static function current (): \PDO
    {
        if (null === self::$pdo) {
            //construire connection
            self::$pdo = new \PDO( //cours 6 page 5
                DATABASE_DSN, 
                DATABASE_USER, 
                DATABASE_PASSWORD
            );
        }
        return self::$pdo;
    }
}
