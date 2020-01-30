<?php

// INSERT INTO Vote (id_humeur, id_service, vote_date) VALUES (1, 1, DATE_FORMAT(CURRENT_TIMESTAMP, "%Y-%m-%d"))
// SELECT nom_humeur, count(nom_humeur) AS vote_total, nom_service FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE vote_date LIKE '%-01-%' GROUP BY nom_service
function humeurJourTotal($jour = "01", $mois = "1", $annee = "2020")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE :date GROUP BY nom_humeur";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";
    
    $selectedDate = "".$annee."-%".$mois."-".$jour."";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}

function humeurMoisTotal($mois = "1", $annee = "2020")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE :date GROUP BY nom_humeur";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";
    
    $selectedDate = "".$annee."-%".$mois."-%";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}

function humeurAnneeTotal($annee = "2020")
{
    global $pdo;
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE :date GROUP BY nom_humeur";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";
    
    $selectedYear = $annee.'-%-%';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedYear, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}