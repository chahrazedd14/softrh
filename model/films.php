<!-- fonction par rapport requet  -->
<?php

function getFilmsAll(){
    global $pdo;
    $sql = "SELECT id,titre,annee,synopsis FROM films";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}
function getFilmsById($id){
    global $pdo;
    $sql = "SELECT id,titre, annee, imagephoto,synopsis FROM films WHERE id =:id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id',$id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}

