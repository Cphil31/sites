<?php
const TITRE = "LOWA";
// Connexion DB
const DSN = "mysql:dbname=commerce;host=localhost;charset=utf8mb4";
const ID = 'root';
const MDP = '';
const OPTIONS = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO(DSN, ID, MDP, OPTIONS); //elements de la base de données
} catch (PDOException $e) {
    echo "{$e->getMessage()}<br/>";
    exit("Connexion DB impossible.");
}
//executer une requete select

$req = "SELECT * FROM produit";
$jeu = $pdo->query($req); //je fais ma requetes sur base de données
$jeu->setFetchMode(PDO::FETCH_OBJ);
$tab = $jeu->fetchAll();
//executer une requete select
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../commerce/css/commerce.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php
        foreach ($tab as $item) {
            ?>
            <div class="blocProduit" >

            </div>
            <img src="../commerce/img/prod_<?= $item->id_produit ?>_v.jpg" alt=""/>
            <p>
                nom : <?= $item->nom ?>
            </p>
            <p>
                nom : <?= $item->ref ?>
            </p>
            <p>
                nom : <?= $item->prix ?>
            </p>

            <?php
        }
        ?>


    </body>
</html>
