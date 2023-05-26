<?php

function head(){
    echo '
    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>El Pasta Pizza</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href=".css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
            <link rel="icon" href="images/logo.png"/>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
            <style>
                .fakeimg {
                height: 200px;
                background: #aaa;
                }
            </style>
        </head>
        ';
}

function page_top(){
    echo '
    <body>
    <div class="jumbotron text-center" style="margin-bottom:0" >
    <h1>El Pasta Pizza</h1>
    <p>Y la peperoni</p>
    </div>
    ';
}

function page_bot(){
    echo '
        <div class="jumbotron text-center" style="margin-bottom:0">
        <p style="font-size:25px;"><u>El Pasta Pizza</u></p>
        <p style="font-size:15px;">Mail pro : PASTAPIZZA@pizza.peperoni</p>
        <p style="font-size:12px;">Created by PizTeam</p>
        <p style="font-size:10px;" align="left">SAE 23</p>
        </div>
      </body>
    </html>
    ';
}

function navbar($pageactive){
    echo '
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="index.php">El Pasta Pizza</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"'; 
      if($pageactive=="index.php"){echo ' style="color:#3498db;"';}
      echo 'href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"';
      if($pageactive=="page02.php"){echo ' style="color:#3498db;"';}
      echo 'href="page02.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if($pageactive=="page03.php"){echo ' style="color:#3498db;"';}
      echo 'href="page03.php">Menu</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link"'; 
      if($pageactive=="page04.php"){echo ' style="color:#3498db;"';}
      echo 'href="page04.php">Commande en ligne</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if($pageactive=="page05.php"){echo ' style="color:#3498db;"';}
      echo 'href="page05.php">Réservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if($pageactive=="page06.php"){echo ' style="color:#3498db;"';}
      echo 'href="page06.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if($pageactive=="page07.php"){echo ' style="color:#3498db;"';}
      echo 'href="page07.php">Espace employés</a>
          </li>
        </ul>
      </div>
    </nav>
    ';
}


?>
