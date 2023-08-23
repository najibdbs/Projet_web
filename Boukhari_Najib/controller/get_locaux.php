<?php
// Inclure le fichier de configuration
$siteid=$_GET['idsite'];
require_once '../config/config.php';

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les données de la table "locaux"
try {
    $stmt = $pdo->query("SELECT * FROM locaux where id_site = $siteid");
    $locaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($locaux);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données de la table 'locaux' : " . $e->getMessage());
}
?>