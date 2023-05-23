<?php include ('fonctions.php');?>
<?php setup();?>
<body>
<?php
    if (isset($_POST['submit1'])){
        $id = $_POST['id'];
        $role = $_POST['role'];
        $mdp = $_POST['mdp'];
        addUser($id, $mdp, $role);
       
        header('location: page06.php');
        exit();
    }

    if (isset($_POST['submit2'])){
        $utilisateurs = json_decode(file_get_contents("data/users.json"), TRUE);
        $i=0;
        foreach($utilisateurs as $value){
            $i++;
            $deluser.$i = $_POST['user'.$i];
            echo $deluser.$i;
        }

        //header('location: page06.php');
        exit(); //pas fini
    }

    addUser("non mon reuf", $mdp, "feur");
    ?>
</body>