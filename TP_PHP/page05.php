<?php include ('fonctions.php');?>
<?php setup();?>
<body>
<?php 
    pageheader();
    $nompage = basename(__FILE__);
    pagenavbar($nompage);
    $utilisateurs = json_decode(file_get_contents("data/users.json"), TRUE);
                foreach($utilisateurs as $value){
                    print_r($value['user']);
                }
    pagefooter();
    ?>
</body>