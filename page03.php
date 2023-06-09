<?php
include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<style>
    .custom-card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center">Menu</h2>

    <?php
    // Charger le contenu du fichier pizza.json
    $json = file_get_contents('pizza.json');
    // Convertir le contenu JSON en tableau associatif
    $data = json_decode($json, true);

    // Parcourir les catégories de plats
    foreach ($data['categories'] as $category) {
        echo '<h4 class="mt-5 text-primary">' . $category['name'] . '</h4>';
        echo '<div class="row mt-4">';

        // Parcourir les plats de la catégorie
        foreach ($category['items'] as $item) {
            echo '<div class="col-md-4">';
            echo '<div class="card bg-light mb-4">';
            $image = ''; // Variable pour stocker le nom de l'image

            // Affecter le nom de l'image en fonction du plat
            $itemName = str_replace(' ', '-', strtolower($item['name']));
            $image = $item["image"];

            // Afficher l'image et les détails du plat
            echo '<img src="' . $image . '" alt="' . $item['name'] . '" class="card-img-top custom-card-img">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title text-primary">' . $item['name'] . '</h5>';
            echo '<p class="card-text">' . $item['description'] . '</p>';
            echo '<p class="card-text text-danger">Prix : ' . $item['price'] . '</p>';
            echo '<p class="card-text">Options végétariennes : ' . ($item['vegetarian'] ? 'Oui' : 'Non') . '</p>';
            echo '<p class="card-text">Allergènes : ' . implode(', ', $item['allergens']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }
    ?>
</div>

<?php
page_bot();
?>
