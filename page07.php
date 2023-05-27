<?php
include "./fonction.php";
head();
page_top();
$users = json_decode(file_get_contents("./data/users.json"), true);
echo '
    <div class="container mb-1 col-10">
        <h1 class="my-4 text-center">Administration</h1>
        <hr>
        <div class="list-group list-group-flush text-center">
            <a href="#utilisateurs" class="list-group-item list-group-item-action">Gestion Utilisateurs</a>
        </div>
        <hr>
    ';
echo '<div class="mt-2 fw-bold text-center">$_SESSION array content<pre>';
echo print_r($_SESSION, true) . '</pre></div>';
echo '
    <h4>Recherchez des utilisateurs</h4>
    <form method="post" class="mb-2">
        <input type="search" name="input_user" class="shadow-none form_control" placeholder="partie du pseudo">
        <button type="submit" name="which_user" class="btn badge text-wrap bg-primary">Rechercher</button>
    </form>
</div>';

if (!isset($_POST['which_user'])) {
    if (!isset($_POST["delete_usr"])) {
        getUsers(null);
    } else {
        $nom = $_POST["username"];
        $mdp = $_POST["usermdp"];
        // First verifying who he's in the database
        $database = json_decode(file_get_contents('data/users.json'), true);
        foreach ($database as $index => $user) {
            if ($user["user"] == $nom && $mdp == $user["mdp"]) {
                deleteUser($index);
                getUsers(null);
                page_bot();
                die();
            }
        }
        echo '
        </div>
        <div class="text-center text-danger fw-bold mb-4 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mb-1" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.
            </svg> Les informations saisies sont incorrectes.
        </div>
        </div>';
        getUsers(null);
        page_bot();
        die();
    }
} else {
    $recherche = $_POST["input_user"];
    getUsers($recherche);
}

function getUsers($recherche)
{
    $users = json_decode(file_get_contents("./data/users.json"), true);
    echo '<div class="col-12 col-md-10 mx-auto">';
    if ($recherche == null) {
        echo '<h4>Liste des utilisateurs</h4>';
    } else {
        echo '<h4>Résultat de la recherche</h4>';
    }
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom d\'utilisateur</th>
                <th scope="col">Action</th>
            </tr>
        </thead>';
    echo '<tbody>';

    foreach ($users as $index => $user) {
        if ($recherche == null || strpos($user["user"], $recherche) !== false) {
            echo '<tr>';
            echo '<td>' . $index . '</td>';
            echo '<td>' . $user["user"] . '</td>';
            echo '<td>
                    <form method="post">
                        <input type="hidden" name="username" value="' . $user["user"] . '">
                        <input type="hidden" name="usermdp" value="' . $user["mdp"] . '">
                        <button type="submit" name="delete_usr" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

page_bot();
?>
