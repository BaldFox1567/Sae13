<?php

function setup(){
echo '<!DOCTYPE html>
<html lang="fr">
<head>
<title>TP R209</title>
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
</head>';
}



function pageheader(){
    echo '<div class="jumbotron text-center" style="margin-bottom:0" >
    <button class="return" type="button">Connexion</button>
    <br>
    <br>
    <h1>TP R209</h1>
    <p>Kerrian Garat</p>
    </div>';
}


function pagefooter(){
    echo '<div class="jumbotron text-center" style="margin-bottom:0">
    <p style="font-size:25px;"><u>R209</u></p>
    <p style="font-size:15px;">Mail pro : Kerriang.22@gmail.com</p>
    <p style="font-size:12px;">Created by Kerrian Garat le BG</p>
    <p style="font-size:10px;" align="left">TP de Kerrian Garat</p>
  </div>';
}



function pagenavbar($pageactive){
    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="/">TP 209</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"'; 
    if($pageactive=="page01.php"){echo ' style="color:#3498db;"';}
    echo 'href="page01.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"';
    if($pageactive=="page02.php"){echo ' style="color:#3498db;"';}
    echo 'href="page02.php">Formulaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"'; 
    if($pageactive=="page04.php"){echo ' style="color:#3498db;"';}
    echo 'href="page04.php">Informations</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link"'; 
    if($pageactive=="page05.php"){echo ' style="color:#3498db;"';}
    echo 'href="page05.php">Fichiers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"'; 
    if($pageactive=="page06.php"){echo ' style="color:#3498db;"';}
    echo 'href="page06.php">Administration</a></li></ul></div></nav>';
}

function showBook($livres){
    echo '<table class="table">';
    foreach($livres as $value){
        echo '<tr>';
        foreach($value as $valeur){
            echo '<td>';
            echo $valeur;
            echo '</td>';}
        echo '</tr>';}
    echo '</table>';
}

function findBooks($livres, $keyword, $fields=[]){
    foreach($livres as $key => $value){
        $titre[$key] = [$value['title']];
        $contenue[$key] = [$value['content']];
        $auteur[$key] = [$value['author']];


    }
    foreach($titre as $value){
        if(strpos(strtolower($value[0]), strtolower($keyword)) !== false){
            echo $value[0], '<br>';
        }
    }
}


function montreLivretagrandmere($livre){
    echo '<table class="table">';
    echo '<tr>';
    for ($j = 0; $j < 5; $j++) {
        echo '<td>';
        echo ($livre[0][$j]);
        echo '</td>';
    }
    for ($h = 1; $h < 5; $h++) {
        echo '</tr><tr>';
        for ($j = 0; $j < 5; $j++) {
            echo '<td>';
            echo ($livre[1][$j][$h]);
            echo '</td>';
        }
    }
    echo '</tr>';
    echo '</table>';
}


function newUsers(){
    $mdp = "bonjour";
    $utilisateurs = [
        "admin" => [
            "user" => "admin",
            "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
            "role" => "admin"
        ],
        "Clement" => [
            "user" => "Clement",
            "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
            "role" => "user"
        ],
        "Kerrian" => [
            "user" => "Kerrian",
            "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
            "role" => "user"
        ],
        "anonymous" => [
            "user" => "anonymous",
            "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
            "role" => "visitor"
        ]
    ];
    echo(json_encode($utilisateurs));
    file_put_contents("data/users.json", json_encode($utilisateurs));
}


function addUser($usr, $mdp, $role){
    $utilisateurs = json_decode(file_get_contents("data/users.json"), TRUE);
    $utilisateurs[$usr] = [
        "user" => $usr,
        "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
        "role" => $role
    ];
    file_put_contents("data/users.json", json_encode($utilisateurs));
}


function deleteUser($usr){
    $utilisateurs = json_decode(file_get_contents("data/users.json"), TRUE);
    unset($utilisateurs[$usr]);
    file_put_contents("data/users.json", json_encode($utilisateurs));
}


function deconnexion(){

}


function getUsers(){
    $utilisateurs = json_decode(file_get_contents("data/users.json"), TRUE);
    echo '<div class="row"><div class="col text-center" style="margin-left:20px, margin-rigth:20px">';
    echo '<table class="table">';
    foreach ($utilisateurs as $value1){
        echo '<tr>';
        foreach($value1 as $value2){
            echo '<td>';
            echo $value2;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table></div></div>';
}


function findUsers($texte){

}


?>