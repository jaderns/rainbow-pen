<?php

namespace App;

require_once __DIR__.'/Model/Client.php';

use App\Model\Client;

class SessionManager
{
    private static $started = false;

    private static function start(): void
    {
        if (false === self::$started) {
            if (false === session_start()) {
                throw new \RuntimeException('Impossible de démarrer la session !');
            }
            self::$started = true;
        }
    }

    public static function logout(): void
    {
        self::start();
        session_destroy();
    }

    public static function loginClient(Client $client): void
    {
        self::start();
        $_SESSION['client_email'] = $client->email();
    }

    public static function loggedClient(): ?Client
    {
        self::start();

        if (null === $email = $_SESSION['client_email'] ?? null) {
            return null;
        }

        $client = require __DIR__.'/../includes/client-par-email.php';
        if (null === $client) {
            unset($_SESSION['client_email']);
        }
        return $client;
    }

//     public static function cart($cart): void
//     {
//         self::start();
//         $_SESSION['cart'] = $cart;
//     }
}
