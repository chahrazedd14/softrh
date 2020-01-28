<?php
// require_once 'core/db.php';
// require_once 'model/films.php';


function defaultAction()
{
    // $films = getFilmsAll();
    require_once 'views/login-test.html.twig';
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
