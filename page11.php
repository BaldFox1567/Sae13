<?php include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);?>

<div class="container">
  <h1>Wiki</h1>
  
  <h2>Description du projet</h2>
  <p>Notre projet est un site web dédié à la restauration italienne, spécifiquement aux pizzas et aux pâtes. Il permet aux utilisateurs de passer des commandes en ligne dans l'un des trois restaurants de la ville de Saint-Malo. Le site offre une variété de choix de pizzas et de pâtes, et met l'accent sur la qualité des ingrédients et l'expérience culinaire.</p>
  
  <h2>Fonctionnalités</h2>
  <h3>1. Sélection du restaurant</h3>
  <p>Les utilisateurs peuvent choisir parmi les trois restaurants disponibles : Saint-Malo - Intramuros, Saint-Malo - Paramé et Saint-Malo - Rothéneuf. Cette fonctionnalité permet aux utilisateurs de sélectionner leur restaurant préféré pour la commande.</p>
  
  <h3>2. Choix des plats</h3>
  <p>Les utilisateurs peuvent choisir parmi une variété de pizzas et de pâtes proposées sur le site. Pour les pizzas, ils ont le choix entre La Quattro Fromagi, La Margherita, El Pepperoni, La Prosciutto, La Capricciosa, L'Hawaiian et Li Vegetarian. Pour les pâtes, ils peuvent choisir entre Los Carbonaras et Li deus Lasagna.</p>
  
  <h3>3. Réservation de table</h3>
  <p>En plus de passer des commandes en ligne, les utilisateurs ont la possibilité de réserver une table dans l'un des restaurants. Ils peuvent spécifier la date, l'heure et le nombre de personnes pour la réservation.</p>
  
  <h3>4. Affichage des détails du plat</h3>
  <p>Après avoir sélectionné un plat, les utilisateurs peuvent afficher une image et des détails décrivant le plat choisi. Cela leur permet d'en savoir plus sur les ingrédients, les saveurs et la présentation du plat.</p>
  
  <h3>5. Gestion des réservations</h3>
  <p>Le site propose une fonctionnalité de gestion des réservations pour les restaurants. Les réservations effectuées en ligne sont enregistrées dans une base de données et peuvent être consultées et gérées par le personnel du restaurant.</p>
  
</div>

<?php page_bot();?>
