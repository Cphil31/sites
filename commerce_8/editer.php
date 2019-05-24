<?php
require_once 'inc/cfg.php';

require_once 'class/Categorie.php';

require_once 'class/Produit.php';

require_once '../framework/Upload.php';

require_once '../framework/AbstractImage.php';

require_once '../framework/ImageJPEG.php';

$opt = ['options' => ['min_range' => 1]];

// Créer un tableau d'erreur vide

$tabErreur = [];

$produit = new Produit();

if (filter_input(INPUT_POST, 'submit')) {

    // Récupérer les données POST

    $produit->id_produit = filter_input(INPUT_POST, 'id_produit', FILTER_VALIDATE_INT, $opt);

    $produit->id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT, $opt);

    $produit->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    $produit->ref = filter_input(INPUT_POST, 'ref', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    $produit->prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);

    // Vérifier si id_categorie entier strictement positif et existant.

    if (!$produit->id_categorie || !$produit->categorie) {

        $tabErreur[] = "La categorie est absente ou invalide.";
    }

    // Sinon, ajouter une erreur au tableau d'erreurs.
    // Vérifier si nom pas vide.

    if (!$produit->nom || mb_strlen($produit->nom) > 50) {

        $tabErreur[] = "La nom est absente ou invalide.";
    }

    // Sinon, ajouter une erreur au tableau d'erreurs.
    // Vérifier si ref pas vide et pas déjà existant.

    if (!$produit->ref || mb_strlen($produit->ref) > 10 || $produit->refExiste()) {

        $tabErreur[] = "La référence est absente, invalide ou déjà existance.";
    }

    // Sinon, ajouter une erreur au tableau d'erreurs.
    // Vérifier si prix positif et <1000.

    if (!$produit->prix || $produit->prix < 0 || $produit->prix >= 1000) {

        $tabErreur[] = "La prix est absente ou invalide.";
    }

    // Sinon, ajouter une erreur au tableau d'erreurs.
    // Si données POST ok alors INSERT en base puis redirection vers Index.php

    if (!$tabErreur) {

        $pdo->beginTransaction();

        $id_produit = $produit->id_produit ?: 'DEFAULT';

        $req = "INSERT INTO produit VALUES ({$id_produit}, {$produit->id_categorie}, {$pdo->quote($produit->nom)}, {$pdo->quote($produit->ref)}, {$produit->prix}) ON DUPLICATE KEY UPDATE id_categorie = {$produit->id_categorie}, nom = {$pdo->quote($produit->nom)}, ref = {$pdo->quote($produit->ref)}, prix = {$produit->prix}";

        $pdo->exec($req);

        $produit->id_produit = $produit->id_produit ?: $pdo->lastInsertId();

        $upload = new Upload('photo', TAB_MIME);

        // L'upload est facultatif.

        if ($upload->codeErreur === UPLOAD_ERR_NO_FILE) {

            $pdo->commit();

            header("Location:index.php");

            exit;
        }

        // Un upload a bien eu lieu.

        $tabErreur = $upload->tabErreur;

        if (!$tabErreur) {

            $imageJPEG = new ImageJPEG($upload->cheminServeur);

            $imageJPEG->copier(IMG_P_LARGEUR, IMG_P_HAUTEUR, "img/prod_{$produit->id_produit}_p.jpg");

            $imageJPEG->copier(IMG_V_LARGEUR, IMG_V_HAUTEUR, "img/prod_{$produit->id_produit}_v.jpg", AbstractImage::COVER);

            $tabErreur = $imageJPEG->tabErreur;

            if (!$tabErreur) {

                $pdo->commit();

                header("Location:index.php");

                exit;
            }
        }

        $pdo->rollback();
    }
} else {

    $produit->id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);

    if (!$produit->id_categorie) {

        $produit->id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);

        if (!$produit->id_produit) {

            header("Location:indispo.php");

            exit;
        }

        $req = "SELECT * FROM produit WHERE id_produit = {$produit->id_produit}";

        $jeu = $pdo->query($req);

        $jeu->setFetchMode(PDO::FETCH_INTO, $produit);

        if (!$jeu->fetch()) {

            header("Location:indispo.php");

            exit;
        }
    }
}

$tabCategorie = Categorie::tous();
$id = file_exists("img/prod_{$produit->id_produit}_v.jpg") ? $produit->id_produit : 0;
$maj = !$id ?: (new SplFileInfo("img/prod_{$id}_v.jpg"))->getMTime();
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

            <div class="categorie">Editer un produit</div>

            <!-- TODO : Afficher les éventuelles erreurs. -->

            <div class="erreur"><?= implode('<br/>', $tabErreur) ?></div>

            <form name="form1" action="editer.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_produit" value="<?= $produit->id_produit ?>" />

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

                    <input name="nom" value="<?= $produit->nom ?>" maxlength="50" required="required" />                   

                </div>

                <div class="item">

                    <label>Référence</label>

                    <input name="ref" value="<?= $produit->ref ?>" maxlength="10" required="required" />

                </div>

                <div class="item">

                    <label>Prix</label>

                    <input type="number" name="prix" value="<?= $produit->prix ?>" min="0" max="999.99" step="0.01" required="required" />

                </div> 

                <div class="item">

                    <label>Photo (JPEG)</label>

                    <input id="photo"  type="file" name="photo" onchange="afficherPhoto(this.files)" />

                    <input type="button" value="Parcourir..." onclick="this.form.photo.click()"/>

                </div> 

                <div class="item">

                    <label></label>

                    <input type="button" value="Annuler" onclick="annuler()"/>

                    <input type="submit" name="submit" value="Valider"/>



                </div>





            </form>

            <div id="vignette" style="background-image:url('img/prod_<?= $id ?>_v.jpg?maj<?= $maj ?>'); "></div>

        </div>

        <footer></footer>

        <script>

            const MAX_FILE_SIZE = <?= Upload::maxFileSize() ?>;

            const TAB_MIME = ['<?= implode("','", TAB_MIME) ?>'];

        </script>

        <script src="js/editer.js" type="text/javascript"></script>  

    </body>

</html>