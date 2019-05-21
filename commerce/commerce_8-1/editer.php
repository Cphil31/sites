<?php
require_once 'inc/cfg.php';
require_once 'class/Produit.php';
require_once 'class/Categorie.php';
$opt = ['options' => ['min_range' => 1]];
$tabErreur = [];
$produit = new Produit();
if (filter_input(INPUT_POST, 'submit')) {
	$produit->id_produit = filter_input(INPUT_POST, 'id_produit', FILTER_VALIDATE_INT, $opt);
	$produit->id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT, $opt);
	$produit->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$produit->ref = filter_input(INPUT_POST, 'ref', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$produit->prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);
	if (!$produit->id_categorie || !$produit->getCategorie())
		$tabErreur[] = "La catégorie est absente ou invalide.";
	if (!$produit->nom || mb_strlen($produit->nom) > 50)
		$tabErreur[] = "Le nom est absent ou invalide.";
	if (!$produit->ref || mb_strlen($produit->ref) > 10 || $produit->refExiste())
		$tabErreur[] = "La référence est absente, invalide ou déjà existante.";
	if (!$produit->prix || $produit->prix < 0 || $produit->prix >= 1000)
		$tabErreur[] = "Le prix est absent ou invalide.";
	if (!$tabErreur) {
		$id_produit = $produit->id_produit ?: 'DEFAULT';
		$req = "INSERT INTO produit VALUES({$id_produit}, {$produit->id_categorie}, {$pdo->quote($produit->nom)}, {$pdo->quote($produit->ref)}, {$produit->prix}) ON DUPLICATE KEY UPDATE id_categorie={$produit->id_categorie}, nom={$pdo->quote($produit->nom)}, ref={$pdo->quote($produit->ref)}, prix={$produit->prix}";
		$pdo->exec($req);
		header('Location:index.php');
		exit;
	}
} else {
	$produit->id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);
	if (!$produit->id_categorie) {
		$produit->id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
		if (!$produit->id_produit) {
			header('Location:indispo.php');
			exit;
		}
		$req = "SELECT * FROM produit WHERE id_produit={$produit->id_produit}";
		$jeu = $pdo->query($req);
		$jeu->setFetchMode(PDO::FETCH_INTO, $produit);
		if (!$jeu->fetch()) {
			header('Location:indispo.php');
			exit;
		}
	}
}
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
			<!-- TODO : afficher les éventuelles erreurs. -->
			<div class="categorie">Editer un produit</div>
			<div class="erreur"><?= implode('<br/>', $tabErreur) ?></div>
			<form name="form1" action="editer.php" method="post">
				<input type="hidden" name="id_produit" value="<?= $produit->id_produit ?>"/>
				<div class="item">
					<label>Catégorie</label>
					<select name="id_categorie">
						<?php
						foreach ($tabCategorie as $categorie) {
							$selected = $categorie->id_categorie == $produit->id_categorie ? 'selected="selected"' : '';
							?>
							<option value="<?= $categorie->id_categorie ?>" <?= $selected ?>><?= $categorie->nom ?></option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="item">
					<label>Nom</label>
					<input name="nom" value="<?= $produit->nom ?>" maxlength="50" required="required"/>
				</div>
				<div class="item">
					<label>Référence</label>
					<input name="ref" value="<?= $produit->ref ?>" maxlength="10" required="required"/>
				</div>
				<div class="item">
					<label>Prix</label>
					<input type="number" name="prix" value="<?= $produit->prix ?>" min="0" max="999.99" step="0.01" required="required"/>
				</div>
				<div class="item">
					<label></label>
					<input type="button" value="Annuler" onclick="annuler()"/>
					<input type="submit" name="submit" value="Valider"/>
				</div>
			</form>
		</div>
		<footer></footer>
		<script src="js/editer.js" type="text/javascript"></script>
	</body>
</html>
