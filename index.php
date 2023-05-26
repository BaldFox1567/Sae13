<!--Page Accueil-->
<?php include ('fonction.php');
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);?>

<div style="margin-left:50px;margin-right:50px;margin-top:30px;margin-bottom:20px">
    <div class="row">
        <div class="col-sm-3">

            <h2 style="text-align:center">El Pasta Pizza !</h1>
            <br>

            <h3 style="text-align:center">Le chef cuisto !</h3>
            <div class="img-fluid">
                <img src="img/chefcuisto.jpg" width="100%" height="100%">
            </div>
            <br>
            <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum<p>



            <h3 style="text-align:center">Commander</h3>
            <br>
            <div style="text-align:center">

            <form action="page04.php">
                <label for="resto">Choisissez parmis nos restaurants</label><br>
                <select class="form-control" name="resto" id="resto">
                    <option value="intra">Saint-Malo - Intramuros</option>
                    <option value="parame">Saint-Malo - Paramé</option>
                    <option value="rotheneuf">Saint-Malo - Rothéneuf</option>
                </select>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="pizza">Quelle Pizza vous fais envie ?</label><br>
                        <select class="form-control" name="pizza" id="pizza">
                            <option value="">Choisissez votre Pizza</option>
                            <option value"4from">La Quattro Fromagi !</option>
                            <option value"marga">La Margarita !</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="pasta">Ne lésinez pas sur les Pasta !</label><br>
                        <select class="form-control" name="pasta" id="pasta">
                            <option value="">Choisissez vos Pasta</option>
                            <option value="pate1">J'ai pas les noms des pâtes</option>
                            <option value="pate2">Toujours pas</option>
                        </select>
                    </div>
                </div>
                <br>
                <input type="submit" class="form-control" value="Passer commande">
            </form>
</div>
        </div> 

        <div class="col-sm-8">
            <div style="text-align:center">
                <h2 >Où somme nous ?</h2>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d850.4229379587806!2d-2.026063133893843!3d48.64890255826387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480e811088a80bbd%3A0xb9049f03365482ab!2sSaint-Malo%20Intra-Muros!5e0!3m2!1sfr!2sfr!4v1685085706603!5m2!1sfr!2sfr" width="1000" height="560" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <br>
            <p style="font-size:18px;">Idéalement situé au cœur du centre historique de la glorieuse ville cotière Saint-Malo, nos trois restaurant El Pasta Pizza s'assure d'être à moins de 5 minutes de marche de vous, habitant ou visiteur d'intramuros, de Paramé, ou de Rotheneuf. Mais ne vous inquitez pas, notre service de livraison vous trouvera où que vous soyez dans la ville.</p>
            <br>
            <h3>Nos engagements</h3>
        </div>

    </div>
</div>

<?php page_bot();?>
