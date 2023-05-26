<?php
include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<div class="container mt-5">
    <h2 class="text-center">À propos de Pasta Pizza</h2>
    <p class="text-center">Découvrez notre histoire et l'équipe derrière notre passion pour la cuisine italienne.</p>
    
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>Notre Histoire</h4>
            <p>À l'origine de Pasta Pizza se trouvent quatre passionnés de cuisine italienne : Théo, Kerrian, Adrien et Yann. Ces amis d'enfance ont toujours rêvé de partager leur amour pour les saveurs authentiques de l'Italie. Après des années d'expérience dans les meilleurs restaurants italiens, ils ont décidé de concrétiser leur rêve en créant Pasta Pizza.</p>
        </div>
        
        <div class="col-md-6">
            <h4>Notre Équipe</h4>
            <p>Théo, le chef exécutif, est un maître dans l'art de préparer des pizzas croustillantes et des pâtes fraîches. Adrien, sommelier expérimentée, a sélectionné avec soin les meilleurs vins italiens pour accompagner les délicieux plats de Pasta Pizza. Kerrian, passionné de culture italienne, a créé une atmosphère chaleureuse et conviviale dans le restaurant. Yann, le responsable marketing, met en valeur l'authenticité et la passion qui animent Pasta Pizza.</p>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>Notre Engagement</h4>
            <p>Chez Pasta Pizza, chaque plat est préparé avec des ingrédients frais et de qualité, selon des recettes traditionnelles transmises de génération en génération. Nous nous engageons à offrir à nos clients une expérience gastronomique unique, où ils pourront savourer les délices de la cuisine italienne dans une ambiance chaleureuse et conviviale.</p>
        </div>
        
        <div class="col-md-6">
            <h4>Notre Passion</h4>
            <p>Nous sommes animés par notre passion pour la cuisine italienne et notre désir de partager les saveurs envoûtantes de l'Italie avec nos clients. Chez Pasta Pizza, nous mettons tout en œuvre pour vous offrir des plats authentiques et délicieux, préparés avec amour et savoir-faire. Laissez-vous emporter par les saveurs envoûtantes de l'Italie chez Pasta Pizza.</p>
        </div>
    </div>
</div>
<br>
<br>
<?php
page_bot();
?>
