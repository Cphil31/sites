<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produit
 *
 * @author STAGIAIRE
 */
class Produit {

    public $id_produit;
    public $id_categorie;
    public $nom;
    public $ref;
    public $prix;

    public function __construct($id_produit = null, $id_categorie = null, $nom = null, $ref = null, $prix = null) {
        $this->id_produit = $id_produit;
        $this->id_categorie = $id_categorie;
        $this->nom;
        $this->ref;
        $this->prix;
    }

    public static function tous() {
        global $pdo;
        $req = "SELECT * FROM produit ORDER BY nom";
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
        return $jeu->fetchAll();
    }

}
