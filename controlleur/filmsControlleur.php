<?php
require_once 'care/db.php';
require_once 'model/films.php';


function defaultAction()
{
    $films = getFilmsAll();
    require_once 'views/films.html.php';
}

function detailAction()
{
    //récupérer l'id
    //ceci est une expression régulière on met un anti slash car le slash est interprété comme un caractère, puisque l'on chercher un slash, le d signfie que l'on recherche un chiffre, et le + qu'on peut en avoir plusieurs
    global $uri;
    $exprReg = "#/[0-9]+#";
    $position = preg_match($exprReg, $uri, $matches);

    if(count($matches) === 0 ){
        require_once 'views/nofilm.html.php';
        return;
        }
        
        $id = intval( substr( $matches[0], 1) );
        $film = getFilmsById($id);
        
        if($film === false){
        require_once 'views/nofilm.html.php';
        return;
        }
        
        require_once 'views/detailfilm.html.php';
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
        detailAction();
        break;
    default:
    require_once 'views/404.html.php' ;
}
