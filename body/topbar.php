<!-- Dropdown Structure 1 = dekstop 2 = mobile -->
    <!-- Recherchez -->
<ul id="dd_recherchez1" class="dropdown-content">
    <li class="<?php echo ($page=="Rouen")?"active" : ""; ?>"><a href="index.php?page=rouen">Rouen</a></li>
    <li class="<?php echo ($page=="Caen")?"active" : ""; ?>"><a href="index.php?page=caen">Caen</a></li>
    <li class="<?php echo ($page=="Caen")?"active" : ""; ?>"><a href="index.php?page=caen">Caen</a></li>
</ul>
<ul id="dd_recherchez2" class="dropdown-content">
    <li class="<?php echo ($page=="Rouen")?"active" : ""; ?>"><a href="index.php?page=rouen">Rouen</a></li>
    <li class="<?php echo ($page=="Caen")?"active" : ""; ?>"><a href="index.php?page=caen">Caen</a></li>
    <li class="<?php echo ($page=="Caen")?"active" : ""; ?>"><a href="index.php?page=caen">Caen</a></li>
</ul>

    <!-- Partenaires -->
<ul id="dd_offre1" class="dropdown-content">
    <li class="<?php echo ($page=="offre1")?"active" : ""; ?>"><a href="index.php?page=offre1">Offre Light</a></li>
    <li class="<?php echo ($page=="offre2")?"active" : ""; ?>"><a href="index.php?page=offre2">Offre Médium</a></li>
    <li class="<?php echo ($page=="offre3")?"active" : ""; ?>"><a href="index.php?page=offre3">Offre Full</a></li>
</ul>
<ul id="dd_offre2" class="dropdown-content">
    <li class="<?php echo ($page=="offre1")?"active" : ""; ?>"><a href="index.php?page=offre1">Offre Light</a></li>
    <li class="<?php echo ($page=="offre2")?"active" : ""; ?>"><a href="index.php?page=offre2">Offre Médium</a></li>
    <li class="<?php echo ($page=="offre3")?"active" : ""; ?>"><a href="index.php?page=offre3">Offre Full</a></li>
</ul>

    <!-- Formulaire connexion -->
<ul id="dd_connexion1" class="dropdown-content">
    <li class="<?php echo ($page=="espace-perso")?"active" : ""; ?>"><a href="#"><?php echo ucfirst($_SESSION['prenom'])."</br>".strtoupper($_SESSION['nom'])."</br>". computeAge($_SESSION['naissance'], time())." ans" ; ?></a></li>
    <li><a href="index.php?page=connexion&action=deconnexion">Déconnexion</a></li>
</ul>
<ul id="dd_connexion2" class="dropdown-content">
    <li class="<?php echo ($page=="espace-perso")?"active" : ""; ?>"><a href="#"><i class="material-icons">account_circle</i></br><?php echo ucfirst($_SESSION['prenom'])."</br>".strtoupper($_SESSION['nom'])."</br>".computeAge($_SESSION['naissance'], time())." ans" ; ?></a></li></br>
    
</ul>

<!-- Modal Formulaire inscription -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Connexion</h4>
    <form class="<?php echo ($page=="connexion")?"active" : ""; ?>" method="post" action="index.php?page=connexion">
        <div class="form-group">
            <input type="text" placeholder="Nom d'utilisateur" name="email" class="form-control">
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

<div id="modal2" class="modal">
  <div class="modal-content">
    <h4>Connexion</h4>
    <form class="<?php echo ($page=="connexion")?"active" : ""; ?>" method="post" action="index.php?page=connexion">
        <div class="form-group">
            <input type="text" placeholder="Nom d'utilisateur" name="email" class="form-control">
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



<nav class="">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">
                <img alt="logo cheers" style="max-width:140px; margin-top: 5%; margin-right:10%;" src="logos/logo_blanc.png">
            </a>
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down" style="margin-left:140px;">
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Home</a></li>
                <li class="<?php echo ($page=="actu")?"active" : ""; ?>"><a href="index.php?page=actu">Actu</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dd_recherchez1">Recherchez<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dd_offre1">Nos offres<i class="material-icons right">arrow_drop_down</i></a></li>
                <li class="<?php echo ($page=="contact")?"active" : ""; ?>"><a href="index.php?page=contact">Contact</a></li>
            </ul>
<?php if($_SESSION['connecte'] == 'true') { ?><!-- ////////////////////// début du menu conditionnel (si l'utilisateur est connecté)-->
            <ul class="right hide-on-med-and-down">
                <li><a href="sass.html">Mes offres</a></li>
                <li><a href="index.php?page=mon_magasin">Mon magasin</a></li>
                <li style="min-width: 120px; max-width: 200px; "><a class="dropdown-button" href="#!" data-activates="dd_connexion1"><?php echo $_SESSION['email']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
              </ul>
<?php }else{ ?>
            <ul class="right hide-on-med-and-down">
                <!--<li class="<?php echo ($page=="inscription")?"active" : ""; ?>"><a href="index.php?page=inscription">Inscription</a></li>-->
                <li><a class="waves-effect waves-light btn view" data-target="modal1">Connexion</a></li>
            </ul>                     
<?php } ?>
            
             <ul class="side-nav" id="mobile-menu">
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Home</a></li>
                <li class="<?php echo ($page=="actu")?"active" : ""; ?>"><a href="index.php?page=actu">Actu</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dd_recherchez2">Recherchez<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dd_offre2">Nos offres<i class="material-icons right">arrow_drop_down</i></a></li>
                <li class="<?php echo ($page=="contact")?"active" : ""; ?>"><a href="index.php?page=contact">Contact</a></li>
<?php if($_SESSION['connecte'] == 'true') { ?>
                <li><a href="#" class="dropdown-button" data-toggle="dropdown" data-activates ="dd_connexion2" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">account_circle</i><?php echo $_SESSION['email']; ?><span class="caret"></span></a></li>
                <li><a href="index.php?page=logout">Déconnexion</a></li>
<?php }else{ ?>
                <li><a class="waves-effect waves-light btn view" data-target="modal2">Connexion</a></li>
<?php } ?>
            </ul>
        </div>
    </div>
</nav>
                    
    <div class="container">
    
    </div>

                    
