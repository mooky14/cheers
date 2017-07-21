<?php
    include 'functions/main-functions.php';

    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            $page = "error";
        }
    }else{
        $page = "home";
    }

    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/cheers.css">
        <title>Cheers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
        <?php
            include "body/topbar.php";
        ?>
        <div class="container">
          <h1>Bonjour</h1>

            <?php
                include 'pages/'.$page.'.php';
            ?>
        </div>
<?php 
echo $_SESSION['id'];
 ?>
         <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Le site Cheers</h5>
                <p class="grey-text text-lighten-4">Vous pouvez retrouvez toutes les informations concernants notre site dans les liens suivants : </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Navigation : </h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">L'équipe</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">L'actu</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Recherchez</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">Mentions légales</a>
            </div>
          </div>
        </footer>
            

        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <?php
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
                <?php
            }
        ?>

    </body>
</html>