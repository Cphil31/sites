<?php

abstract class Image {

    public $tabErreur = [];
    protected $chemin;
    protected $largeur;
    protected $hauteur;

    public function copier($largeurCible, $hauteurCible, $cheminCible) {
        
    }

    public abstract function imagecreatefrom();

    public abstract function image();
}
