<?php


function humeurJourTotal($jour)
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT * FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur";
    // SELECT * FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur
    //count number of same humeurs : 
    // SELECT *, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur
    // GROUP BY nom_humeur 
    //select by month : 
    //SELECT *, MONTH(DATE_FORMAT(vote_date, "%Y/%m/%d")) AS month FROM Vote
    //select by day : 
    // SELECT *, DAY(DATE_FORMAT(vote_date, "%Y/%m/%d")) AS day FROM Vote 
    $sth = $pdo->prepare($sql);
    // $sth->bindParam(':id', $id, PDO::PARAM_STR);
    // $sth->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}

function humeurMoisTotal($mois)
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT * FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur";
    // SELECT * FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur
    //count number of same humeurs : 
    // SELECT *, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur
    // GROUP BY nom_humeur 
    //select by month : 
    //SELECT *, MONTH(DATE_FORMAT(vote_date, "%Y/%m/%d")) AS month FROM Vote
    //select by day : 
    // SELECT *, DAY(DATE_FORMAT(vote_date, "%Y/%m/%d")) AS day FROM Vote 
    // SELECT *, count(nom_humeur) AS vote_total, MONTH(DATE_FORMAT(vote_date, "%Y/%m/%d")) AS month FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE month = 1 GROUP BY nom_humeur
    $sth = $pdo->prepare($sql);
    // $sth->bindParam(':id', $id, PDO::PARAM_STR);
    // $sth->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}

function humeurAnneeTotal($annee)
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = 'SELECT *, count(nom_humeur) AS vote_total, YEAR(DATE_FORMAT(vote_date, "%Y/%m/%d")) AS annee FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur GROUP BY nom_humeur';
    
    $sth = $pdo->prepare($sql);
    // $sth->bindParam(':id', $id, PDO::PARAM_STR);
    // $sth->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(pdo::FETCH_ASSOC);
}