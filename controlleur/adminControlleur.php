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
$allyeardata = humeurAnneeTotal(2020);
$action = "default";
switch ($action) {
    case 'default':
        // print_r($allyeardata);
        // echo $allyeardata[0]['vote_total'];
        // echo $allyeardata[1]['vote_total'];
        // echo $allyeardata[2]['vote_total'];
        require_once 'views/admin.html';
        break;

    default:
        require_once 'views/admin.html';
        break;
}
