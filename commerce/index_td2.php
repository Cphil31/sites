<?php
require_once 'inc/csg.php';

$req = "SELECT * FROM produit ORDER BY nom";
$jeu = $pdo->query($req); /* methode PDO statement */
$jeu->setFetchMode(PDO::FETCH_OBJ);
$tab = $jeu->fetchAll(); /* methode PDO statement */
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?= TITRE ?></title>
        <link href="css/commerce.css" rel="stylesheet">
        <script type="text/javascript" src="js/index.js"></script>
    </head>

    <body>
        <header></header>
        <div id="container">
            <div class="categorie">
                Produits
            </div>

            <?php
            foreach ($tab as $prod) {
                /* file_exists(chemin du fichier) consigne: faire en sorte que si le fichier n'existe pas on as l'image d'interrgogation
                 * déterminer une variable =0 
                 * si la variable = 0 
                 * ne pas modifier id produit */
                $image = "img/prod_{$prod->id_produit}_v.jpg";

                if (file_exists($image)) {
                    $image = "img/prod_{$prod->id_produit}_v.jpg";
                } else {
                    $image = "img/prod_0_v.jpg";
                }
                /*
                 * Correction 
                 * $id= file_exists("img/prod_{$prod->id_produit}_v.jpg")? $prod->id_produit :0;
                 */
                ?>

                <div class="blocProduit" onclick="detail(<?= $prod->id_produit ?>)">
                    <img src="<?= $image ?>"/> 
                    <div class="nom"> <?= $prod->nom ?> </div>
                </div>

                <?php
            }
            ?>


        </div>

        <footer></footer>


    </body>
</html>
