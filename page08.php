<?php
    include "fonction.php";
    head();
    page_top();
    $nom_page = basename(__FILE__);
    navbar($nom_page);

    if (!isset($_SESSION['role']) || ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "superadmin" && $_SESSION['role'] !== "chef" && $_SESSION['role'] !== "directeur")) {
        sleep(2);
        header("Location: index.php");
        exit;
    }

    $fichier = './data/annuaire.json';
    $utilisateurs = [];

    if (file_exists($fichier)) {
        $contenu = file_get_contents($fichier);
        $utilisateurs = json_decode($contenu, true);
    }

    echo'
    <div class="container">
    <div class="item">
    <table>
     <tr>
     <td>';
    echo '<h2>Annuaire des employées :</h2>';
    // Vérifier si une demande de suppression a été faite
    if (isset($_GET['supprimer'])) {
        $idMembreASupprimer = $_GET['supprimer'];

        if (supprimerMembre($idMembreASupprimer)) {
            echo "Employée supprimé avec succès.";
            header("Refresh: 2");
            header("Location: page08.php");
            } else {
            echo "Impossible de supprimer l'employée.";
            header("Refresh: 2");
            header("Location: page08.php");
        }
    }

    if (!empty($utilisateurs)) {
        echo '<ul>';
        foreach ($utilisateurs as $utilisateur) {
            echo '<li>' . $utilisateur['prenom'] . ' ' . $utilisateur['nom'] . ' - Téléphone : ' . $utilisateur['telephone'];
            // Ajouter le lien de suppression

        echo ' <a class="text-danger" href="page08.php?supprimer=' . $utilisateur['id'] . '">X</a>';

        echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Aucun employées trouvé</p>';
    }

    



    echo '
    </td>
    </div>
                <div class="item">
                    <td>
                        <h2 class="text-center">Ajouter un employé</h2>
                        <div class="container col-5 d-flex content-center mt-2 mb-4">
                            <form method="post">
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom" required><br>

                                <label for="prenom">Prénom :</label>
                                <input type="text" id="prenom" name="prenom" required><br>

                                <label for="telephone">Téléphone :</label>
                                <input type="text" id="telephone" name="telephone" required><br>

                                <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </td>
                </div>
            </tr>
        </table>
    </div>';

    if (isset($_POST['submit'])) {
        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];

        // Appeler la fonction de création d'utilisateur
        if (creerAnnuaire($nom, $prenom, $telephone)) {
            echo "Ajouté";
            header("Location: page08.php");
        } else {
            echo "Raté";
            header("Location: page08.php");

        }
    }
    echo '</div>';

    page_bot();
