<?php

namespace App\Model;

class Produit
{
    private $id_produit;
    private $photo;
    private $titre;
    private $description;

    public function __construct(int $id_produit, string $photo, string $titre, string $description)
    {
        $this->id_produit = $id_produit;
        $this->photo = $photo;
        $this->titre = $titre;
        $this->description = $description;
    }

    public function id_produit() : int
    {
        return $this->id_produit;
    }

    public function photo() : string
    {
        return $this->photo;
    }

    public function titre() : string
    {
        return $this->titre;
    }

    public function description() : string
    {
        return $this->description;
    }


}
