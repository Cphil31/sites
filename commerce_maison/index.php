<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';

$tabCategorie = Categorie::tous();


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
            <?php
            foreach ($tabCategorie as $categorie) {
                ?>
                <div class="categorie">
                    <p> <?= $categorie->nom ?></p>
                </div>  

                <?php
                foreach ($categorie->getTabProduit() as $produit) {
                    ?>

                    <div class="blocProduit" onclick="detail(<?= $produit->id_produit?>)">
                        <img src="../commerce_6/img/prod_<?= $produit->id_produit ?>_p.jpg" alt=""/>
                        <p>nom : <?= $produit->nom ?><p>
                        <p>ref : <?= $produit->ref ?></p>
                        <p>prix : <?= $produit->prix ?></p>

                    </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>

        </div>
        <footer></footer>

        <script src="js/index.js" type="text/javascript"></script>
    </body>
</html>
