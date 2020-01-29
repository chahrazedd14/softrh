<!-- fonction par rapport requet  -->
<?php

function getUser($id){
    global $pdo;
    $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id',$id, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}
$sql = "INSERT INTO Clients(nom_humeur,date,)
VALUES('Giraud','Pierre','Quai d\'Europe','Toulon',83000,'France','pierre.giraud@edhec.com')";

$dbco->exec($sql);
echo 'Entrée ajoutée dans la table';
}
