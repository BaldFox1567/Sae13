<!--Page Accueil-->
<?php include ('fonction.php');
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);?>

<div style="margin-left:50px;margin-right:50px;margin-top:20px;margin-bottom:20px">
    <div class="row">
        <div class="col-sm-3" style="text-align:center">
            <h1>El Pasta Pizza !</h1>
        </div> 

        <div class="col-sm-8">
            <div style="text-align:center">
                <h2 >Où somme nous ?</h2>
                <br>
                <img src="img/localisation.png">
            </div>
            <br>
            <p style="font-size:18px;">Idéalement situé au cœur du centre historique de la glorieuse ville cotière Saint-Malo, El Pasta Pizza s'assure d'être à moins de 5 minutes de marche de vous, habitant ou visiteur d'intramuros. Mais ne vous inquitez pas, notre service de livraison vous trouvera où que vous soyez dans la ville.</p>
            <br>
            <h3>Nos engagements<h3>
        </div>

    </div>
</div>

<?php page_bot();?>
