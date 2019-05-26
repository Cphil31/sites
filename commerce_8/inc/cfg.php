<?php

const TITRE = "LOWA";
//images
/*const TAB_MIME = ['image/jpeg'];
const _V_LARGEUR = 300; //px 
const _V_HAUTEUR = 300; //px
const _P_LARGEUR = 300; //px
const _V_HAUTEUR = 300; //px*/
// Connexion DB
const DSN = "mysql:dbname=commerce;host=localhost;charset=utf8mb4";
const ID = 'root';
const MDP = '';
const OPTIONS = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO(DSN, ID, MDP, OPTIONS);
} catch (PDOException $e) {
    echo "{$e->getMessage()}<br/>";
    exit("Connexion DB impossible.");
}

