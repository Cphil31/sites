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
// je récupere l'id du produit que j'ai cliqué 
$opt = ['options' => ['min_range' => 1]];
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
// je récupere l'id du produit que j'ai cliqué 
//je fais ma requete
$req = "SELECT * FROM produit WHERE id_produit={$id_produit}";
$jeu = $pdo->query($req); //je fais ma requetes sur base de données
$jeu->setFetchMode(PDO::FETCH_OBJ); // je selectionne le mode 
$tab = $jeu->fetch();
//je fais ma requete
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../commerce/css/commerce.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>


        <div id="container">


            <div class="blocProduit" >
                <img src="../commerce/img/prod_<?= $id_produit ?>_p.jpg" alt=""/>

                <div class="prix">Nom : <?= $tab->nom ?></div>
                <div class="prix">ref : <?= $tab->ref ?></div>
                <div class="prix">prix : <?= $tab->prix ?></div>

            </div>
        </div>




    </body>
</html>
