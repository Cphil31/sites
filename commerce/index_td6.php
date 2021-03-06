<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
$tabCategorie = Categorie::tous();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= TITRE ?></title>
        <link href="css/commerce.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>
        <header></header>

        <div id="container">
            <?php
            foreach ($tabCategorie as $categorie) {
                ?>


                <div class="categorie"><img class="ico" src="img/ico_add.svg" onclick="editer(<?= $categorie->id_categorie ?>)"/><?= $categorie->nom ?></div>
                <div class="erreur"><?= implode('</br>', $tabErreur) ?></div><!-- la methode implode : qui prends les cases d'un tableau qui les mets bout a bout avec un séprarteur-->


                <?php
                foreach ($categorie->getTabProduit() as $produit) {
                    $id = file_exists("img/prod_{$produit->id_produit}_v.jpg") ? $produit->id_produit : 0;
                    ?>
                    <div class="blocProduit" onclick="detail(<?= $produit->id_produit ?>)"> 

                        <img src="img/prod_<?= $id ?>_v.jpg" alt=""/>

                        <div class="nom"><?= $produit->nom ?> </div>
                    </div>
                    <?php
                }
            }
            ?>            
        </div>


        <footer></footer>
        <script src="js/index.js" type="text/javascript"></script>
    </body>
</html>