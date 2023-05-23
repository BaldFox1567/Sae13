<?php
include('fonction.php');
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<div class="container">
    <h2 class="text-center mt-5">Menu</h2>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="./img/pizza-vegetarienne-hiver-8-2-2.jpg" alt="Pizza 1" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Pizza Végétarienne</h5>
                    <p class="card-text">Une délicieuse pizza végétarienne avec une variété de légumes frais.</p>
                    <p class="card-text">Prix : 10€</p>
                    <p class="card-text">Options végétariennes : Oui</p>
                    <p class="card-text">Allergènes : Gluten, Lactose</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <img src="./img/pizza-napolitaine.jpg" alt="Pizza 2" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Pizza Napolitaine</h5>
                    <p class="card-text">Une pizza classique de style napolitain avec une sauce tomate savoureuse et du fromage fondant.</p>
                    <p class="card-text">Prix : 12€</p>
                    <p class="card-text">Options végétariennes : Non</p>
                    <p class="card-text">Allergènes : Gluten, Lactose</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <img src="./img/pizza-napolitaine2.jpg" alt="Pizza 3" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Pizza Spéciale</h5>
                    <p class="card-text">Une pizza spéciale avec un mélange unique de viandes, de légumes et d'épices.</p>
                    <p class="card-text">Prix : 15€</p>
                    <p class="card-text">Options végétariennes : Oui</p>
                    <p class="card-text">Allergènes : Gluten, Lactose</p>
                </div>
            </div>
        </div>
        
        <!-- Ajoutez ici les autres pizzas -->
    </div>
    
    <!-- Ajoutez les autres catégories de plats de la même manière -->
    
</div>

<?php
page_bot();
?>
