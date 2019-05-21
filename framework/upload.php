<?php

class Upload {

    public $nomChamp;
    public $tabMIME = [];
    public $nomClient;
    public $extension;
    public $cheminServeur;
    public $codeErreur;
    public $octets;
    public $typeMIME;
    public $tabErreur = [];

    public function __construct() {
        
    }

    public function sauver($chemin) {

        if (!move_uploaded_file($this->cheminServeur, $chemin)) {

            $this->tabErreur[] = "Enregistrement du fichier impossible.";
        }
    }

    public static function maxFileSize($enOctets = true) {

        $kmg = ini_get('upload_max_filesize');

        if (!$enOctets) {

            return $kmg;
        }

        $kmg = str_ireplace('G', '*1024**3+', $kmg);

        $kmg = str_ireplace('M', '*1024**2+', $kmg);

        $kmg = str_ireplace('K', '*1024+', $kmg);

        $kmg .= '0';

        eval("\$octets = {$kmg};");

        return $octets;
    }

}

var_dump(Upload::maxFileSize());
