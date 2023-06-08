<?php
include "fonction.php";

$nom = "Doe";
$prenom = "John";
$telephone = "123456789";

if (creerAnnuaire($nom, $prenom, $telephone)) {
    echo "Utilisateur ajouté avec succès.";
} else {
    echo "Échec lors de l'ajout de l'utilisateur.";
}

