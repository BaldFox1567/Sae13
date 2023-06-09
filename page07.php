<?php

include "./fonction.php";
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);

if (session_status() == PHP_SESSION_NONE) {
    sleep(2);
    header("Location: index.php");
    die();
}

if (!(isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "superadmin"))) {
    sleep(2);
    header("Location: index.php");
    die();
}

$users = json_decode(file_get_contents("data/users.json"), true);
echo '<body>
    <div class="container mb-1 col-10">
        <h1 class="my-4 text-center">Administration</h1>';

echo '<h4>Filtrer les utilisateurs</h4>
        <form method="post" class="mb-2">
            <input type="search" name="input_user" class="shadow-none form-control">
            <button type="submit" name="recherche" class="btn badge text-wrap bg-success">Rechercher</button>
        </form>
    </div>';

if (!isset($_POST['recherche'])) {
    if (!isset($_POST["delete_usr"])) {
        getUsers(null);
    } else {
        $nom = $_POST["username"];
        $mdp = $_POST["usermdp"];
        $database = json_decode(file_get_contents('data/users.json'), true);
        foreach ($database as $key => $user) {
            if ($user["user"] == $nom && $mdp == $user["mdp"]) {
                deleteUser($user);
                unset($database[$key]);
                file_put_contents('data/users.json', json_encode($database));
                getUsers(null);
                page_bot();
                die();
            }
        }
        echo '<a type="button" class="btn text-center border border-black mt-3" href="page07.php">Recharger la page</a></div>';
    }
    echo '</tbody></table></div></div>';

    if (!isset($_POST["add_user"])) {
        echo '<div class="container col-3 d-flex justify-content-center border-4 border mt-2 mb-4 utilisateurs">
            <form method="post" class="row g-1 p-3 list-group list-group-flush mt-2 mb-3">
                <div class="form-floating">
                    <select class="form-select form-control list-group-item shadow-none" id="role" name="role" placeholder="role" required>
                        <option selected>Choix du rôle</option>';

        $roles = json_decode(file_get_contents("data/roles.json"), true);
        foreach ($roles as $role) {
            $roleName = $role["name"];
            echo "<option value='$roleName'>$roleName</option>";
        }

        echo '</select>
                    <label class="text-muted" for="role">role</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control list-group-item form-floating shadow-none" id="user" name="user" placeholder="username" required>
                    <label class="text-muted" for="user">username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control list-group-item form-floating shadow-none passwords" id="mdp" name="mdp" placeholder="password" required>
                    <label class="text-muted" for="mdp">password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control list-group-item form-floating shadow-none passwords" id="mdpverif" name="mdpverif" placeholder="repeat password" required>
                    <label class="text-muted" for="mdpverif">repeat password</label>
                </div>
                <button type="submit" name="add_user" class="btn btn-success">Créer</button>
            </form>
        </div>';

    } else {
        if (!isset($_POST["user"]) || ($_POST["mdp"] != $_POST["mdpverif"])) {
            echo '<div class="text-center text-danger fw-bold mb-4 mt-3">
                Le mot de passe n\'est pas correct !<br/>
                <a type="button" class="btn text-center border border-black mt-3" href="page07.php">Recharger la page</a>
            </div>';
        } elseif ($_POST['role'] == "Choix du rôle") {
            addUser($_POST['user'], $_POST['mdp']);
        } else {
            addUser($_POST['user'], $_POST['mdp'], $_POST['role']);
        }
    }
} else { // Après la recherche
    findUsers($_POST['input_user']);
    echo '</tbody></table></div></div>';


    if (!isset($_POST["add_user"])) {
        echo '<div class="container col-3 d-flex justify-content-center border-4 border mt-2 mb-4 utilisateurs">
            <form method="post" class="row g-1 p-3 list-group list-group-flush mt-3 mb-3">
                <div class="form-floating">
                    <select class="form-select form-control list-group-item shadow-none" id="role" name="role" placeholder="role" required>';

        echo "<option selected>Choix du rôle</option>";

        $roles = json_decode(file_get_contents("data/roles.json"), true);
        foreach ($roles as $role) {
            $roleName = $role["name"];
            echo "<option value='$roleName'>$roleName</option>";
        }

        echo '</select>
                    <label class="text-muted" for="role">role</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control list-group-item form-floating shadow-none" id="user" name="user" placeholder="username" required>
                    <label class="text-muted" for="user">username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control list-group-item form-floating shadow-none passwords" id="mdp" name="mdp" placeholder="password" required>
                    <label class="text-muted" for="mdp">password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control list-group-item form-floating shadow-none passwords" id="mdpverif" name="mdpverif" placeholder="repeat password" required>
                    <label class="text-muted" for="mdpverif">repeat password</label>
                </div>
                <button type="submit" name="add_user" class="btn btn-success">Créer</button>
            </form>
        </div>';
    } else {
        if (!isset($_POST["user"]) || ($_POST["mdp"] != $_POST["mdpverif"])) {
            echo '<div class="text-center text-danger fw-bold mb-4 mt-3">
                Le mot de passe n\'est pas correct !<br/>
                <a type="button" class="btn text-center border border-black mt-3" href="page07.php">Recharger la page</a>
            </div>';
        } elseif ($_POST['role'] == "Choix du rôle") {
            addUser($_POST['user'], $_POST['mdp']);
        } else {
            addUser($_POST['user'], $_POST['mdp'], $_POST['role']);
        }
    }
}
echo    '<br><br><div class="row" style="text-align:center">
            <h3>Fichier de commandes client</h3>';
            $nom_dossier = "data/commandes/";
            $scandir = scandir($nom_dossier);
            foreach($scandir as $test){
                $dir = $nom_dossier.$test;
                if($test != "." && $test != ".."){
                    echo "<a href='$dir'>$test<br></a>";
                }
            }
echo    '</div><br>';

page_bot();
