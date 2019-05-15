<?php
require_once 'inc/csg.php';
$id_produit = isset($_GET['id_produit']) ? (int) $_GET['id_produit'] : 0; /* je récupere d'id sur le produit clické */
$req = "SELECT * FROM produit WHERE id_produit= {$id_produit}";
$jeu = $pdo->query($req); /* j'execute cette requete ' */
$jeu->setFetchMode(PDO::FETCH_OBJ); /* mode d'execution de la requete */
$prod = $jeu->fetch(); /* methode PDO  */
$id = file_exists("img/prod_{$prod->id_produit}_p.jpg") ? $prod->id_produit : 0; /* si la photo existe tu me l'affiche ou id=0 */
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
        <title>Commerce</title>
        <link href="css/commerce.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header></header>
        <div id="container">

            <div class="categorie">
                <a href="index_td2.php">Produits</a> &gt; <?= $prod->nom ?>
            </div>

            <div id="detailProduit">
                <img src="img/prod_<?= $id ?>_p.jpg"/>

                <div class="ref">référérence <br/>
                    <?= $prod->ref ?>
                </div>
                <div class="prix"> <?= $prod->prix ?></div>
                <div>
                    <div>

                    </div>
                    <div>

                    </div>
                </div>
            </div>

            <footer></footer>
    </body>
</html>
