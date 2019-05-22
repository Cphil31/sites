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
$req = "SELECT * FROM produit WHERE id_produit={$id_produit}";
$jeu = $pdo->query($req);
$jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
$produit = $jeu->fetch();
if (!$produit) {
	header('Location:indispo.php');
	exit;
}
$id = file_exists("img/prod_{$produit->id_produit}_p.jpg") ? $produit->id_produit : 0;
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
				<a href="index.php"><?= $produit->getCategorie()->nom ?></a> &gt; <?= $produit->nom ?>
			</div>
			<div id="detailProduit">
				<img src="img/prod_<?= $id ?>_p.jpg" alt=""/>
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
