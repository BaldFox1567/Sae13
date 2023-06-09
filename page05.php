<?php include 'fonction.php';
head();
page_top();
$nom_page = basename(__FILE__);
navbar($nom_page);
?>

<!--Page Réservation-->
<div style="margin-left:50px;margin-right:50px;margin-top:30px;margin-bottom:20px; text-align:center">
    <h2>Réservez une table</h2>
    <br>

    <form action="process_reservation.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="tel" class="form-control" name="telephone" id="telephone" required>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="heure">Heure :</label>
            <input type="time" class="form-control" name="heure" id="heure" required>
        </div>
        <div class="form-group">
            <label for="personnes">Nombre de personnes :</label>
            <input type="number" class="form-control" name="personnes" id="personnes" required>
        </div>
        <div class="form-group">
            <label for="commentaires">Commentaires :</label>
            <textarea class="form-control" name="commentaires" id="commentaires" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>

<?php page_bot();?>
