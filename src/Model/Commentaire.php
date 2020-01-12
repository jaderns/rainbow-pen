<?php

namespace App\Model;

class Commentaire
{
    private $id_commentaire;
    private $id_client;
    private $created_at;
    private $contenu;
    private $score;

    public function __construct(string $id_client, \DateTimeInterface $created_at, string $contenu, int $score)
    {

        $this->id_client = $id_client;
        $this->created_at = $created_at;
        $this->contenu = $contenu;
        $this->score = $score;
        
    }

    
    public function id_client() : string
    {
        return $this->id_client;
    }

    public function contenu() : string
    {
        return $this->contenu;
    }

    public function score() : int
    {
        return $this->score;
    }

    public function created_at()
    {
        return $this->created_at;
    }



}
