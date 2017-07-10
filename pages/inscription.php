 <!--                  Modals                   -->
 <!-- Modal paiement -->
<div id="modalpaiement" class="modal">
  <div class="modal-content">
    <h4>Paiement</h4>
    <form class="<?php echo ($page=="inscription")?"active" : ""; ?>" method="post" action="index.php?page=connexion">
        <div class="form-group">
            <input type="text" placeholder="Nom d'utilisateur" name="username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Mot de passe" name="password" class="form-control">
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Agree
            <i class="material-icons right">send</i>
        </button>
    </form>
  </div>
</div>
<!-- fin modal -->

    <h1>Formulaire de souscription</h1>
    <p>Rejoignez-nous et profitez des offres d'équipements cheers pour optimiser vos flux par par table !</p>
<div class="row">
    <form class="col s12" action="index.php?page=inscription&action=new" method="post">

          <div class=" <?php echo (isErreurChamps('username')?"has-error":""); ?>">
            <label class="control-label" for="username">Nom d'utilisateur souhaité :</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlentities($_POST['username']); ?>" placeholder="Exemple : ChuckNorris">
          </div>

        <div class="row">
            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('password')?"has-error":""); ?>">
                    <label class="control-label" for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlentities($_POST['password']); ?>" placeholder="Mot de passe">
                </div>
            </div>

            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('password')?"has-error":""); ?>">
                    <label class="control-label" for="password-confirm">Confirmation</label>
                    <input type="password" class="form-control" id="password-confirm" name="password-confirm" value="<?php echo htmlentities($_POST['password-confirm']); ?>" placeholder="Mot de passe">
                </div>
            </div>
        </div>

            <div class=" <?php echo (isErreurChamps('datenaiss')?"has-error":""); ?>">
                <label class="control-label" for="datenaiss">Date de naissance :</label>
                <input type="text" class="form-control datepicker" data-date="<?php echo date("d-m-Y"); ?>" data-date-format="dd-mm-yyyy" id="datenaiss" name="datenaiss" placeholder="JJ/MM/AAAA" data-date-viewmode="years" value="<?php echo htmlentities($_POST['datenaiss']); ?>">
            </div>

        <div class="row">
            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('prenom')?"has-error":""); ?>">
                    <label class="control-label" for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlentities($_POST['prenom']); ?>" placeholder="Prénom">
                </div>
            </div>

            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('nom')?"has-error":""); ?>">
                    <label class="control-label" for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlentities($_POST['nom']); ?>" placeholder="Nom de famille">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('ville')?"has-error":""); ?>">
                    <label class="control-label" for="ville">Ville d'habitation</label>
                    <input type="text" class="form-control" id="ville" name="ville" value="<?php echo htmlentities($_POST['ville']); ?>" placeholder="Ville">
                </div>
            </div>
            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('postal')?"has-error":""); ?>">
                    <label class="control-label" for="postal">Code postal</label>
                    <input type="text" class="form-control" id="postal" name="postal" value="<?php echo htmlentities($_POST['postal']); ?>" placeholder="76000">
                </div>
            </div> 
        </div>
         <div class=" <?php echo (isErreurChamps('adresse')?"has-error":""); ?>">
            <label class="control-label" for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo htmlentities($_POST['adresse']); ?>" placeholder="12 rue Michel Dupont">
        </div>   
        <div class=" <?php echo (isErreurChamps('telephone')?"has-error":""); ?>">
            <label class="control-label" for="telephone">Numéro de téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo htmlentities($_POST['telephone']); ?>" placeholder="Numéro de téléphone Français, au format 0601020304">
        </div>

          <button type="submit" class="btn btn-success">Terminer et payer</button>
          
    </form>
</div>