<?php
require_once 'vendor/autoload.php';
require_once 'core/db.php';
require_once 'model/getHumeurTotal.php';
// echo "ENTER ADMIN";
// print_r($_POST);
// print_r($_SESSION);

// $loader = new \Twig\Loader\FilesystemLoader('views');
// $twig = new \Twig\Environment($loader);
// // $template = $twig->load('admin-test.html.twig');
// echo $twig->render('admin-test.html.twig', ['var1' => 'variables', 'var2' => 'here']);
$currDate = explode("-", date("Y-m-d"));
// print_r($currDate);

$allyeardata = humeurAnneeTotal("2020");
$allMonthData = humeurMoisTotal("1", "2020");
$allJourData = humeurJourTotal($currDate[2], $currDate[1], $currDate[0]);
// $janvComptaTotalHumeur = humeurMoisTotalService("1","2020", "comptabilite");
// $janvsecretariatTotalHumeur = humeurMoisTotalService("1","2020", "secretariat");
// $janvlogistiqueTotalHumeur = humeurMoisTotalService("1","2020", "logistique");
// $janvjuridiqueTotalHumeur = humeurMoisTotalService("1","2020", "juridique");
$allMonthDataParService = humeurMoisTotalParService();
$humeurMoisParJourTotal = humeurMoisParJourTotal();

$action = "default";

// if (!isset($_POST['selectedService'])) {
//     $action = "default";
// } else {
//     $action = "service" . $humeurMoisParJourTotal;
// }

// if( strpos( $uri, '/', 1 ) !== false ){
//     // $action = ( strpos($uri, "/", strlen($controller) +1) === false )? substr($uri, strpos($uri, '/', strlen($controller) ) ) : substr($uri, strlen($controller) -1, strpos( $uri, '/', strlen( $controller ) +1 ) -1 );
//     // var_dump(substr($uri, strpos($uri, '/', strlen($controller)));

//     $action = ( strpos( $uri, '/', strlen( $controller ) + 1 )  === false )? substr( $uri, strpos( $uri, '/', strlen( $controller ))+1) : substr( $uri,  strlen( $controller ) + 1, ( strpos( $uri, '/', strlen( $controller ) + 1 ) -1 ) - ( strlen( $controller ) - 1 ) -1    );

//     // var_dump($action);
//     // var_dump(substr($uri, strlen($controller) -1, strpos( $uri, '/', strlen( $controller ) +1 ) -1 ));
//     // $action = 'lol';
// }

$expUri = explode("/",$uri);

echo "loooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooool ".$expUri[2];
// print_r($expUri);

$action = $expUri[2];

switch ($action) {
    case 'default':
        // print_r($allyeardata);
        // print_r($allMonthData);
        // print_r($allJourData);
        // echo "compta";
        // print_r($janvComptaTotalHumeur);
        // echo "secre";
        // print_r($janvsecretariatTotalHumeur);
        // echo "logis";
        // print_r($janvlogistiqueTotalHumeur);
        // echo "juri";
        // print_r($janvjuridiqueTotalHumeur);
        // echo "allMonthDataParService";
        // print_r($allMonthDataParService);

        // echo "humeurMoisParJourTotal";
        // print_r($humeurMoisParJourTotal);

        echo json_encode($humeurMoisParJourTotal);
        require_once 'views/admin.html';
        break;


    case 'show':
        // $humeurMoisParJourTotal = humeurMoisParJourTotal();
        // // echo "humeurMoisParJourTotal";
        // // print_r($humeurMoisParJourTotal);

        // echo json_encode($humeurMoisParJourTotal);
        // require_once 'views/admin.html';


        //REQUIRE PAGE AVEC UNIQUEMENT JSON
        // require_once 'controlleur/showServiceController.php';
        require_once 'views/admin.html';
        $service_id = $_SERVER['REQUEST_URI'];
        echo $service_id;
        break;

    default:
        require_once 'views/admin.html';
        break;
}
