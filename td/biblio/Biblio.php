<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Biblio
 *
 * @author STAGIAIRE
 */
class Biblio {
    public $nom;
    private $livres= [];
    public function __construct($nom=null,$livre=null){
    $this->nom=$nom;
    $this->livres=$livre;
    }
    public function ajouterLivre ($livre) {
        /*si cette variable est une instance de la classe livre alors on ajoute le livre */
        if($livre instanceof Livre){
            $this->livre[] = $livre;
        }
        $this->livres[] = $livre;
    }
    public function getLivres() {
        return $this->livres;
    }
}