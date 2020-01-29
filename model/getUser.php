<!-- fonction par rapport requet  -->
<?php

function getAllUser(){
    global $pdo;
    $sql = "SELECT * FROM Employe";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}
function getUser($id){
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT * FROM Employe WHERE utilisateur = :id";
    // SELECT * FROM `Employe` WHERE utilisateur = :id AND mdp = PASSWORD( :mdp )
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id',$id, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}

