<?php

const TITRE = "LOWA";

/* connexion a une base de données */
const DSN = "mysql:dbname=commerce;
host=localhost;
charset=utf8mb4";
const ID = 'root';
const MDP = '';
const OPTIONS = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
/* connexion a une base de données */

/* au cas ou il y as erreur */
try {
    $pdo = new PDO(DSN, ID, MDP, OPTIONS);
} catch (PDOExeception $e) {
    echo "{$e->getMessage()}<br/>";
    exit("connexxxion DB impossible");
}
/* au cas ou il y as erreur */

$pdo = new PDO(DSN, ID, MDP, OPTIONS);


