<?php

const TITRE = "LOWA";
// Connexion DB
const DSN = "mysql:dbname=form_commerce;host=localhost;charset=utf8mb4";
const ID = 'adok';
const MDP = 'adok';
const OPTIONS = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
	$pdo = new PDO(DSN, ID, MDP, OPTIONS);
} catch (PDOException $e) {
	echo "{$e->getMessage()}<br/>";
	exit("Connexion DB impossible.");
}

