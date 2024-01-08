<?php

// Informations d'accès à la base de données
$host = "localhost";
$dbname = "mon_formulaire";
$username = "root";
$password = "nippo.1930"; // Remplacez par votre mot de passe MySQL

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Données de l'utilisateur à insérer
$login = "superadmin";
$password = "aDmin@2024";

// Hacher le mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Requête SQL pour insérer l'utilisateur avec le mot de passe haché
$sql = "INSERT INTO utilisateurs (login, mot_de_passe) VALUES ('$login', '$hashedPassword')";

// Exécuter la requête
if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur inséré avec succès.";
} else {
    echo "Erreur lors de l'insertion de l'utilisateur : " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
