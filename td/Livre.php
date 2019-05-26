<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Livre
 *
 * @author STAGIAIRE
 */
class Livre {
    
    public $titre;
    public $annee;
    
    public function __construct($titre=null,$annee=null){
    $this->titre=$titre;
    $this->annee=$annee ? $annee : date('Y');
    }
    
}
