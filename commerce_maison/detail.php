<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, ['min_range' => 1]);

$req = "SELECT * FROM produit WHERE id_produit={$id_produit}";
$jeu = $pdo->query($req);
$jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
$produit = $jeu->fetch();
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
        <link href="../commerce_6/css/commerce.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header></header>



        <div id="container">
            <div class="categorie">
                <a href="index.php">produit</a> > <?= $produit->getCategorie()->nom ?>  
            </div>

            <div id="detailProduit">
                <img src="../commerce/img/prod_<?= $id_produit ?>_p.jpg" alt=""/>
                <div class="prix"><?= $produit->prix ?></div>
                    <div class="ref">Reference<br/>
                        <?= $produit->ref ?>
                    </div>
                <div>
                </div>
            </div>
        </div>


        <footer></footer>


    </body>
</html>
