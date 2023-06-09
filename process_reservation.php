<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $personnes = $_POST['personnes'];
    $commentaires = $_POST['commentaires'];

    // Traitement des données (vous pouvez ajouter votre logique ici)
    // ...

    // Affichage des données de réservation
    echo '<h2>Récapitulatif de la réservation :</h2>';
    echo '<p>Nom : ' . $nom . '</p>';
    echo '<p>Email : ' . $email . '</p>';
    echo '<p>Téléphone : ' . $telephone . '</p>';
    echo '<p>Date : ' . $date . '</p>';
    echo '<p>Heure : ' . $heure . '</p>';
    echo '<p>Nombre de personnes : ' . $personnes . '</p>';
    echo '<p>Commentaires : ' . $commentaires . '</p>';

    // Vous pouvez ajouter ici l'envoi d'un email de confirmation ou d'autres actions nécessaires

} else {
    // Rediriger l'utilisateur vers la page de réservation s'il tente d'accéder directement à cette page sans soumettre le formulaire
    header('Location: reservation.php');
    exit;
}
