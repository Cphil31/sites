<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Je me connectes a une base de données 
const DSN = "mysql:dbname=commerce;
host=localhost;
charset=utf8mb4";
const ID = 'root';
const MDP = '';
const OPTIONS = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$pdo = new PDO(DSN, ID, MDP, OPTIONS);
//Je me connectes a une base de données 
