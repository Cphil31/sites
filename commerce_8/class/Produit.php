<?php

class Produit {

    public $id_produit;
    public $id_categorie;
    public $nom;
    public $ref;
    public $prix;

    public function __construct($id_produit = null, $id_categorie = null, $nom = null, $ref = null, $prix = null) {
        $this->id_produit = $id_produit;
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->ref = $ref;
        $this->prix = $prix;
    }

    public function getCategorie() {
        global $pdo;
        $req = "SELECT * FROM categorie WHERE id_categorie={$this->id_categorie}";
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        return $jeu->fetch();
    }

    public function refExiste() {
        global $pdo;
        $id_produit = $this->id_produit ?: 0;
        $req = "SELECT * FROM produit WHERE ref={$pdo->quote($this->ref)} AND id_produit!={$id_produit}";
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
        return (bool) $jeu->fetch();
    }

    public static function tous() {
        global $pdo;
        $req = "SELECT * FROM produit ORDER BY nom";
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
        return $jeu->fetchAll();
    }

}
