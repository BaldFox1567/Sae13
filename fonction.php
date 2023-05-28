<?php

function head()
{
    echo '
    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>El Pasta Pizza</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="icon" href="images/logo.png"/>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <style>
                .fakeimg {
                height: 200px;
                background: #aaa;
                }
            </style>
        </head>
        ';
    session_start();
}

function page_top()
{
    echo '<div class="container-fluid p-5 bg-light text-black text-center">
    <h1>El Pasta Pizza</h1>
    <p>Y la pepperoni</p> 
  </div>';
}

function page_bot()
{
    echo '
        <div class="container-fluid p-5 bg-light text-black text-center">
        <p style="font-size:25px;"><u>El Pasta Pizza</u></p>
        <p style="font-size:15px;">Mail pro : PASTAPIZZA@pizza.peperoni</p>
        <p style="font-size:12px;">Created by PizTeam</p>
        <p style="font-size:10px;" align="left">SAE 23</p>
        </div>
      </body>
    </html>
    ';
}

function navbar($pageactive)
{
    echo '
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a style="margin-left:15px" class="navbar-brand" href="index.php">El Pasta Pizza</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"'; 
    if ($pageactive=="index.php") {echo ' style="color:#3498db;"';}
    echo 'href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"';
    if ($pageactive=="page02.php") {echo ' style="color:#3498db;"';}
    echo 'href="page02.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
    if ($pageactive=="page03.php") {echo ' style="color:#3498db;"';}
    echo 'href="page03.php">Menu</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link"'; 
    if ($pageactive=="page04.php") {echo ' style="color:#3498db;"';}
    echo 'href="page04.php">Commande en ligne</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
    if ($pageactive=="page05.php") {echo ' style="color:#3498db;"';}
    echo 'href="page05.php">Contact</a>
          </li>
        </ul>';

    // Add the connection button
    if (!isset($_SESSION['user'])) {
        echo '
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
        </ul>';
    } else {
        echo '
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="deconnexion.php">Déconnexion</a>
          </li>
        </ul>';
    }

    echo '
      </div>  
    </nav>
    ';
}


function connexion($user, $pass)
{
    // Perform authentication and validation here

    // If authentication is successful, set the "user" key in the $_SESSION array
    $_SESSION['user'] = $user;

    // Redirect the user to the desired page
    header('Location: page03.php');
    exit();
}

function deconnexion()
{
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: page01.php");
}

function newUsers() 
{
  //fichier json contenant 4 premiers users
  $defaultusers = array(
      "admin" => array(
          "user" => "admin",
          "mdp" => "$2y$10\$RsRMaKUx2PDq\/JWDE2.nbOfO7hbC07GgMO476OQiC5O8HGM.\/LECu",
          "role"=> "admin"),

      "anonymous"=> array(
          "user"=> "anonymous",
          "mdp"=> "$2y$10$32KjXmzXbkt1kz\/e3qTZlurv8QwxJfobJWkUHeELOi072TVzWpBHW",
          "role"=> "visitor"),

      "bagel" => array(
          "user"=> "bagel",
          "mdp"=> "$2y$10\$Nf2pZndPyVGVg9ZgM3m8mOEDqStoyijjTZdFk7rBme1egCF8pKLZq",
          "role"=> "superadmin"),

      "zaza" => array(
          "user" => "zaza",
          "mdp" => "$2y$10\$FCCCfG2sljwZyc98NY9dYOkUgIkYrwREMPCyy4AxhQYeDos.P1NlG",
          "role" => "user"),

      "usr"=> array(
          "user"=> "usr",
          "mdp"=> "$2y$10\$KCFlujz3HcxgODKJBYi6GOb\/V4gXDDUdu1VKEnM.j\/42LrqKalNfW",
          "role"=> "visitor"),

      "user" => array(
          "user" => "user",
          "mdp" => "$2y$10\$nf2.NZ29p\/JW3Nyc\/Vn88uri1h14a0cnBNum7BQIqR7wR13DLUaCW",
          "role" => "admin"),
      );
  echo '
      <div class="d-flex justify-content-center container col-10 my-4 border border-3 p-5">
  
      <pre>';
  $res = json_encode($defaultusers, JSON_PRETTY_PRINT);
  file_put_contents("./data/users.json", $res);
  echo $res;
  echo '
      </pre>
      </div>';
}
function addUser($usr, $mdp, $role="user")
{
  // encode sans avoir decoder => ecrase le fichier déja present
  $users = json_decode(file_get_contents("data/users.json"));
  // Création liste de données utilisateur
  foreach ($users as $user) {
     if ($user["user"] == $usr) {
         echo '
         </div>Usernam déja prit<br/>
         <a type="button" class="btn text-center border border-black mt-3" href="page06.php">Recharger la page</a></div>';
         page_bot();
         die();
     }
 }
  $newUser = array(
  'user' => $usr,
  'mdp'=> password_hash($mdp, PASSWORD_DEFAULT),
  'role' => $role,
 );
  $users[$newUser["user"]] = $newUser;
  $res=json_encode($users, JSON_PRETTY_PRINT);
  file_put_contents("./data/users.json", $res); //résultat dans users.json
  header("Refresh:0");
  die();
}

function deleteUser($usr)
{

  $users = json_decode(file_get_contents('data/users.json'));
  foreach ($users as $key => $user) {
      if ($user["user"] == $usr["user"] && $user['role'] != "admin") {
          unset($users[$key]);
      }
  }
  file_put_contents("data/users.json", json_encode($users, JSON_PRETTY_PRINT));
  header("Refresh:0");
}

