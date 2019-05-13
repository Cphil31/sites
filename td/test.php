<?php 
/*
$tab1 = [12];

$tab2=$tab1;
var_dump($tab1);
var_dump($tab2);
        
 $tab1 [] =13;
 
var_dump($tab1);
var_dump($tab2);

function ajouteUn($t){
    $t[]=1;
}
  

*/
require_once 'Client.php';
$dupont=new Client("Dupont",123);
echo "{$dupont->nom} \n"; // Dupont
echo "{$dupont->code} \n";// 0
$dupont->acheter();// Dupont achète un produit
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
    </body>
</html>
