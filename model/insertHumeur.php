<!-- fonction par rapport requet  -->
<?php

$serveur = "localhost";
$dbname = "";
$login = "root";
$pass = "online@2017";

try{
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //On prépare la requête et on l'exécute
    $sth = $dbco->prepare("
      UPDATE Users
      SET =''
      WHERE id=2
    ");
    $sth->execute();
    
    //On affiche le nombre d'entrées mise à jour
    $count = $sth->rowCount();
    print('Mise à jour de ' .$count. ' entrée(s)');
}
      
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
?>




