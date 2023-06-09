<?php
include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);

// Chargement du contenu du fichier pizza.json
$json = file_get_contents('pizza.json');
$data = json_decode($json, true);

echo '
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Menu</h1>
            <h2>Afficher les objets :</h2>';

afficherObjets($data);

echo '
        </div>
        <div class="col-md-6">
            <h2>Supprimer un objet :</h2>
            <form method="post">
                <label for="delete">Objet à supprimer :</label>
                <select name="delete" id="delete">';

foreach ($data['categories'] as $category) {
    foreach ($category['items'] as $item) {
        echo "<option value='" . $item['name'] . "'>" . $item['name'] . "</option>";
    }
}

echo '
                </select>
                <input type="submit" name="deleteSubmit" value="Supprimer">
            </form>';

            // Vérifier si un formulaire a été soumis pour la suppression
            if (isset($_POST['deleteSubmit'])) {
                var_dump($_POST['delete']);
                $itemToDelete = $_POST['delete'];
                supprimerObjet($data, $itemToDelete);
                sauvegarderData($data, 'pizza.json');
            }

echo'
            <h2>Ajouter un nouvel objet :</h2>
            <form method="post">
                <label for="categorie">Catégorie :</label>
                <input type="text" name="categorie" id="categorie"><br>

                <label for="name">Nom :</label>
                <input type="text" name="name" id="name"><br>

                <label for="description">Description :</label>
                <input type="text" name="description" id="description"><br>

                <label for="price">Prix :</label>
                <input type="text" name="price" id="price"><br>

                <label for="vegetarian">Végétarien :</label>
                <input type="checkbox" name="vegetarian" id="vegetarian"><br>

                <label for="allergens">Allergènes (séparés par des virgules) :</label>
                <input type="text" name="allergens" id="allergens"><br>

                <label for="image">Chemin de l\'image :</label>
                <input type="text" name="image" id="image"><br>

                <input type="submit" name="addSubmit" value="Ajouter">
            </form>';

            // Vérifier si un formulaire a été soumis pour l'ajout
            if (isset($_POST['addSubmit'])) {
                $categorie = $_POST['categorie'];
                $nom = $_POST['name'];
                $description = $_POST['description'];
                $prix = $_POST['price'];
                $vegetarien = isset($_POST['vegetarian']);
                $allergenes = isset($_POST['allergens']) ? explode(',', $_POST['allergens']) : [];
                $image = $_POST['image'];

                ajouterObjet($data, $categorie, $nom, $description, $prix, $vegetarien, $allergenes, $image);
                sauvegarderData($data, 'pizza.json');
}
echo'
        </div>
    </div>
</div>';





page_bot();

