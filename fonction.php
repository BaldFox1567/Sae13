<?php

if (isset($_GET['deco'])) {
  deconnexion();
}

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
  echo '<div class="container-fluid p-0">
    <img src="img/banniere_web.jpg" alt="Bannière" style="width: 100%">
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
      echo 'href="page05.php">Réservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if ($pageactive=="page06.php") {echo ' style="color:#3498db;"';}
      echo 'href="page06.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if ($pageactive=="page07.php") {echo ' style="color:#3498db;"';}
      echo 'href="page07.php">Espace employés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"'; 
      if ($pageactive=="page08.php") {echo ' style="color:#3498db;"';}
      echo 'href="page08.php">Annuaire</a>
          </li>
        </ul>
      </div>

      <div class="text-black">';



    if (!$_SESSION['user']) {
        if (!isset($_POST['submit'])) {
              echo'   
              <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalToggleLabel">Authentification : </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Identifiant</label>
                          <input type="user" class="form-control" id="user" name="user" placeholder="ex : user">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Mot de passe</label>
                          <input type="password" class="form-control" id="pass" name="pass" placeholder="ex : bonjour">
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">OK</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


              <a style="margin-right:10px" class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><u>Connexion</u></a>';

                  
        }else {connexion($_POST['user'], $_POST['pass']);}
      } else {
        echo '<p style="margin-right:15px;color:white">Connecté en tant que ' . $_SESSION['user'].'</p>';
        echo '<button class="btn btn-primary"><a style="color:white" href="fonction.php?deco=true">Déconnexion</a></button>';      
  }
  
  echo'</div></div></div></nav>';
}

/////// Gestion des Utilisateurs ///////

function connexion($user, $mdp)
{
  $data = json_decode(file_get_contents("./data/users.json", true), true); 
  foreach ($data as $us) {
    if ($us['user'] == $user && password_verify($mdp, $us['mdp'])) {
      $_SESSION['user'] = $us['user'];
      $_SESSION['mdp'] = $us['mdp'];
      $_SESSION['role'] = $us['role'];
    }
  }
header('Refresh:0');
}

function deconnexion()
{
  session_start();
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: index.php");
}


function addUser($usr, $mdp, $role = "user")
{
    $users = json_decode(file_get_contents("data/users.json"), true);
    
    foreach ($users as $user) {
        if ($user["user"] === $usr) {
            echo '
            </div>Username déjà pris<br/>
            <a type="button" class="btn text-center border border-black mt-3" href="page06.php">Recharger la page</a></div>';
            page_bot();
            die();
        }
    }
    
    $newUser = [
        'user' => $usr,
        'mdp' => password_hash($mdp, PASSWORD_DEFAULT),
        'role' => $role,
    ];
    
    $users[] = $newUser;
    
    $res = json_encode($users, JSON_PRETTY_PRINT);
    
    file_put_contents("data/users.json", $res);
    header("Refresh:0");
    die();
}

function deleteUser($usr) 
{
  $users = json_decode(file_get_contents('data/users.json'), true);
  $currentUserRole = $_SESSION['role'];

  foreach ($users as $key => $user) {
      if ($user["user"] == $usr["user"] && $currentUserRole == "superadmin" || ($currentUserRole != "admin" && $currentUserRole != "superadmin")) {
              unset($users[$key]);
      }
  }

  file_put_contents("data/users.json", json_encode($users, JSON_PRETTY_PRINT));
  header("Refresh:0");
}


function getUsers($database = null)
{
    if ($database === null) {
        $path = "data/users.json";
        $users = json_decode(file_get_contents($path), true);
    } else {
        $users = $database;
    }
    
    echo '
    <div class="container mb-1 col-10">
    <span class="align-middle">Nombre d\'utilisateurs : ' . count($users) . '</span>
    </div>
    <div class="container pb-4 pt-3 px-2 border-black border-2 rounded-2 col-10">
    <h3 class="mt-4 mx-1">Les Utilisateurs correspondants :</h3>
    <p>Recherche de tous les utilisateurs : ' . count($users) . ' résultats trouvés</p>
    <div class="d-flex justify-content-center pb-4 pt-3 px-3 ms-5">
    <table class="table text-50 table-hover">
    <thead>
    <tr>
    <th scope="col">Utilisateur</th>
    <th scope="col">Mot de passe</th>
    <th scope="col">Rôle</th>
    </tr></thead><tbody>';

    foreach ($users as $user) {
        echo '
        <tr>
            <th scope="row">' . $user["user"] . '</th>
            <td>' . $user['mdp'] . '</td>
            <td>' . $user['role'] . '</td>
            <td style="border: none">
                <form method="post">
                    <input type="hidden" name="username" value="' . $user['user'] . '">
                    <input type="hidden" name="usermdp" value="' . $user['mdp'] . '">
                    <input type="submit" name="delete_usr" class="btn btn-sm btn-danger text-decoration-none" value="X">
                </form>
            </td>
        </tr>';
    }
    
    echo '
                </tbody>
            </table>
        </div>
    </div>';
}

function findUsers($text)
{
  $foundedUsers = [];
  $users = json_decode(file_get_contents("data/users.json"), true);
  $searchText = strtolower($text);

  foreach ($users as $user) {
      if (stripos(strtolower($user["user"]), $searchText) !== false) {
          $foundedUsers[] = $user;
      }
  }

  $foundedUsers = array_values(array_unique($foundedUsers, SORT_REGULAR));

   getUsers($foundedUsers);
}





// Annuaire

function creerAnnuaire($nom, $prenom, $telephone) 
{
    // Vérifier si le fichier JSON existe
    $fichier = 'data/annuaire.json';
    $utilisateurs = [];

    if (file_exists($fichier)) {
        // Lire le contenu du fichier JSON existant
        $contenu = file_get_contents($fichier);

        // Décoder le contenu JSON en un tableau associatif
        $utilisateurs = json_decode($contenu, true);
    }

    // Créer un nouvel utilisateur
    $nouvelUtilisateur = array(
        "nom" => $nom,
        "prenom" => $prenom,
        "telephone" => $telephone
    );

    // Ajouter le nouvel utilisateur au tableau
    $utilisateurs[] = $nouvelUtilisateur;

    // Convertir le tableau en JSON
    $nouveauContenu = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    // Écrire le contenu JSON dans le fichier avec gestion des erreurs
    if (file_put_contents($fichier, $nouveauContenu) !== false) {
      return true; // Succès de l'écriture du fichier
  } else {
      return false; // Échec de l'écriture du fichier
  }
    
}

function supprimerMembre($id) 
{
  // Charger le contenu du fichier annuaire.json
  $fichier = './data/annuaire.json';
  $contenu = file_get_contents($fichier);

  // Décoder le contenu JSON en tableau associatif
  $utilisateurs = json_decode($contenu, true);

  // Rechercher l'utilisateur à supprimer dans le tableau
  foreach ($utilisateurs as $index => $utilisateur) {
      if ($utilisateur['id'] == $id) {
          // Supprimer l'utilisateur du tableau
          unset($utilisateurs[$index]);

          // Réorganiser les clés du tableau
          $utilisateurs = array_values($utilisateurs);

          // Enregistrer le tableau modifié dans le fichier
          file_put_contents($fichier, json_encode($utilisateurs));

          return true; // Indiquer que la suppression a réussi
      }
  }

  return false; // Indiquer que l'utilisateur n'a pas été trouvé
}




