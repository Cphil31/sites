<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Voiture
 *
 * @author Philippe
 */
class Voiture {
    public $marque=null;
    public $couleur=null;
    
    public function __construct($marque ,$couleur) {
        $this->marque=$marque;
        $this->couleur=$couleur;
    }
    
    public function rouler($roule){
        $this->roule=$roule;
    }
    
}
