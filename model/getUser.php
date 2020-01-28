<!-- fonction par rapport requet  -->
<?php

function getAllUser(){
    global $pdo;
    $sql = "SELECT id,titre,annee,synopsis FROM films";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}
function getUser($id){
    global $pdo;
    $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id',$id, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}

