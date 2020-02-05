<?php

// INSERT INTO Vote (id_humeur, id_service, vote_date) VALUES (1, 1, DATE_FORMAT(CURRENT_TIMESTAMP, "%Y-%m-%d"))
// SELECT nom_humeur, count(nom_humeur) AS vote_total, nom_service FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE vote_date LIKE '%-01-%' GROUP BY nom_service
function humeurJourTotal($jour = "01", $mois = "1", $annee = "2020")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE :date GROUP BY nom_humeur";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";

    $selectedDate = "" . $annee . "-%" . $mois . "-" . $jour . "";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}

function humeurMoisParJourTotal($service = 1, $mois = "1", $annee = "2020")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total, vote_date FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE Service.id_service = :serviceNum AND vote_date LIKE :date GROUP BY nom_humeur, vote_date ORDER BY `Vote`.`vote_date` ASC";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";

    $selectedDate = "" . $annee . "-%" . $mois . "-%";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    $sth->bindParam(':serviceNum', $service, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}


function humeurMoisTotal($mois = "1", $annee = "2020")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE :date GROUP BY nom_humeur";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";

    $selectedDate = "" . $annee . "-%" . $mois . "-%";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}


//retourne total des humeurs d'un service specifié en param (obsolète?)
function humeurMoisTotalService($mois = "1", $annee = "2020", $service = "comptabilite")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total, nom_service FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE vote_date LIKE :date AND nom_service = :service GROUP BY nom_humeur";
    // SELECT nom_humeur, count(nom_humeur) AS vote_total, nom_service FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE vote_date LIKE '%-01-%' AND nom_service = 'comptabilite' GROUP BY nom_humeur

    $selectedDate = "" . $annee . "-%" . $mois . "-%";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    $sth->bindParam(':service', $service, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}

//retourne array avec total chaque humeur par services
function humeurMoisTotalParService($mois = "01", $annee = "2020")
{
    global $pdo;
    // $sql = "SELECT * FROM Employe WHERE utilisateur =:id";
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total, nom_service FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE vote_date LIKE :date GROUP BY nom_humeur, nom_service ORDER BY `Humeur`.`nom_humeur` ASC, `Service`.`nom_service` ASC";
    // SELECT nom_humeur, count(nom_humeur) AS vote_total, nom_service FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur INNER JOIN Service ON Vote.id_service = Service.id_service WHERE vote_date LIKE '%-01-%' AND nom_service = 'comptabilite' GROUP BY nom_humeur

    $selectedDate = $annee . "-" . $mois . "-%";
    // $selectedDate = "2020-01-%";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedDate, PDO::PARAM_STR);
    // $sth->bindParam(':service', $service, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}


function humeurAnneeTotal($annee = "2020")
{
    global $pdo;
    $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE :date GROUP BY nom_humeur";
    // $sql = "SELECT nom_humeur, count(nom_humeur) AS vote_total FROM Vote INNER JOIN Humeur ON Vote.id_humeur = Humeur.id_humeur WHERE vote_date LIKE '%-%1-%' GROUP BY nom_humeur";

    $selectedYear = $annee . '-%-%';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $selectedYear, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(pdo::FETCH_ASSOC);
}
