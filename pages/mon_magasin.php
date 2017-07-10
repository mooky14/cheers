
 <!--                  Modals                   -->
 <!-- Modal paiement -->
<div id="modalpaiement" class="modal">
  <div class="modal-content">
    <h4>Paiement</h4>
    <form class="<?php echo ($page=="inscription")?"active" : ""; ?>" method="post" action="index.php?page=connexion">
        <div class="form-group">
            <input type="text" placeholder="Nom d'utilisateur" name="usershop" class="form-control">
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
<div class="row">
    <h2><?php echo $get_nom_magasin;?></h2>
        <p>Ville : <?php echo $get_ville_magasin;?></p>
        <p>Code postal : <?php echo $get_postal_magasin;?></p>
        <p>Adresse : <?php echo $get_adresse_magasin;?></p>


</div>
    
    
<div class="row">
    <h2>Modifier les informations de l'enseigne</h2>
    <p>Renseignez les coordonnées de votre enseigne</p>
    <form class="col s12" action="index.php?page=mon_magasin&action=new" method="post">
          <div class=" <?php echo (isErreurChamps('usershop')?"has-error":""); ?>">
            <label class="control-label" for="usershop">Nom de magasin :</label>
            <input type="text" class="form-control" id="usershop" name="usershop" value="<?php echo htmlentities($_POST['usershop']); ?>" placeholder="Exemple : ChuckNorris">
          </div>
            <div class=" <?php echo (isErreurChamps('datenaiss')?"has-error":""); ?>">
                <label class="control-label" for="datenaiss">Date de naissance :</label>
                <input type="text" class="form-control datepicker" data-date="<?php echo date("d-m-Y"); ?>" data-date-format="dd-mm-yyyy" id="datenaiss" name="datenaiss" placeholder="JJ/MM/AAAA" data-date-viewmode="years" value="<?php echo htmlentities($_POST['datenaiss']); ?>">
            </div>
        <div class="row">
            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('ville_magasin')?"has-error":""); ?>">
                    <label class="control-label" for="ville_magasin">ville_magasin d'habitation</label>
                    <input type="text" class="form-control" id="ville_magasin" name="ville_magasin" value="<?php echo htmlentities($_POST['ville_magasin']); ?>" placeholder="ville_magasin">
                </div>
            </div>
            <div class="input-field col s12 m12 l6">
                <div class=" <?php echo (isErreurChamps('postal_magasin')?"has-error":""); ?>">
                    <label class="control-label" for="postal_magasin">Code postal_magasin</label>
                    <input type="text" class="form-control" id="postal_magasin" name="postal_magasin" value="<?php echo htmlentities($_POST['postal_magasin']); ?>" placeholder="76000">
                </div>
            </div> 
        </div>
         <div class=" <?php echo (isErreurChamps('adresse_magasin')?"has-error":""); ?>">
            <label class="control-label" for="adresse_magasin">adresse_magasin</label>
            <input type="text" class="form-control" id="adresse_magasin" name="adresse_magasin" value="<?php echo htmlentities($_POST['adresse_magasin']); ?>" placeholder="12 rue Michel Dupont">
        </div>   
        <div class=" <?php echo (isErreurChamps('telephone_magasin')?"has-error":""); ?>">
            <label class="control-label" for="telephone_magasin">Numéro de téléphone</label>
            <input type="text" class="form-control" id="telephone_magasin" name="telephone_magasin" value="<?php echo htmlentities($_POST['telephone_magasin']); ?>" placeholder="Numéro de téléphone Français, au format 0601020304">
        </div>

          <button type="submit" class="btn btn-success">Terminer et payer</button>
          
    </form>
</div>
