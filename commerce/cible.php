<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
require_once 'class/editer.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>elements récupérés</h2>
        <p><?= $_POST['nom'] ?></p> 
        <p><?= $_POST['ref'] ?></p>
        <p><?= $_POST['prix'] ?></p>
    </body>
</html>
