<?php

class Biblio {

    public $nom;
    private $livres;

    public function __construct($nom) {

        $this->nom = $nom;

        $this->livres = [];
    }

    public function ajouterLivre(...$livres) {

        foreach ($livres as $livre) {

            if ($livre instanceof Livre)
                $this->livres[] = $livre;
        }
    }

    public function getLivres() {

        return $this->livres;
    }

}
