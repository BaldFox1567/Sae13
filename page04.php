<!--Page Commande en ligne-->
<?php 
include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<?php
$resto = isset($_POST['resto']) ? $_POST['resto'] : "";
$pizza = isset($_POST['pizza']) ? $_POST['pizza'] : "";
$pasta = isset($_POST['pasta']) ? $_POST['pasta'] : "";

function resto($local, $resto){
    if($local == $resto){
        echo 'selected="selected"';
    }
}
function pizza($local, $pizza){
    if($local == $pizza){
        echo 'selected="selected"';
    }
}
function pasta($local, $pasta){
    if($local == $pasta){
        echo 'selected="selected"';
    }
}
?>
<div style="margin-left:50px;margin-right:50px;margin-top:30px;margin-bottom:20px; text-align:center">
    <h2>Faites votre choix parmi une sélection infinie de autentico piatto italiano préparé maison !</h2>
    <h5>Si vous n'avez pas lu le menu, <a href="page03.php"><u>c'est ici</u></a></h5>
    <br>

    <form>
        <label for="resto">Choisissez parmi nos restaurants</label><br>
        <select class="form-control" name="resto" id="resto">
            <option <?php resto("intra", $resto); ?> value="intra">Saint-Malo - Intramuros</option>
            <option <?php resto("parame", $resto); ?> value="parame">Saint-Malo - Paramé</option>
            <option <?php resto("rotheneuf", $resto); ?> value="rotheneuf">Saint-Malo - Rothéneuf</option>
        </select>
        <br>
        <div class="row">
            <div class="col">
                <label for="pizza">Quelle Pizza vous fait envie ?</label><br>
                <select class="form-control" name="pizza" id="pizza">
                    <option <?php pizza("", $pizza); ?> value="">Choisissez votre Pizza</option>
                    <option <?php pizza("from", $pizza); ?> value="from">La Quattro Fromagi !</option>
                    <option <?php pizza("marg", $pizza); ?> value="marg">La Margherita !</option>
                    <option <?php pizza("pepp", $pizza); ?> value="pepp">El pepperoni !</option>
                    <option <?php pizza("pros", $pizza); ?> value="pros">La prosciutto !</option>
                    <option <?php pizza("capr", $pizza); ?> value="capr">La Capricciose !</option>
                    <option <?php pizza("hawa", $pizza); ?> value="hawa">L'Hawaiian !</option>
                    <option <?php pizza("vege", $pizza); ?> value="vege">Li Vegetariana !</option>
                </select>
            </div>
            <div class="col">
                <label for="pasta">Ne lésinez pas sur les Pâtes !</label><br>
                <select class="form-control" name="pasta" id="pasta">
                    <option <?php pasta("", $pasta); ?> value="">Choisissez vos Pâtes</option>
                    <option <?php pasta("carb", $pasta); ?> value="pate1">Les Carbonaras !</option>
                    <option <?php pasta("lasa", $pasta); ?> value="pate2">Les Deux Lasagnes !</option>
                </select>
            </div>
        </div>
        <br>
        <input type="submit" class="form-control" value="Passer commande">
    </form>
</div>
<?php page_bot();?>
