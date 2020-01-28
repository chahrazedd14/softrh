<?php
require_once 'core/db.php';
require_once 'model/getUser.php';
echo "default login";
print_r($_POST);

function defaultAction()
{
    $action = 'default';
    
    if(isset($_POST['identifiant'])){
        $user = getUser($_POST['identifiant']);
        print_r($user);
        $action = checkUser($user);
    }
    
    
    // require_once 'views/login-test.html.twig';
    return $action;
    
}

function checkUser($user){
    // print_r($user);
    //si getUser() ne trouve aucun utilisateur avec cette identifiant :
    if($user == ""){
        echo 'aucun utilisateur trouvé';
        return "default";
    }
    else if($user['mdp'] == $_POST['mdp'] && $user['admin'] == "true"){
        echo 'Bon mot de passe admin!';
        return "admin";
    }
    else if($user['mdp'] == $_POST['mdp'] && $user['admin'] == "false"){
        echo 'Bon mot de passe employe!';
        return "employe";
    }
    else{
        echo 'mauvais mdp';
        return "default";
    }
}



$action = defaultAction();
echo $action;

if (strpos($uri, '/', 1) !== false) {
    $action = (strpos($uri, '/', strlen($controlleur) + 1)  === false) ? substr($uri, strpos($uri, '/', strlen($controlleur))) : substr($uri,  strlen($controlleur) + 1, (strpos($uri, '/', strlen($controlleur) + 1) - 1) - (strlen($controlleur) - 1) - 1);
    var_dump($action);
}
switch ($action) {
    case 'default':
    case "";
        // defaultAction();
        require_once 'views/login-test.html.twig';
        break;
    case 'admin';
        // defaultAction();
        require_once 'views/admin-test.html.twig';
        break;
    case 'employe';
        // defaultAction();
        require_once 'views/utilisateur.html.twig';
        break;
    default:
    require_once 'views/404.html.php' ;
}
