<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
$opt = ['options' => ['min_range' => 1]];
//créer un tableau d'erreur vide
if (filter_input(INPUT_POST, 'submit')) {
    //TODO :recuperer  les données POST 
    // verifier si id_categories entier strictement positif et  existant 
    // sinon, ajouter une erreur au tableau d'erreurs 
    // si données POST OK alors INSERT puis redirection vers index.php
    // vérifier si nom pas vide sinon ajouter une erreur au tableau d'erreurs 
    // vérifier si ref pas vide est pazs déja existant sinon ajouter une erreur au tableau d'erreurs 
    // vérifier si prix est positi et >100 
    // sinon, ajouter une erreur au tableau d'erreurs
    // si données POST OK alors on INSERT puis redirection vres index.php 
} else {
    $id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);
}


if (!$id_categorie) {
    header('location:index.php');
    exit;
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
        <!--
        Afficher les éventuelles erreurs. 
        Si au retour il y as des erreurs , indiquer l'endroit où il y as des erreurs 
        
        -->
        <div id="container">
            <form name="form1" action="editer.php" method="post"> 



                <div class="item">
                    <label>Categories</label>
                    <select name="id_categorie">
                        <?php
                        foreach ($tabCategorie as $categorie) {
                            $selected = $categorie->id_categorie == $id_categorie ? 'selected="selected"' : '';
                            ?>
                            <option value="<?= $categorie->id_categorie ?>" <?= $selected ?> ><?= $categorie->nom ?></option>
                            <?php
                        }
                        ?>
                        <option></option>
                    </select>


                </div>
                <div class="item">
                    <label>nom</label>
                    <input name='nom' maxlength="50" required="required"/>

                </div>

                <div class="item">
                    <label>ref</label>
                    <input name='ref' maxlength="10" required="required"/>
                </div>
                <div class="item">
                    <label>prix</label>
                    <input type="number" name='prix' min="0" max="999,99" step="0,01" required="required"/>
                </div>
                <div class="item">
                    <label></label>
                    <input type="button"  min="0" max="999,99" step="0,01" required="required" value="annuler" onclick="annuler()"/>
                    <input type="submit" name='submit' value="valider" />
                </div>




            </form > 

        </div>
        <footer></footer>
        <script src="js/editer.js" type="text/javascript"></script>
    </body>
</html>
