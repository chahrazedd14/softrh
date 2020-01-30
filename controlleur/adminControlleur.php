<?php
require_once 'vendor/autoload.php';
require_once 'core/db.php';
require_once 'model/getHumeurTotal.php';
echo "ENTER ADMIN";
print_r($_POST);
// print_r($_SESSION);

// $loader = new \Twig\Loader\FilesystemLoader('views');
// $twig = new \Twig\Environment($loader);
// // $template = $twig->load('admin-test.html.twig');
// echo $twig->render('admin-test.html.twig', ['var1' => 'variables', 'var2' => 'here']);
$currDate = explode("-", date("Y-m-d"));
print_r($currDate);

$allyeardata = humeurAnneeTotal("2020");
$allMonthData = humeurMoisTotal("1","2020");
$allJourData = humeurJourTotal($currDate[2],$currDate[1],$currDate[0]);
$janvComptaTotalHumeur = humeurMoisTotalService("1","2020", "comptabilite");
$janvsecretariatTotalHumeur = humeurMoisTotalService("1","2020", "secretariat");
$janvlogistiqueTotalHumeur = humeurMoisTotalService("1","2020", "logistique");
$janvjuridiqueTotalHumeur = humeurMoisTotalService("1","2020", "juridique");
 
$action = "default";
switch ($action) {
    case 'default':
        // print_r($allyeardata);
        print_r($allMonthData);
        print_r($allJourData);
        echo "compta";
        print_r($janvComptaTotalHumeur);
        echo "secre";
        print_r($janvsecretariatTotalHumeur);
        echo "logis";
        print_r($janvlogistiqueTotalHumeur);
        echo "juri";
        print_r($janvjuridiqueTotalHumeur);
        // echo $allyeardata[0]['vote_total'];
        // echo $allyeardata[1]['vote_total'];
        // echo $allyeardata[2]['vote_total'];
        require_once 'views/admin.html';
        break;

    default:
        require_once 'views/admin.html';
        break;
}
