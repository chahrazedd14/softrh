<?php
require_once 'core/db.php';
require_once 'model/getUser.php';
echo "default login";
print_r($_POST);

function defaultAction()
{
    if(isset($_POST['identifiant'])){
        $user = getUser($_POST['identifiant']);
        print_r($user);
        checkUser($user);
    }
    
    
    require_once 'views/login-test.html.twig';
    
}

function checkUser($user){
    // print_r($user);
    //si getUser() ne trouve aucun utilisateur avec cette identifiant :
    if($user == ""){
        echo 'aucun utilisateur trouvé';
    }
    else if($user['mdp'] == $_POST['mdp']){
        echo 'Bon mot de passe!';
    }
    else{
        echo 'mauvais mdp';
    }
}


$action = 'default';

if (strpos($uri, '/', 1) !== false) {
    $action = (strpos($uri, '/', strlen($controlleur) + 1)  === false) ? substr($uri, strpos($uri, '/', strlen($controlleur))) : substr($uri,  strlen($controlleur) + 1, (strpos($uri, '/', strlen($controlleur) + 1) - 1) - (strlen($controlleur) - 1) - 1);
    var_dump($action);
}
switch ($action) {
    case 'default':
    case "";
        defaultAction();
        break;
    case 'detail';
        // detailAction();
        break;
    default:
    require_once 'views/404.html.php' ;
}
