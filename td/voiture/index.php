<?php
require_once 'Voiture.php';

$red= new Voiture("peugeot","red");
$red->rouler(50);


var_dump($red);
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
        <?= $red->marque?>
        <?= $red->roule?>
    </body>
</html>
