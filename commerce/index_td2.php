<?php
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
/* connexion a une base de données */

/* executer une requete  */

/* $req = "UPDATE produit SET prix =prix / 2";
  echo $pdo->exec($req); */

/* executer une requete  */

/* exercice */
/*
  1- faire une requete select qui selectionnes tout les produits
  2- executer la requete
  3- preciser el mode de récuperation (fetch obs)
  4- récuperer les enregistrement sous forme d'un tableau
  5- exploiter ce tableau php pour fabriquer un tableau HTML

 */



$req = "SELECT * FROM produit ORDER BY nom";
$jeu = $pdo->query($req); /* methode PDO statement */
$jeu->setFetchMode(PDO::FETCH_OBJ);
$tab = $jeu->fetchAll(); /* methode PDO statement */
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

    </head>
    <link href="css/commerce.css" rel="stylesheet">
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
                    $image="img/prod_{$prod->id_produit}_v.jpg";
                } else {
                  $image="img/prod_0_v.jpg";
                }
                ?>
                <div class="blocProduit">
                    <img src="<?= $image?>"/> 
                    <div class="nom"> <?= $prod->nom ?> </div>
                </div>
                <?php
            }
            ?>


        </div>

        <footer></footer>
    </body>
</html>
