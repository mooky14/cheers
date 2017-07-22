<?php

    session_start();

    //A modifier en fonction de vos indentifiants de base de donnée
    $dbhost = 'localhost';
    $dbname = 'blog';//Ne doit pas être modifié si vous avez appelé votre bdd "blog"
    $dbuser = 'root';
    $dbpswd = 'root';
    //A partir d'ici, vous ne devez plus rien modifier

    try{
        $db = new PDO('mysql:host='.$dbhost.';port=8889;dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }

function admin(){
    if(isset($_SESSION['admin'])){
        global $db;
        $a = [
            'email'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];

        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);

        return $exist;
    }else{
        return 0;
    }
}

function hasnt_password(){
    global $db;

    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;
}

function isErreurChamps($nomChamp) {
    global $messages_erreurs;
    if(!empty($messages_erreurs)) {
        foreach($messages_erreurs as $erreur){
            if($erreur['field'] == $nomChamp) return true;
        }
    }
    return false;
}

function computeAge($starttime,$endtime)
{
    $age = date("Y",$endtime) - date("Y",$starttime);
    //if birthday didn't occur that last year, then decrement
    if(date("z",$endtime) < date("z",$starttime)) $age--;
    return $age;
}

// Je récupère les données de la BDD et je créé mes variables : 
    
    
?>
