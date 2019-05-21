<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
$opt = ['options' => ['min_range' => 1]];
// on penses objet 
$produit = new Produit();
//créer un tableau d'erreur vide
if (!$produit->id_categorie) {
    $produit = new Produit();
}    //toutes les propriétés sont a null
//
if (filter_input(INPUT_POST, 'submit')) {//filter input est la fontion , input post est la  
//la variable $produit n'exiteras que dans le filter submit ; 
// elle n'existeras pas 
    $produit->id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT, $opt); // on as récupéré id_catégories
    $produit->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES); // on as récupéré id_catégories
    $produit->ref = filter_input(INPUT_POST, ' ref ', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES); // on as récupéré id_catégories
    $produit->prix = filter_input(INPUT_POST, ' prix ', FILTER_VALIDATE_FLOAT); // on as récupéré id_catégories
    /* on vas utiliser les class pour récuperer les données */

//pour verifier si une categorie existe dans la base de données , on vas créer un méthode 
// on peut utiliser GET_categorie 
    if (!$produit->id_categorie || $produit->getCategorie()) {//get catégorie 
        $tabErreur [] = ["la catégorie est absente ou invalide "];
    } // etape 2 

    if (!$produit->ref || mb_strlen()) { //mb_strlen methode touver la longeur du nom 
        $tabErreur[] = "Le nom est absent ou invalide.";
    }

    if (!$produit->ref || mb_strlen($produit->ref) > 10 || $produit->refExiste()) {//get catégorie 
    } // etape 2 
// on ajoute un message 
    if (!$produit->prix || $produit->prix < 0 || $produit->prix >= 1000) {
        $tabErreur[] = " Le prix est absent ou invalide:";
    }

    if (!$tabErreur) {
//inserer notre $produit dans la base de données le nouveau produit 
        $req = `INSERT INTO produit VALUES (DEFAULT,{$produit->id_categorie},{$pdo->quote->nom},{$pdo->quote->ref},{$pdo->quote->ref})`; //quote :proteger+-
        $pdo->exec($req); // notre produit est envoyé dans la base de données 

        header('Location:index_td6.php');
        exit;
//si les données sont pas bonnes on ne fais aps l'insertion
    }
//créer un tableau d'erreurs vide 
//TODO :recuperer  les données POST 
    $nom = $_POST['nom'];
    $ref = $_POST['ref'];
    $prix = $_POST['prix'];
// verifier si id_categories entier strictement positif et  existant 
    ($idcategorie)
    //
    //if (is_int(!is_null($_POST['id_categorie']) > 0)) {
    /*
     *     $nom = $GET_POST['nom'];
      $ref = $GET_POST['ref'];
      $prix = $GET_POST['prix'];
      var_dump($nom);$req = `INSERT INTO produit (id_produit,id_categorie,nom,ref,prix) VALUES (DEFAULT,1,$nom,$ref,$prix)`;
      $pdo->exec($req);
      $jeu = $pdo->query($req);
      $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
      return $jeu->fetchAll();
      } else { */
    if (is_int(!is_null($_POST['id_categorie']) > 0)) {
        $req = `INSERT INTO produit (id_produit,id_categorie,nom,ref,prix) VALUES (DEFAULT,1,$nom,$ref,$prix)`;
        $pdo->exec($req);
        $jeu = $pdo->query($req);
        $jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Produit::class);
        return $jeu->fetchAll();
    } else {
        
    }

    // sinon, ajouter une erreur au tableau d'erreurs 
    // si données POST OK alors INSERT puis redirection vers index.php
    // 
    // if ($_POST)
    // vérifier si nom pas vide sinon ajouter une erreur au tableau d'erreurs 
    // vérifier si ref pas vide est pazs déja existant sinon ajouter une erreur au tableau d'erreurs 
    // vérifier si prix est positi et >100 
    // sinon, ajouter une erreur au tableau d'erreurs
    // si données POST OK alors on INSERT puis redirection vres index.php 
} else {
    $produit->id_categorie = filter_input(INPUT_GET, 'id_categorie', FILTER_VALIDATE_INT, $opt);
}


if (!$produit->id_categorie) {
    header('location:indispo.php');
    exit;
}
/* if (!$id_categorie) {
  header('location:index_td6.php');
  exit;
  } */
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
                            $selected = $categorie->id_categorie == $produit->id_categorie ? 'selected="selected"' : '';
                            ?>
                            <option value ="<?= $categorie->id_categorie ?>" <?= $selected ?> ><?= $categorie->nom ?></option>
                            <?php
                        }
                        ?>
                        <option></option>
                    </select>


                </div>
                <div class="item">
                    <label>nom</label>
                    <input name='nom' value="<?= $produit->nom ?>"  maxlength="50" required="required"/>

                </div>

                <div class="item">
                    <label>ref</label>
                    <input name='ref' value="<?= $produit->ref ?>" maxlength="10" required="required"/>
                </div>
                <div class="item">
                    <label>prix</label>
                    <input type="number" value="<?= $produit->prix ?>" name='prix' min="0" max="999,99" step="0,01" required="required"/>
                </div>
                <div class="item">
                    <label></label>
                    <input type="button"  min="0" max="999,99" step="0,01" required="required" value="annuler" onclick="annuler()"/>
                    <input type="submit" name='submit' value="valider" />
                </div>
            </form > 

        </div>
        <footer></footer>
        <script      src="js/editer.js" type="text/javascript"></script>
    </body>
</html>
