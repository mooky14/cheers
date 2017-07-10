<?php
include '../functions/main-functions.php';

$pages = scandir('pages/');
if(isset($_GET['page']) && !empty($_GET['page'])){
    if(in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = "error";
    }
}else{
    $page = "dashboard";
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
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <title>Blog 2.0 | Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<?php

if($page != 'login' && $page != 'new' && !isset($_SESSION['admin'])){
    header("Location:index.php?page=login");
}

include "body/topbar.php";
?>
<div class="container">
    <?php
    include 'pages/'.$page.'.php';
    ?>
</div>

<!--Import jQuery before materialize.js-->
<script src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
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