<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author STAGIAIRE
 */
class Client{
public $nom;
public $code;
public function __construct($nom=null,$code=0){
$this->nom=$nom;
$this->code=$code;
}
public function acheter(){
echo "{$this->nom} achète un produit";
}
}
