
<?php

// Je récupère les données de la BDD et je créé mes variables : 

    $get_nom_magasin="";
    $get_ville_magasin="";
    $get_postal_magasin="";
    $get_adresse_magasin="";
    $get_telephone_magasin="";
    $informations_magasins = $db-> query('SELECT * FROM `magasins`WHERE`id_utilisateur`='.$_SESSION['id']);
    while ($donnees = $informations_magasins->fetch()){
        $get_nom_magasin = $donnees['usershop'];
        $get_ville_magasin = $donnees['ville_magasin'];
        $get_postal_magasin = $donnees['postal_magasin'];
        $get_adresse_magasin = $donnees['adresse_magasin'];
        $get_telephone_magasin = $donnees['telephone_magasin'];
    }
    $informations_magasins -> closeCursor();
    //echo $get_nom_magasin;
    //echo $get_ville_magasin;
    //echo $get_postal_magasin;
    //echo $get_adresse_magasin;
    //echo $get_telephone_magasin;


//var_dump($_POST);
if($_GET['action'] == "new") {
   // !empty($_POST['usershop']) && !empty($_POST['password']) && !empty($_POST['password-confirm']) && !empty($_POST['datenaiss'])
    // Les champs ont été renseignés et sont tous remplis.

    $messages_erreurs2 = array(); //création de la variable qui va contenir les erreurs

    // Véfification des informations entrées
    if(empty($_POST['usershop'])) {$messages_erreurs2[]=array("field"=>"usershop", "message"=>"Nom d'utilisateur non renseigné.");}
    if(empty($_POST['datenaiss'])) {$messages_erreurs2[]=array("field"=>"datenaiss", "message"=>"Date de naissance non renseigné.");}
    if(empty($_POST['ville_magasin'])) {$messages_erreurs2[]=array("field"=>"ville_magasin", "message"=>"ville_magasin non renseignée.");}
    if(empty($_POST['postal_magasin'])) {$messages_erreurs2[]=array("field"=>"postal_magasin", "message"=>"Code postal_magasin non renseigné.");}
    if(empty($_POST['adresse_magasin'])) {$messages_erreurs2[]=array("field"=>"adresse_magasin", "message"=>"adresse_magasin non renseignée.");}
    if(empty($_POST['telephone_magasin'])) {$messages_erreurs2[]=array("field"=>"telephone_magasin", "message"=>"Téléphone non renseigné.");}
    $_POST['telephone_magasin'] = str_replace("+33", "0", $_POST['telephone_magasin']);
    if(!preg_match("#^[0-9]{10}$#", $_POST['telephone_magasin'])) { $messages_erreurs2[] = array("field"=>"telephone_magasin", "message"=>"Le numéro de téléphone n'est pas correct, il doit être au format 0601020304."); }
    
    if(!preg_match("#^[a-z0-9_-]{3,15}$#i", $_POST['usershop'])) { $messages_erreurs2[] = array("field"=>"usershop", "message"=>"Le nom d'utilisateur ne peut contenir que \"a-z A-Z 0-9 _ -\" et doit faire entre 3 et 15 caractères"); } // Format nom d'utilisateur

    $getNbUsers = $db->prepare("SELECT id_magasin FROM magasins WHERE usershop = :usershop");
    $getNbUsers->bindParam(":usershop", $_POST['usershop']);
    $getNbUsers->execute();
    $getNbUsers = $getNbUsers->rowCount();      
    if($getNbUsers != 0) {
        $messages_erreurs2[]=array("field"=>"usershop", "message"=>"Le nom du magasin est déjà utilisé.");
    }

    if (is_int($_POST['postal_magasin'])){$messages_erreurs2[]=array("field"=>"postal_magasin", "message"=>"Le code postal_magasin n'est pas au bon format");}

    $_POST['datenaiss'] = str_replace("/", "-", $_POST['datenaiss']);
    if(!preg_match("#^[0-9]{2}-[0-9]{2}-[0-9]{4}$#i", $_POST['datenaiss'])) { $messages_erreurs2[] = array("field"=>"datenaiss", "message"=>"La date de naissance n'est pas au format correct !"); } //Format de date invalide

    else {
        $timestamp_naissance = strtotime($_POST['datenaiss']);
        if(time() < $timestamp_naissance) { $messages_erreurs2[] = array("field"=>"datenaiss", "message"=>"Mon dieu Marty ! C'est toi !? Tu as retrouvé la DeLorean ?"); } // Date de naissance dans le futur
    }


    if(sizeof($messages_erreurs2) != 0) { // Erreurs détectées, on les affiche
        echo '<div class="" role="">Des erreurs se sont produites lors de la vérification des informations :<br/>';
        foreach($messages_erreurs2 as $erreur) {
         echo "<li>".$erreur['message']."</li>";
        }
        echo '</div>';
    } else { // Si pas d'erreur, on ajoute l'utilisateur dans la base de données.

        $insertion_magasins = $db->prepare("INSERT INTO magasins (usershop, naissance, ville_magasin, postal_magasin, adresse_magasin, telephone_magasin, id_utilisateur) VALUES (:usershop, :datenaiss, :ville_magasin, :postal_magasin, :adresse_magasin, :telephone_magasin, :id_utilisateur)");
        $insertion_magasins->bindParam(":usershop",$_POST['usershop']);
        $insertion_magasins->bindParam(":datenaiss", $timestamp_naissance);
        $insertion_magasins->bindParam(":ville_magasin",$_POST['ville_magasin']);
        $insertion_magasins->bindParam(":postal_magasin", $_POST['postal_magasin']);
        $insertion_magasins->bindParam(":adresse_magasin", $_POST['adresse_magasin']);
        $insertion_magasins->bindParam(":telephone_magasin", $_POST['telephone_magasin']);
        $insertion_magasins->bindParam(":id_utilisateur", $_SESSION['id']);

        $insertion_magasins->execute();


        echo '<p>Félicitations ! Vous êtes maintenant inscrit sur le site. Vous pouvez vous connecter dès maintenant</p><p class="text-center"><a class="" href="connexion.php">Connexion</a></p>';

        

        exit();
    }

}
?>