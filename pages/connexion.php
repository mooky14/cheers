<?php 
if($_GET['action'] == "deconnexion") {
    session_destroy();
    session_start();
    $_SESSION['message'] = array("success", ' Déconnexion effectuée avec succès !');
    header("Location:index.php?page=home");
    exit(0);
}

if(!empty($_POST['email']) && !empty($_POST['password'])) {

    $encPasswd = sha1($_POST['password']);

    $getUser = $db->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur = :email AND password_utilisateur = :password LIMIT 1");
    $getUser->bindParam(":email", $_POST['email']);
    $getUser->bindParam(":password", $encPasswd);
    $getUser->execute();
    $infoUser = $getUser->fetch();

    if($getUser->rowCount() == 1) {

        $_SESSION['connecte'] = true;
        $_SESSION['email'] = $infoUser['email_utilisateur'];
        $_SESSION['id'] = $infoUser['id_utilisateur'];
        $_SESSION['nom'] = $infoUser['nom_utilisateur'];
        $_SESSION['prenom'] = $infoUser['prenom_utilisateur'];
        $_SESSION['ville'] = $infoUser['ville_utilisateur'];
        $_SESSION['naissance'] = $infoUser['naissance_utilisateur'];
        $_SESSION['telephone'] = $infoUser['telephone'];

        $_SESSION['message'] = array("success", '<i class=""></i> Vous êtes maintenant connecté en tant que '.$_SESSION['email'].' !');
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit(0);
        exit();

    } else {
        $_SESSION['message'] = array("danger", '<i class="glyphicon glyphicon-remove"></i> Impossible de vous connecter, merci de vérifier les identifiants !');
    }
}
?>
    <h1>Connexion</h1>
    <p>Connectez-vous pour profiter de toutes les fonctionnalités du site, comme réserver ou proposer un trajet.</p>

    <form class="<?php echo ($page=="connexion")?"active" : ""; ?>" method="post" action="index.php?page=connexion">

        <div class="row">

            <div class="">
                <div class="form-group <?php echo (isErreurChamps('email')?"has-error":""); ?>">
                    <label class="control-label" for="email">Nom d'utilisateur :</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlentities($_POST['email']); ?>" placeholder="Exemple : ChuckNorris">
                </div>
            </div>

            <div class="">
                <div class="form-group <?php echo (isErreurChamps('password')?"has-error":""); ?>">
                    <label class="control-label" for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlentities($_POST['password']); ?>" placeholder="Mot de passe">
                </div>
            </div>
            <div class="">
                <label class="control-label">Connexion</label>
              <button type="submit" class="">Connexion</button>
            </div>
        </div>
    </form>

