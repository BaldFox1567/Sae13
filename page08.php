<?php

session_start();
include "./fonction.php";
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);

if (!isset($_SESSION)) {
    echo '<script>alert("You don\'t have the rights");</script>';
    sleep(2);
    header("Location: index.php"); 
} else {
    if (!(isset($_SESSION['role']) && ($_SESSION['role']=="admin" || $_SESSION['role']=="superadmin"))) {
        echo '<script>alert("You don\'t have the rights");</script>';
        sleep(2);
        header("Location: index.php");
    } else {
        // Vérifier si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            // Récupérer les valeurs du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];

            // Appeler la fonction de création d'utilisateur
            creerAnnuaire($nom, $prenom, $telephone);
        }
       
        // Lire le contenu du fichier JSON
        $fichier = './data/annuaire.json';
        $contenu = file_get_contents($fichier);
        $utilisateurs = json_decode($contenu, true); // JSON en un tableau associatif

        // Vérifier s'il y a des utilisateurs
        if (!empty($utilisateurs)) {
            echo '<h2>Liste des utilisateurs :</h2>';
            echo '<ul>';
            foreach ($utilisateurs as $utilisateur) {
                echo '<li>'.$utilisateur['prenom'].' '.$utilisateur['nom'].' - Téléphone : '.$utilisateur['telephone'].'</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>Aucun utilisateur trouvé.</p>';
        }

        echo '<h2>Ajouter un utilisateur</h2>
        <div class="container col-5 d-flex content-center border-4 border mt-2 mb-4">
        <form method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" required><br>

            <input type="submit" name="submit" value="Ajouter">
        </form>
        </div>';
    }
}

page_bot();

