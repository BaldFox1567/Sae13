<?php include ('fonctions.php');?>
<?php setup();?>
<body>
<?php 
    pageheader();
    $nompage = basename(__FILE__);
    pagenavbar($nompage);

    echo '<br><div style="margin-left:15px">
    <form action="page02.php" method="POST">
    <p>Champ rechercher : <input type="text" name="keyword"></p>
    </form>';
    $keyword = $_POST['keyword'];
    findBooks(json_decode(file_get_contents('data/data.json'), true), $keyword);
    echo '</div><br>';
    pagefooter();
    ?>
</body>