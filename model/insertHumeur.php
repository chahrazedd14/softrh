<!-- fonction par rapport requet  -->
<?php

function getUser($id){
    global $pdo;
    $sql = "SELECT * FROM Humeur WHERE utilisateur =:id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id',$id, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}
$sql = "INSERT INTO Clients(nom_humeur,date,)
VALUES('')";

$dbco->exec($sql);
echo 'Entrée ajoutée dans la table';
}
