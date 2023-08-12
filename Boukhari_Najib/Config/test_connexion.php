<?php
// Informations d'accès à la base de données
$host = "localhost";
$dbname = "mon_formulaire";
$username = "root";
$password = "nippo.1930";

// Établir une connexion à la base de données
$mysqli = new mysqli($host, $username, $password, $dbname);

// Vérifier si la connexion a réussi
if ($mysqli->connect_error) {
    die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
} else {
    echo "Connexion réussie à la base de données !";
}

// Fermer la connexion
$mysqli->close();
?>
s