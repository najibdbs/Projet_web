<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();  
// ControllerTraitement.php
session_start();
require_once '../config/configB.php';
require_once '../model/DemandeModel.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération et validation des données POST
    $email = $_POST["email"] ?? null; // Remplacez ?? null par une valeur par défaut appropriée si nécessaire
    $emailperso = $_POST["emailperso"] ?? null;
    $tel = $_POST["tel"] ?? null;
    $problemtype = $_POST["problemtype"] ?? null;
    $materiel = $_POST["materiel"] ?? null;
    $local = $_POST["local"] ?? null;
    $urgence = $_POST["urgence"] ?? null;
    $description = $_POST["description"] ?? null;

    // Création d'une instance de la connexion à la base de données
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Création d'une instance de DemandeModel et appel de la méthode createDemande
    $demandeModel = new DemandeModel($conn);
    $reference = $demandeModel->createDemande($email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description);
   //var_dump($reference); 
    //exit;
    if ($reference) {
        echo $reference;
    } else {
        echo "Erreur lors de la création de la demande.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>