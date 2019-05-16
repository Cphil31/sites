<?php

class Produit {

    public $id_produit;
    public $id_categorie;
    public $nom;
    public $ref;
    public $prix;

    public function __construct($id_produit = null, $id_categorie = null, $nom = null, $ref = null, $prix = null) {

        $this->id_produit = $id_produit;
        $this->id_produit = $id_categorie;
        $this->nom = $nom;
        $this->ref = $ref;
        $this->prix = $prix;
    }

    public function getCategorie() {
        global $pdo;
        $req = "SELECT * FROM categorie WHERE id_categorie = {$this->id_categorie}";
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        return $jeu->fetch();
    }

    public static function tous() {
        global $pdo;
        $req = "SELECT * FROM produit ORDER BY id_categorie";
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
        return $jeu->fetchAll();
    }

}
