<!-- // (roteur) -->

<?php

$uri = $_SERVER['REQUEST_URI'];

$controlleur = $uri;

if ($uri !== "/") {
    $positionSlash = (strpos($uri, "/", 1) === false) ? strlen($uri) : strpos($uri, "/", 1);
    var_dump(($positionSlash));
    $controlleur = substr($uri, 0, $positionSlash);
    var_dump($controlleur);
    echo 'chemin long';
}
switch ($controlleur) {
    case "/";
        require_once 'controlleur/defaultControlleur.php';
        // echo 'applle controlleur home';
        break;

    case "/admin";
        require_once 'controlleur/adminControlleur.php';
        // echo 'applle de controlleur film';
        break;
    case "/humeur";
        require_once 'controlleur/humeurControlleur.php';
        echo 'applle de controlleur humeur';
        break;
    case "/realisateurs";

        require_once 'controlleur/realisateursControlleur.php';
        // echo 'applle de controlleur realisateurs';
        break;

    default:
        // require_once 'views/404.html.php'  ;
        require_once 'controlleur/defaultControlleur.php';
}
