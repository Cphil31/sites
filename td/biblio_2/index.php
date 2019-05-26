<?php
require_once('Livre.php');
require_once('Biblio.php');
$laBible = new Livre("La Bible",1453);
$leCoran = new Livre("Le Coran");
$laTorah = new Livre("La Torah");
$biblio = new Biblio("Alexandrie");
$biblio->ajouterLivre($laBible);
$biblio->ajouterLivre($leCoran);
$biblio->ajouterLivre($laTorah);
/*comment faire pour ajouter 
$biblio->ajouterLivre($laTorah,le coran la torah );
essayer de faire un nouvell exercice
 */
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
        <title>Biblio</title>
        <style> 
            table{
                margin: 0 auto ;
                border-collapse: collapse;
                border: 2px solid;
            }
            th, td {
                padding: 5px;
                border: 1px solid;
            }
        </style>
    </head>
    <body>
        
        <table border="1">
            <thead>
                <tr>
                    <th colspan="2"><?= $biblio->nom ?></th>
                </tr>
                <tr>
                    <th>Titre</th>
                    <th>Année</th>
                </tr>
            </thead>
            <tbody>
               <?php 
               foreach ($biblio->getLivres() as $livre){
                ?>
                <tr>
                    <td><?= $livre->titre ?></td>
                    <td><?= $livre->annee ?></td>
                </tr>
                <?php 
               }
               ?>
            </tbody>
        </table>

        
    </body>
</html>