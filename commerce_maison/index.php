<?php
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
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
/*
  maniere non sécurisé:
  $id=isset($_GET['id'])?(int)$_GET['id']:0;
 */
$tab_produit = Produit::tous();
//executer une requete select

$id = isset($_GET['id_produit']) ? (int) $_GET['id_produit'] : 0;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../commerce/css/commerce.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <header></header>
        <div id="container">

            <?php
            foreach ($tab_produit as $produit) {
                ?>

                <div class="blocProduit" onclick="detail(<?= $produit->id_produit ?>)" >
                    <img src="../commerce/img/prod_<?= $produit->id_produit ?>_v.jpg" alt=""/>
                    <p class ="nom">
                        nom : <?= $produit->nom ?>
                    </p>
                    <p>
                        ref : <?= $produit->ref ?>
                    </p>
                    <p>
                        prix : <?= $produit->prix ?> 
                    </p>
                </div>


                <?php
            }
            ?>

        </div>


        <script src="js/index.js"></script>

    </body>
</html>
