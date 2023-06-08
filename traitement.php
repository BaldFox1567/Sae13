<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$resto = $_POST['resto'];
$pizza = $_POST['pizza'];
$pasta = $_POST['pasta'];

/*
echo $nom;
echo $prenom;
echo $resto;
echo $pizza;
echo $pasta;*/

$nom_dossier = "data/commandes/";
$nom_fichier = $nom_dossier.$nom."_".$prenom.".txt";

$fichier = fopen($nom_fichier, 'c+b');
fseek($fichier, filesize($nom_fichier));

fwrite($fichier, 'Nom : '.$nom."\n");
fwrite($fichier, 'Prenom : '.$prenom."\n");
fwrite($fichier, 'Restaurant choisie : '.$resto."\n");
fwrite($fichier, 'Pizza selectionne : '.$pizza."\n");
fwrite($fichier, 'Pasta selectionne : '.$pasta."\n");
fclose($fichier);

/*$nom_dossier = "data/commandes/";
$scandir = scandir($nom_dossier);
foreach($scandir as $test){
    $dir = $nom_dossier.$test;
    if($test != ("." or "..")){
        echo "<a href='$dir'>$test<br></a>";    
    }
    
}*/


sleep(2);
header("Location: page04.php");

?>
