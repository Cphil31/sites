<?php
require_once 'inc/cfg.php';
require_once 'class/Categorie.php';
require_once 'class/Produit.php';
$tabCategorie = Categorie::tous();

$opt = ['options' => ['min_range' => 1]];
$id_produit = filter_input(INPUT_GET, 'id_produit', FILTER_VALIDATE_INT, $opt);
if ($id_produit) {
    $req = "DELETE FROM produit WHERE id_produit={$id_produit}";
    $pdo->exec($req);
    @unlink("img/prod_{$id_produit}_v.jpg");
    @unlink("img/prod_{$id_produit}_v.jpg");
}
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
        <title></title>
    </head>
    <body>
        <?php
// put your code here
        ?>
    </body>
</html>
