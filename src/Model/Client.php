<?php

namespace App\Model;

class Client
{
    private $email;
    private $password;
    private $name;
    private $address;
    private $created_at;
    private $statut;

    public function __construct(string $email, string $password, string $name, string $address, \DateTimeInterface $created_at, $statut)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->address = $address;
        $this->created_at = $created_at;
        $this->statut = $statut;
    }

    public function password(): string //getPassword()
    {
        return $this->password;
    }

    public function email(): string 
    {
        return $this->email;
    }

    public function name(): string 
    {
        return $this->name;
    }

    public function address(): string 
    {
        return $this->address;
    }

    public function statut() 
    {
        return $this->statut;
    }
}
