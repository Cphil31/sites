<?php
require_once 'inc/cfg.php';
require_once 'class/Produit.php';
require_once 'class/Categorie.php';
$opt = ['options' => ['min_range' => 1]];
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
if (!$id_produit) {
    header('Location:indispo.php');
    exit;
}
$produit = new Produit($id_produit);
$req = "SELECT * FROM produit WHERE id_produit={$produit->id_produit}";
$jeu = $pdo->query($req);
$jeu->setFetchMode(PDO::FETCH_INTO, $produit);
if (!$jeu->fetch()) {
    header('Location:indispo.php');
    exit;
}
$id = file_exists("img/prod_{$produit->id_produit}_p.jpg") ? $produit->id_produit : 0;
$maj = !$id ?: (new SplFileInfo("img/prod_{$id}_p.jpg"))->getMTime();
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
            <div class="categorie">
                <a href="index.php"><?= $produit->categorie->nom ?></a> &gt; <?= $produit->nom ?>
            </div>
            <div id="detailProduit">
                <img src="img/prod_<?= $id ?>_p.jpg?maj=<?= $maj ?>" alt=""/>
                <div>
                    <div class="prix"><?= $produit->prix ?></div>
                    <div class="ref">référence<br/>
                        <?= $produit->ref ?></div>
                </div>
            </div>
        </div>
        <footer></footer>
    </body>
</html>
