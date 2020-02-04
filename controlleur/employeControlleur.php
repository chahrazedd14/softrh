<?php
$action = 'default';
// require_once 'vendor/autoload.php';
require_once 'core/db.php';
require_once 'model/getUser.php';
// require_once 'model/insertHumeur.php';

// echo "default login";
// print_r($_POST);

// $loader = new \Twig\Loader\FilesystemLoader('views');
// $twig = new \Twig\Environment($loader);
// // $template = $twig->load('admin-test.html.twig');
// echo $twig->render('employe-test.html.twig', ['bonjour' => 'sa marche employe', 'var2' => 'here']);
// echo 'ENTER PAPGE Employe';
if( strpos( $uri, '/', 1 ) !== false ){

    
    $action = ( strpos( $uri, '/', strlen( $controlleur ) + 1 ) === false )? substr( $uri, strpos( $uri, '/', strlen( $controlleur ))+1) : substr( $uri, strlen( $controlleur ) + 1, ( strpos( $uri, '/', strlen( $controlleur ) + 1 ) -1 ) - ( strlen( $controlleur ) - 1 ) -1 );
    

}
switch ($action) {
    case 'default':
        require_once 'views/employe.html';
        break;

    case 'humeur':
        $uri = $_SERVER['REQUEST_URI'];
        $expUri = explode("/",$uri);
        print_r($_SESSION);
        $selectedHumeur = $expUri[3];
        $selectedService = $_SESSION['id_service'];
        require_once 'model/insertHumeur.php';
        require_once 'controlleur/logoutControlleur.php';
        // echo 'employe humeur';
        break;

    default:
        # code...
        break;
}

exit;
