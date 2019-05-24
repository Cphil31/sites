<?php

class DBMySQL implements DB {

    private static $instance; //(instance unique)
    private static $DSN; //(DSN)
    private static $log; //(identifiant utilisateur)
    private static $mdp; // (mot de passe)
    private static $opt; // (options de connexion)
    private $db; //(instance de PDO)
    private $jeu; //(recordset après une requête SELECT)
    private $nb; //(nombre de lignes affectées par la dernière requête)

    private function __construct() {
        // créer la connexion PDO 
        // TODO.
    }

    public static function getInstance() {
        //Retourner une instance de DBMySQL
        //DESIGN pattern Singleton : garanti une unique instanciation de DBMySQL donc une unique connexion PDO .
        //TODO 
    }

    public static function setDSN($dbname, $log, $mdp, $host = 'localhost') {
        // Définir définitivement le DSN. 
        //TODO
    }

    function esc($exp) {
        // proteger  $exp pour l'utiliser dans une requete SQL . 
        //TODO 
    }

    function xeq($req) {
        // executer la requete $res (SQL) selon son type . 
        // Si SLECT retourne le nombre d'enregistrement .
        //Si pas SELECT , retourne le nombre de lignes affectées . 
        //TODO
    }

    function nb() {
        //Pour retourner le nombre 
        return$this->nb;
    }

    function tab($class = 'stdClass') {
        //A n'utiliser apres l'execution d'une requete SELECT .
        //Retourner un tableau d'instance de $class correspondant aux enregistrements sélectionnées .
        //TODO
    }

    function prem($class = 'stdClass') {
        //A n'utiliser apres l'execution d'une requete SELECT , ne selectionnant a prioris qu'un unique enregistrement 
        //Retourne le premier des enregistrements sélectionnés sous la forme d'un instance de $class
        //TODO
    }

    function ins($obj) {
        // hydrate $obj à partir du premier enregistrement présent dans le jeu
        //TODO 
    }

    function pk() {
        // retournes la derniere pk auto-incrementée
    }

    function start() {
        //débutes une transaction 
        //TODO 
    }

    function savepoint() {
        // Créer un point de restauration nommé $label.
        //TODO
    }

    function rollback() {
        // Restaurer  la base a son état en début de transaction ou au point de restauration $label. 
        //TODO
    }

    function commit() {
        // Valider la transation
        //TODO 
    }

}
