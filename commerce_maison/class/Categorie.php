<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categorie
 *
 * @author STAGIAIRE
 */
class Categorie {

    public $id_categorie;
    public $nom;

    public function __construct($id_categorie = null, $nom = null) {
        $this->id_categorie = $id_categorie;
        $this->nom;
    }

    public static function getTabProduit() {
        
    }

}
