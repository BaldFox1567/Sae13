<?php
include('fonction.php');
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<div class="container mt-5">
    <h2 class="text-center">Menu</h2>

    <?php
    // Charger le contenu du fichier pizza.json
    $json = file_get_contents('pizza.json');
    // Convertir le contenu JSON en tableau associatif
    $data = json_decode($json, true);

    // Parcourir les catégories de plats
    foreach ($data['categories'] as $category) {
        echo '<h4 class="mt-5">' . $category['name'] . '</h4>';
        echo '<div class="row mt-4">';

        // Parcourir les plats de la catégorie
        foreach ($category['items'] as $item) {
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            $image = ''; // Variable pour stocker le nom de l'image

            // Affecter le nom de l'image en fonction du plat
            switch ($item['name']) {
                case 'Pizza Carbonara':
                    $image = 'Carbonara.jpg';
                    break;
                case 'Pizza Margherita':
                    $image = 'Margherita.jpg';
                    break;
                case 'Pizza Pepperoni':
                    $image = 'Pepperoni.jpg';
                    break;
                case 'Pizza Quatro':
                    $image = 'Quatro.jpg';
                    break;
                case 'Lasagna':
                    $image = 'Lasagna.jpg';
                    break;
                // Ajoutez d'autres cas pour les autres plats de pizza
            }

            // Afficher l'image et les détails du plat
            echo '<img src="./img/' . $image . '" alt="' . $item['name'] . '" class="card-img-top">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $item['name'] . '</h5>';
            echo '<p class="card-text">' . $item['description'] . '</p>';
            echo '<p class="card-text">Prix : ' . $item['price'] . '</p>';
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
