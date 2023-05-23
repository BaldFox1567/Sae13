<?php include ('fonctions.php');?>
<?php setup();?>
<body>
<?php 
    pageheader();
    $nompage = basename(__FILE__);
    pagenavbar($nompage);

    getUsers();

echo '
<br>
<div class="container-fluid">
    <form class="form-control" action="page03.php" method="POST">
        <p class="text-center">
            Ajouter un utilisateurs
        </p>
        <div class="row">
            <div class="col-sm-4">
                <label for="id">Identifiants :</label>
                <input class="form-control" type="text" id="id" name="id" placeholder="Identifiants">
            </div>

            <div class="col-sm-3">
                <label for="role"> Rôle :</label>
                <select class="form-control" id="role" name="role">
                    <option class="form-control" value="admin">Administrateur</option>
                    <option class="form-control" value="user">Utilisateur</option>
                    <option class="form-control" value="visitor">Visiteur</option>
                </select>
            </div>
            
            <div class="col-sm-4">
                <label for="mdp">Mot de passe :</label>
                <input class="form-control" type="password" id="mdp" name="mdp" placeholder="Mot de passe">
            </div>
            <div class="col-sm-1">
                <label>Soumettre : </label>
                <input class="form-control" type="submit" id="submit1" name="submit1">
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="container-fluid>
    <form class="form-control" action="page03.php" method="POST">
        <p class="text-center">
            Supprimer un utilisateur (non functional yet)
        </p>
        <div class="row">
            <div class="col">
                <select class="form-control" id="deluser" name="deluser">';
                $utilisateurs = json_decode(file_get_contents("data/users.json"), TRUE);
                $i=0;
                foreach($utilisateurs as $value){
                    $i++;
                    echo '<option value="user', $i, '">';
                    echo $value['user'];
                    echo '</option>';
                }
                echo '
                </select>
            </div>
            <div class="col">
                <input class="form-control" type="submit" id="submit2" name="submit2">
            </div>
        </div>
    </form>
</div>
<br>
';

    //pagefooter();
?>
</body>