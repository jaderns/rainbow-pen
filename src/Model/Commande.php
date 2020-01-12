<?php

namespace App\Model;

class Commande
{
    private $id_client;
    private $id_produit;
    private $etat;
    private $created_at;

    public function __construct(string $no_commande, string $id_client, int $id_produit, $etat, \DateTimeInterface $created_at)
    {
        $this->no_commande = $no_commande;
        $this->id_client = $id_client;
        $this->id_produit = $id_produit;
        $this->etat = $etat;
        $this->created_at = $created_at;
    }

    public function no_commande() : string
    {
        return $this->no_commande;
    }

    public function id_client() : string
    {
        return $this->id_client;
    }

    public function id_produit() : int
    {
        return $this->id_produit;
    }

    public function etat() : int
    {
        return $this->etat;
    }

    public function created_at()
    {
        return $this->created_at;
    }



}
