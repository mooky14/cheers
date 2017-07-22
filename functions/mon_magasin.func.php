
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
    echo    $_POST['telephone_magasin'];
    $messages_erreurs2 = array(); //création de la variable qui va contenir les erreurs

    //vérification du changement de téléphone
    if (isset($_POST['telephone_magasin']) && $_POST['telephone_magasin'] !=""){
        $_POST['telephone_magasin'] = str_replace("+33", "0", $_POST['telephone_magasin']);
        if(!preg_match("#^[0-9]{10}$#", $_POST['telephone_magasin'])) { $messages_erreurs2[] = array("field"=>"telephone_magasin", "message"=>"Le numéro de téléphone n'est pas correct, il doit être au format 0601020304."); }
    }
    //vérification du changement de nom
    if (isset($_POST['usershop']) && $_POST['usershop'] !="") {
        if(!preg_match("#^[a-z0-9_-]{3,50}$#i", $_POST['usershop'])) { $messages_erreurs2[] = array("field"=>"usershop", "message"=>"Le nom d'utilisateur ne peut contenir que \"a-z A-Z 0-9 _ -\" et doit faire entre 3 et 50 caractères"); } // Format nom d'utilisateur
    }    
    $getNbUsers = $db->prepare("SELECT id_magasin FROM magasins WHERE usershop = :usershop");
    $getNbUsers->bindParam(":usershop", $_POST['usershop']);
    $getNbUsers->execute();
    $getNbUsers = $getNbUsers->rowCount();  

    if($getNbUsers != 0) {
        $messages_erreurs2[]=array("field"=>"usershop", "message"=>"Le nom du magasin est déjà utilisé.");
    }
    if (isset($_POST['postal_magasin']) && $_POST['postal_magasin'] !="") {
       if (is_int($_POST['postal_magasin'])){$messages_erreurs2[]=array("field"=>"postal_magasin", "message"=>"Le code postal_magasin n'est pas au bon format");}
    }
    $timestamp_naissance="";
    if (isset( $_POST['datenaiss']) && $_POST['datenaiss'] !="") {
        $_POST['datenaiss'] = str_replace("/", "-", $_POST['datenaiss']);
        if(!preg_match("#^[0-9]{2}-[0-9]{2}-[0-9]{4}$#i", $_POST['datenaiss'])) { $messages_erreurs2[] = array("field"=>"datenaiss", "message"=>"La date de naissance n'est pas au format correct !"); } //Format de date invalide

        else {
            $timestamp_naissance = strtotime($_POST['datenaiss']);
            if(time() < $timestamp_naissance) { $messages_erreurs2[] = array("field"=>"datenaiss", "message"=>"Mon dieu Marty ! C'est toi !? Tu as retrouvé la DeLorean ?"); } // Date de naissance dans le futur
        }

    }
    if(sizeof($messages_erreurs2) != 0) { // Erreurs détectées, on les affiche
        echo '<div class="" role="">Des erreurs se sont produites lors de la vérification des informations :<br/>';
        foreach($messages_erreurs2 as $erreur) {
         echo "<li>".$erreur['message']."</li>";
        }
        echo '</div>';
    } else { // Si pas d'erreur, on ajoute l'utilisateur dans la base de données.
        if (isset($_POST['usershop']) && $_POST['usershop'] !="") {
        $insertion_usershop = $db->prepare("UPDATE magasins SET usershop='".$_POST['usershop']."'WHERE id_utilisateur=".$_SESSION['id']);
        $insertion_usershop->execute();
        }

        if (isset($_POST['datenaiss']) && $_POST['datenaiss'] !="") {
            $insertion_datenaiss = $db->prepare("UPDATE magasins SET naissance='".$timestamp_naissance."' WHERE id_utilisateur=".$_SESSION['id']);
            $insertion_datenaiss->execute();
        }

        if (isset($_POST['ville_magasin']) && $_POST['ville_magasin'] !="") {
            $insertion_ville_magasin = $db->prepare("UPDATE magasins SET ville_magasin='".$_POST['ville_magasin']."'WHERE id_utilisateur=".$_SESSION['id']);
            $insertion_ville_magasin->execute();
        }
        
        if (isset($_POST['postal_magasin']) && $_POST['postal_magasin'] !="") {
            $insertion_postal_magasin = $db->prepare("UPDATE magasins SET postal_magasin='".$_POST['postal_magasin']."'WHERE id_utilisateur=".$_SESSION['id']);
            $insertion_postal_magasin->execute();
        }

        if (isset($_POST['adresse_magasin'])&& $_POST['adresse_magasin'] !="") {
            $insertion_adresse_magasin = $db->prepare("UPDATE magasins SET adresse_magasin='".$_POST['adresse_magasin']."'WHERE id_utilisateur=".$_SESSION['id']);
            $insertion_adresse_magasin->execute();
        }
    
        if (isset($_POST['telephone_magasin']) && $_POST['telephone_magasin'] !="") {
            $insertion_telephone_magasin = $db->prepare("UPDATE magasins SET telephone_magasin='".$_POST['telephone_magasin']."'WHERE id_utilisateur=".$_SESSION['id']);
            $insertion_telephone_magasin->execute();
        }

        header('Location: http://localhost:8888/cheers/index.php?page=mon_magasin');
        

        exit();
    }

}
?>