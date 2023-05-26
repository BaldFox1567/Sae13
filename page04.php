<!--Page Commande en ligne-->
<?php include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);?>

<?php
$resto = $_POST['resto'];
$pizza = $_POST['pizza'];
$pasta = $_POST['pasta'];

function resto($local, $resto){
    if($local == $resto){
        echo ' selected="selected" ';
    }
}
function pizza($local, $pizza){
    if($local == $pizza){
        echo ' selected="selected" ';
    }
}
function pasta($local, $pasta){
    if($local == $pasta){
        echo ' selected="selected" ';
    }
}
?>
<div style="margin-left:50px;margin-right:50px;margin-top:30px;margin-bottom:20px; text-align:center">
<h2 >Faites votre choix parmis une selection infini de autentico piatto italiano préparé maison !</h2>
<h5>Si vous n'avez pas lu le menu, <a href="page03.php"><u>c'est ici</u></a></h5>
<br>

<?php
echo '
<form>
                <label for="resto">Choisissez parmis nos restaurants</label><br>
                <select class="form-control" name="resto" id="resto">
                    <option '; resto("intra", $resto); echo ' value="intra">Saint-Malo - Intramuros</option>
                    <option '; resto("parame", $resto); echo ' value="parame">Saint-Malo - Paramé</option>
                    <option '; resto("rotheneuf", $resto); echo ' value="rotheneuf">Saint-Malo - Rothéneuf</option>
                </select>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="pizza">Quelle Pizza vous fais envie ?</label><br>
                        <select class="form-control" name="pizza" id="pizza">
                            <option '; pizza("", $pizza); echo ' value="">Choisissez votre Pizza</option>
                            <option '; pizza("from", $pizza); echo ' value"from">La Quattro Fromagi !</option>
                            <option '; pizza("marg", $pizza); echo ' value"marg">La Margherita !</option>
                            <option '; pizza("pepp", $pizza); echo ' value"pepp">El pepperoni !</option>
                            <option '; pizza("pros", $pizza); echo ' value"pros">La prosciutto !</option>
                            <option '; pizza("capr", $pizza); echo ' value"capr">La Capricciose !</option>
                            <option '; pizza("hawa", $pizza); echo ' value"hawa">L\'Hawaiian !</option>
                            <option '; pizza("vege", $pizza); echo ' value"vege">Li Vegetariana !</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="pasta">Ne lésinez pas sur les Pasta !</label><br>
                        <select class="form-control" name="pasta" id="pasta">
                            <option '; pasta("", $pasta); echo ' value="">Choisissez vos Pasta</option>
                            <option '; pasta("carb", $pasta); echo ' value="pate1">Los Carbonaras !</option>
                            <option '; pasta("lasa", $pasta); echo ' value="pate2">Li deus Lasagna !</option>
                        </select>
                    </div>
                </div>
                <br>
                <input type="submit" class="form-control" value="Passer commande">
            </form>
            ';
?>
</div>
<?php page_bot();?>
