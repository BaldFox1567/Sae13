<?php include ('fonctions.php');?>
<?php setup();?>
<body>
    <?php 
    pageheader();
    $nompage = basename(__FILE__);
    pagenavbar($nompage);
    ?>

<div class="text-center">
    <br>
    <h1>CDI du lycée Maupertuis !</h1>
    <p style="font-size:12px;">Dans lequel j'ai passer l'aspirateur pendant 1 semaine (c'est réel)</p>
    <br>
</div>
<div class="text-left" style="margin-left:20px">
    <h4>Règles de bonne conduite</h4>
    <ul>
        <li>
            Rendre les livres
        </li>
        <li>
            Entier si possible
        </li>
    </ul>
<br>
</div>

    <?php

    showBook(json_decode(file_get_contents('data/data.json'), true));

    pagefooter();
    ?>
</body>