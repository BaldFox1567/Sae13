<?php
include('fonction.php');
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Coordonnées</h2>
            <p><strong>Adresse :</strong>Intra-Muros</p>
            <p><strong>Téléphone :</strong> +33 1 234 567 89</p>
            <p><strong>Email :</strong> contact@pastapizza.com</p>
        </div>
        
        <div class="col-md-6">
            <h2>Contactez-nous</h2>
            <form>
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control" id="name" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" placeholder="Votre email">
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Votre message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<?php
page_bot();
?>

