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
  3- preciser le mode de récuperation (fetch obJ)
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
            <div class='categorie'>
                Produits
            </div>
            <table border="1">
                <thead>

                    <tr>
                        <th>Nom</th>
                        <th>Ref.</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tab as $prod) {
                        ?>
                        <tr>
                            <td> <?= $prod->nom ?>   </td>
                            <td><?= $prod->ref ?></td>
                            <td><?= $prod->prix ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <footer></footer>
    </body>
</html>
