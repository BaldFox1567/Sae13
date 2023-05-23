<?php include ('fonctions.php');?>
<?php setup();?>
<body>
<?php 
    pageheader();
    $nompage = basename(__FILE__);
    pagenavbar($nompage);

    addUser("Louis", "bonjour", "user");
    deleteUser("Clement");

    pagefooter();
    
    ?>
</body>