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
    $email = $_POST["email"]; 
    $emailperso = $_POST["emailperso"];
    $tel = $_POST["tel"];
    $problemtype = $_POST["problemtype"];
    $materiel = $_POST["materiel"];
    $local = $_POST["local"];
    $id_machine = $_POST["id_machine"];
    $urgence = $_POST["urgence"];
    $description = $_POST["description"];

    // Création d'une instance de la connexion à la base de données
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Création d'une instance de DemandeModel et appel de la méthode createDemande
    $demandeModel = new DemandeModel($conn);
    $reference = $demandeModel->createDemande($email, $emailperso, $tel, $problemtype, $materiel, $local, $urgence, $description, $id_machine);
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