<?php
require_once 'vendor/autoload.php';
require_once 'core/db.php';
require_once 'model/getUser.php';
echo "default login";

// $_POST['identifiant'] = "admintest";
// $_POST['mdp'] = "1234";
// $_POST['identifiant'] = "person1";
// $_POST['mdp'] = "*00A51F3F48415C7D4E8908980D443C29C69B60C9";


print_r($_POST);


function defaultAction()
{
    $action = 'default';

    if (isset($_POST['identifiant'])) {
        $user = getUser($_POST['identifiant']);
        print_r($user);
        $action = checkUser($user);
    }


    // require_once 'views/login-test.html.twig';
    return $action;
}

function checkUser($user)
{
    // print_r($user);
    //si getUser() ne trouve aucun utilisateur avec cette identifiant :
    if ($user == "") {
        echo 'aucun utilisateur trouvé';
        return "default";
    } else if ($user['mdp'] == $_POST['mdp'] && $user['admin'] == "true") {
        echo 'Bon mot de passe admin!';
        return "admin";
    } else if ($user['mdp'] == $_POST['mdp'] && $user['admin'] == "false") {
        echo 'Bon mot de passe employe!';
        return "employe";
    } else {
        echo 'mauvais mdp';
        return "default";
    }
}



$action = defaultAction();
echo "ACTION = " . $action . " ";

if (strpos($uri, '/', 1) !== false) {
    $action = (strpos($uri, '/', strlen($controlleur) + 1)  === false) ? substr($uri, strpos($uri, '/', strlen($controlleur))) : substr($uri,  strlen($controlleur) + 1, (strpos($uri, '/', strlen($controlleur) + 1) - 1) - (strlen($controlleur) - 1) - 1);
    var_dump($action);
}
switch ($action) {
    case 'default':
    case "";
        // defaultAction();
        // require_once 'views/login-test.html.twig';
        // require_once 'views/login.html';
        // $loader = new \Twig\Loader\FilesystemLoader('views');
        // $twig = new \Twig\Environment($loader);
        // // $template = $twig->load('admin-test.html.twig');
        // echo $twig->render('login-test.html.twig', ['var1' => 'variables', 'var2' => 'here']);
        break;
    case 'admin';
        // defaultAction();
        echo "admin start";
        header('Location: /admin');
        exit();

        // $loader = new \Twig\Loader\FilesystemLoader('views');
        // $twig = new \Twig\Environment($loader);
        // // $template = $twig->load('admin-test.html.twig');
        // echo $twig->render('admin-test.html.twig', ['var1' => 'variables', 'var2' => 'here']);
        // require_once 'views/admin-test.html.twig';
        break;
    case 'employe';
        // defaultAction();
        // require_once 'views/utilisateur.html.twig';
        header('Location: /employe');
        exit();
        break;
    default:
        require_once 'views/404.html.php';
}
