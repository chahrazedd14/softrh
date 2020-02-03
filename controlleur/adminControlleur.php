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
// $allMonthDataParService = humeurMoisTotalParService();
// $humeurMoisParJourTotal = humeurMoisParJourTotal();

$action = "default";

// if (!isset($_POST['selectedService'])) {
//     $action = "default";
// } else {
//     $action = "service" . $humeurMoisParJourTotal;
// }

if (strpos($uri, '/', 1) !== false) {


    $action = (strpos($uri, '/', strlen($controlleur) + 1)  === false) ? substr($uri, strpos($uri, '/', strlen($controlleur)) + 1) : substr($uri,  strlen($controlleur) + 1, (strpos($uri, '/', strlen($controlleur) + 1) - 1) - (strlen($controlleur) - 1) - 1);
}
echo "ACTION EST " . $action;

function getServiceIndex()
{
    $uri = $_SERVER['REQUEST_URI'];
    $expUri = explode("/", $uri);

    $exprReg = "#/[0-9]+#";

    //recupérer id style "la-chèvre-2"
    // $exprReg = "#/[a-z\-]+-[0-9]+#";
    $position = preg_match($exprReg, $uri, $matches); //$postion = 1 if found; else 0
    var_dump($matches);

    if (count($matches) === 0) {
        require_once 'views/404.html.php';
        return 1;
    }

    if (count($expUri) === 4) {
        echo "SERVICE INDEX IS : " . $expUri[3];
        // $humeurMoisParJourTotal = humeurMoisParJourTotal($expUri[3]);
        // print json_encode($humeurMoisParJourTotal);
        // require_once 'controlleur/showServiceContoller.php';
        require_once 'views/admin.html';
        return $expUri[3];
    } else {
        echo "SMALL URL; NO SERVICE INDEX OR TOO LONG";
        require_once 'views/404.html.php';
        return 1;
    }
}



switch ($action) {
    case 'default':
        // echo json_encode($humeurMoisParJourTotal);
        require_once 'views/admin.html';
        break;


    case 'service':
        getServiceIndex();
        break;
    case 'ajax':
        require_once 'controlleur/showServiceController.php';
        break;
    default:
        require_once 'views/404.html.php';
        break;
}
