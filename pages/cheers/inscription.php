<?php include('header.php'); ?>

<?php
if($_GET['action'] == "new") {
   // !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password-confirm']) && !empty($_POST['datenaiss'])
    // Les champs ont été renseignés et sont tous remplis.

    $messages_erreurs = array(); //création de la variable qui va contenir les erreurs

    // Véfification des informations entrées
    if(empty($_POST['username'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"username", "message"=>"Nom d'utilisateur non renseigné.");}
    if(empty($_POST['password'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"password", "message"=>"Mot de passe non renseigné.");}
    if(empty($_POST['password-confirm'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"password-confirm", "message"=>"Confirmation de mot de passe non renseignée.");}
    if(empty($_POST['datenaiss'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"datenaiss", "message"=>"Date de naissance non renseigné.");}
    if(empty($_POST['nom'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"nom", "message"=>"Nom de famille non renseigné.");}
    if(empty($_POST['prenom'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"prenom", "message"=>"Prénom non renseigné.");}
    if(empty($_POST['ville'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"ville", "message"=>"Ville non renseignée.");}
    if(empty($_POST['telephone'])) {$messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"telephone", "message"=>"Téléphone non renseigné.");}

    $_POST['telephone'] = str_replace("+33", "0", $_POST['telephone']);
    if(!preg_match("#^[0-9]{10}$#", $_POST['telephone'])) { $messages_erreurs[sizeof($messages_erreurs)] = array("field"=>"telephone", "message"=>"Le numéro de téléphone n'est pas correct, il doit être au format 0601020304."); }
    
    if(!preg_match("#^[a-z0-9_-]{3,15}$#i", $_POST['username'])) { $messages_erreurs[sizeof($messages_erreurs)] = array("field"=>"username", "message"=>"Le nom d'utilisateur ne peut contenir que \"a-z A-Z 0-9 _ -\" et doit faire entre 3 et 15 caractères"); } // Format nom d'utilisateur

    $getNbUsers = $pdo->prepare("SELECT id_utilisateur FROM utilisateurs WHERE username_utilisateur = :username");
    $getNbUsers->bindParam(":username", $_POST['username']);
    $getNbUsers->execute();
    $getNbUsers = $getNbUsers->rowCount();
    if($getNbUsers != 0) {
        $messages_erreurs[sizeof($messages_erreurs)]=array("field"=>"username", "message"=>"Le nom d'utilisateur est déjà utilisé.");
    }

    if($_POST['password'] != $_POST['password-confirm']) { $messages_erreurs[sizeof($messages_erreurs)] = array("field"=>"password", "message"=>"Les mots de passe entrés ne correspondent pas. Vérifier qu'ils sont identiques."); } // Vérification deux mots de passes entrés sont identiques

    $_POST['datenaiss'] = str_replace("/", "-", $_POST['datenaiss']);
    if(!preg_match("#^[0-9]{2}-[0-9]{2}-[0-9]{4}$#i", $_POST['datenaiss'])) { $messages_erreurs[sizeof($messages_erreurs)] = array("field"=>"datenaiss", "message"=>"La date de naissance n'est pas au format correct !"); } //Format de date invalide

    else {
        $timestamp_naissance = strtotime($_POST['datenaiss']);
        if(time() < $timestamp_naissance) { $messages_erreurs[sizeof($messages_erreurs)] = array("field"=>"datenaiss", "message"=>"Mon dieu Marty ! C'est toi !? Tu as retrouvé la DeLorean ?"); } // Date de naissance dans le futur
    }


    if(sizeof($messages_erreurs) != 0) { // Erreurs détectées, on les affiche
        echo '<div class="alert alert-warning" role="alert">Des erreurs se sont produites lors de la vérification des informations :<br/>';
        foreach($messages_erreurs as $erreur) {
         echo "<li>".$erreur['message']."</li>";
        }
        echo '</div>';
    } else { // Si pas d'erreur, on ajoute l'utilisateur dans la base de données.

        $insertion_utilisateur = $pdo->prepare("INSERT INTO utilisateurs (username_utilisateur, password_utilisateur, nom_utilisateur, prenom_utilisateur, naissance_utilisateur, ville_utilisateur, telephone) VALUES (:username, :password, :nom, :prenom, :datenaiss, :ville, :telephone)");
        $insertion_utilisateur->bindParam(":username",$_POST['username']);
        $insertion_utilisateur->bindParam(":password",sha1($_POST['password']));
        $insertion_utilisateur->bindParam(":nom",$_POST['nom']);
        $insertion_utilisateur->bindParam(":prenom",$_POST['prenom']);
        $insertion_utilisateur->bindParam(":datenaiss", $timestamp_naissance);
        $insertion_utilisateur->bindParam(":ville",$_POST['ville']);
        $insertion_utilisateur->bindParam(":telephone", $_POST['telephone']);

        $insertion_utilisateur->execute();

        echo '<div class="alert alert-success" role="alert"><p>Félicitations ! Vous êtes maintenant inscrit sur le site. Vous pouvez vous connecter dès maintenant</p><p class="text-center"><a class="btn btn-info" href="connexion.php"><i class="glyphicon glyphicon-user"></i> Connexion</a></p></div>';
        envoiSMS($_POST['telephone'], "Bienvenue sur Rugby'Covoit ! Vous pouvez maintenant chercher un trajet ou en proposer un ! A très bientôt !");

        include('footer.php');
        exit();

    }

}
?>
<div class="container">
    <h1>Formulaire d'inscription</h1>
    <p>Rejoignez-nous et profitez des offres d'équipements cheers pour optimiser vos flux par par table !</p>

    <form action="inscription.php?action=new" method="post">

          <div class="form-group <?php echo (isErreurChamps('username')?"has-error":""); ?>">
            <label class="control-label" for="username">Nom d'utilisateur souhaité :</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlentities($_POST['username']); ?>" placeholder="Exemple : ChuckNorris">
          </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group <?php echo (isErreurChamps('password')?"has-error":""); ?>">
                    <label class="control-label" for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlentities($_POST['password']); ?>" placeholder="Mot de passe">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group <?php echo (isErreurChamps('password')?"has-error":""); ?>">
                    <label class="control-label" for="password-confirm">Confirmation</label>
                    <input type="password" class="form-control" id="password-confirm" name="password-confirm" value="<?php echo htmlentities($_POST['password-confirm']); ?>" placeholder="Mot de passe">
                </div>
            </div>
        </div>

            <div class="form-group <?php echo (isErreurChamps('datenaiss')?"has-error":""); ?>">
                <label class="control-label" for="datenaiss">Date de naissance :</label>
                <input type="text" class="form-control datepicker" data-date="<?php echo date("d-m-Y"); ?>" data-date-format="dd-mm-yyyy" id="datenaiss" name="datenaiss" placeholder="JJ/MM/AAAA" data-date-viewmode="years" value="<?php echo htmlentities($_POST['datenaiss']); ?>">
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group <?php echo (isErreurChamps('prenom')?"has-error":""); ?>">
                    <label class="control-label" for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlentities($_POST['prenom']); ?>" placeholder="Prénom">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group <?php echo (isErreurChamps('nom')?"has-error":""); ?>">
                    <label class="control-label" for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlentities($_POST['nom']); ?>" placeholder="Nom de famille">
                </div>
            </div>
        </div>

        <div class="form-group <?php echo (isErreurChamps('ville')?"has-error":""); ?>">
            <label class="control-label" for="ville">Ville d'habitation</label>
            <input type="text" class="form-control" id="ville" name="ville" value="<?php echo htmlentities($_POST['ville']); ?>" placeholder="Ville">
          </div>
            
            <div class="form-group <?php echo (isErreurChamps('telephone')?"has-error":""); ?>">
            <label class="control-label" for="telephone">Numéro de téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo htmlentities($_POST['telephone']); ?>" placeholder="Numéro de téléphone Français, au format 0601020304">
          </div>

          <button type="submit" class="btn btn-success">Créer mon compte</button>
    </form>

<?php include('footer.php'); ?>
